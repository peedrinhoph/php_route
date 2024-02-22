<?php

use app\library\Session;

require './bootstrap.php';
require '../app/routes/web.php';

Session::destroyFlashMessage();
// Classe Abstrata abstract class teste

// São utizadas quando se necessita utilizar uma implementação repetida, por exemplo, 
// classe de pagamento, CRUD, ao invés de criar uma implementação em cada class, 
// se utiliza como base a abstação, criando uma unica class abstract com as funções 
// necessarias para o processo.


// #Classes abstratas são extendidas nas classes filhas como heranca

abstract class Payment
{

   // public readonly string $nomeImpresso;
   // public readonly int     $numCartao;
   // public readonly string $dateVencimento;
   // public readonly int     $codSeguranca;
   // public readonly float $value;

   public function __construct(
      public readonly string  $nomeImpresso,
      public readonly int     $numCartao,
      public readonly string  $dateVencimento,
      public readonly int     $codSeguranca,
      public readonly float   $value
   ) {
   }

   abstract public function pay();
}

class PagSeguro extends Payment
{
   public function pay()
   {
      var_dump('Pagando com o PagSeguro ' . $this->value . '<br/>');
   }
}

class Paypal extends Payment
{
   public function pay()
   {
      var_dump('Pagando com o Paypal ' . $this->value . '<br/>');
   }
}

class Checkout
{
   protected array $cards;

   public function payNow(Payment $payment)
   {
      $payment->pay();
      $this->cards[] = $payment;
   }
}

$checkout = new Checkout;
$checkout->payNow(new PagSeguro('Pedro H Pereira', '9999910', '2030/08', '310', 13.75));
$checkout->payNow(new Paypal('Juliana T Holzschuh', '9999920', '2032/08', '312', 100.75));

// #Interfaces são implementadas nas classes filhas

// interface Payment
// {
//     public function pay();
// }

// class PagSeguro implements Payment
// {

//     public function __construct(
//         public readonly string $nome
//     ) {
//     }

//     public function pay()
//     {
//         return 'Pagando com o PagSeguro em nome de ' . $this->nome;
//     }
// }

// class Paypal implements Payment
// {
//     public function __construct(
//         public readonly string $nome
//     ) {
//     }

//     public function pay()
//     {
//         return 'Pagando com o Paypal em nome de ' . $this->nome;
//     }
// }

// class Checkout
// {
//     public function pay(Payment $payment)
//     {
//         return $payment->pay();
//     }
// }

// $checkout = new Checkout;
// $pay = $checkout->pay(new Paypal('Pedro Henrique Pereira'));

// var_dump($pay);

// $name = "Pedro Henrique";
// $position = "Desenvolvimento PHP - Laravel";
// $openToWork = true;

// $result = match ($openToWork) 
// {
//     true => "Sua curtida e seu comentário podem me ajudar a alterar o status openToWork para false. 
//     <BR/>Olá rede! Me chamo $name, desenvolvedor de carreira atuando com $position. 
//     <BR/>Estou em busca de uma nova oportunidade que me deixe com brilho no olhar em poder contribuir com o time. 
//     <BR/>Se você souber de alguma vaga que possa ser do meu interesse, não hesite em entrar em contato comigo ou mencionar nos comentários. 
//     <BR/>Obrigado pela sua ajuda!"
// };
// $result = 'oi';
// $result1 = 'oi';
// $cars = array ("Volvo", "BMW", "Toyota");
// $value = 'something from somewhere';
// setcookie("TestCookie", $value);
// echo $_COOKIE["TestCookie"];

// var_dump($_SERVER);
/** */
// var_dump(__DIR__.'/');
$fp = fopen(__DIR__ . '/teste.txt', 'r');
while ($row = fgetcsv($fp, 0, ";")) {
   $liste[] = [$row[0] . " " . $row[1] . "." . $row[2]];
}
fclose($fp);
print_r($liste);

// $foo = 25;
// $bar = null;
// $bar = &$foo; //Neste exemplo, $bar é uma referência para $foo. Portanto, quando o valor de $bar é alterado para ‘Mundo’, o valor de $foo também muda para ‘Mundo’. 
// $foo = 10;
// $bar++;
// echo $bar;

// function algo(&$array)
// {
//     $len = count($array);
//     for ($i = 0; $i < $len; $i++) {
//         # code...
//         for ($j = 0; $j < $len; $j++) {
//             # code...
//             $y = $array[$i];
//             // var_dump($len . '<br/>');
//             $array[$i] = $array[$j];
//             // var_dump($array[$i] . '<br/>');
//             $array[$j] = $y;
//         }
//     }
//     return $array;
// }
// $arr = [3, 1, 2];
// var_dump(algo($arr));
// var_dump(implode(algo($arr)));

//resposta 2, 3, 1

// Ao desenvolver uma nova funcionalidade em PHP para um sistema de gerenciamento de tarefas, como você abordaria os testes unitários?

// a) Ignorar os testes unitários, pois eles são desnecessários para o desenvolvimento eficiente.
// b) Criar testes que cubram cenários de uso normais e casos de borda para garantir a robustez da funcionalidade.
// c) Limitar os testes unitários apenas à camada de apresentação, pois as funcionalidades principais não necessitam de teste
// d) Utilizar apenas testes de integração, pois são mais abrangentes do que os testes unitários.
// e) Nenhuma das opções.

// Você está desenvolvendo um sistema de comércio eletrônico e precisa integrar um serviço de pagamento online. Qual abordagem é mais apropriada para consumir a API de pagamento?

// a) Utilizar a função file_get_contents() para fazer uma requisição HTTP direta à API.
// b) Implementar uma solicitação HTTP com a biblioteca cURL para interagir com a API de pagamento.
// c) Utilizar apenas chamadas AJAX no lado do cliente para acessar diretamente a API de pagamento.
// d) Incorporar a API de pagamento diretamente no código-fonte, sem interações HTTP.
// e) Nenhuma das opções.

// function algo(&$array) {
//     $len = count($array);
//     for ($i = 0; $i < $len; $i++) {
//         for ($j = 0; $j < $len; $j++) {
//             $y = $array[$i];
//             $array[$i] = $array[$j];
//             $array[$j] = $y;
//         }
//     }
//     return $array;
// }

// $array = [3, 1, 2];
// var_dump(algo($array));

// echo strip_tags('Esse é meu comentário com XSS <script src=”http://attackersite.com/authstealer.js”> </script>');

$array = [1, 2, 3, 4, 5];
foreach ($array as $key => $value) {
   echo '<br/>';
   var_dump($value);
   if ($value == 3) return;
}
