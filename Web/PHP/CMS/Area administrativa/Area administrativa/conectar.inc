<?php
	$msg1 = "Nome de usu�rio ou Senha incorreto";
	$msg2 = "N�o foi possivel realizar a conex�o com o Banco de Dados";
	
	$conexao = mysql_connect("localhost","adriano","123456") or die ($msg1);
	mysql_selectdb("loja",$conexao) or die ($msg2);
?>