<?php
require_once(__DIR__. "/vendor/autoload.php");

use \App\WebService\ViaCep;

$dados = ViaCep::consultaEnderecoCEP('0905153');

print_r($dados);
?>