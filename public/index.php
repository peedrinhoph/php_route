<?php

require './bootstrap.php';
require '../app/routes/web.php';

// Classe Abstrata abstract class teste

// São utizadas quando se necessita utilizar uma implementação repetida, por exemplo, 
// classe de pagamento, CRUD, ao invés de criar uma implementação em cada class, 
// se utiliza como base a abstação, criando uma unica class abstract com as funções 
// necessarias para o processo.


// #Classes abstratas são extendidas nas classes filhas como heranca

// abstract class Payment
// {

//     // public readonly string $nomeImpresso;
//     // public readonly int     $numCartao;
//     // public readonly string $dateVencimento;
//     // public readonly int     $codSeguranca;
//     // public readonly float $value;

//     public function __construct(
//         public readonly string  $nomeImpresso,
//         public readonly int     $numCartao,
//         public readonly string  $dateVencimento,
//         public readonly int     $codSeguranca,
//         public readonly float   $value
//     ) {
//     }

//     abstract public function pay();
// }

// class PagSeguro extends Payment
// {
//     public function pay()
//     {
//         var_dump('Pagando com o PagSeguro ' . $this->value . '<br/>');
//     }
// }

// class Paypal extends Payment
// {
//     public function pay()
//     {
//         var_dump('Pagando com o Paypal ' . $this->value . '<br/>');
//     }
// }

// class Checkout
// {
//     protected array $cards;

//     public function payNow(Payment $payment)
//     {
//         $payment->pay();
//         $this->cards[] = $payment;
//     }
// }

// $checkout = new Checkout;
// $checkout->payNow(new PagSeguro('Pedro H Pereira', '9999910', '2030/08', '310', 13.75));
// $checkout->payNow(new Paypal('Juliana T Holzschuh', '9999920', '2032/08', '312', 100.75));

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
