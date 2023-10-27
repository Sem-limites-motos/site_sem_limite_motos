<?php 
use Application_Controller\Application_Controller;

require '../controller/Application_Controller.php';

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$endereco = $_POST["endereco"];

// print($nome ." ".$cpf." ".$endereco);

$enviar = new Application_Controller();
$dados = $enviar->Cadastrar($nome,$cpf,$endereco);






?>