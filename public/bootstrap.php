<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");
    header("X-Powered-By");
    http_response_code(200);
    return;
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

use app\core\Controller;
use app\enums\Environment;

require '../vendor/autoload.php';

session_start();

$core = new Controller;

if (Environment::Production->getEnvironment()) {
    ini_set('display_erros', 0);
    ini_set('display_startup_erros', 0);
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}
