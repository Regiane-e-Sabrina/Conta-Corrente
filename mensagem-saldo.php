<?php  
header("Content-Type: application/json; charset=UTF-8");
$valor = isset($_GET["valor"]) ? $_GET["valor"] : "";
?>
{
	"saudacao" : "Operação realizada com sucesso. Saldo atual R$<?=$valor?>"
}