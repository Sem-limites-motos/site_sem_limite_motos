<?php 
use Application_Controller\Application_Controller;

require '../controller/Application_Controller.php';

$voucher = $_POST['voucher'];
$valor_total_carrinho  = $_POST['total'];
$enviar_dados = new Application_Controller();
$levar_dados = $enviar_dados->Voucher($voucher,$valor_total_carrinho);



?>