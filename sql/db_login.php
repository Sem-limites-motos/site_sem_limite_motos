<?php 
use Application_Controller\Application_Controller;

require '../controller/Application_Controller.php';


$gmail = $_POST['gmail'];
$senha = $_POST['senha'];


if(isset($_POST['gmail']) || isset($_POST['senha'])){

    if(strlen($_POST['gmail']) == 0){
        echo "Preencher gmail";
    }else if(strlen($_POST['senha']) == 0){
        echo "Preencher Senha";
    }
}
$enviar_dados = new Application_Controller();
$enviar_dados->Logar($gmail, $senha);




?>