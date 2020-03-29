<?php

	$erro1 = "Nome de Usuario ou Senha incorreto";
	$erro2 = "Não foi possivel realizar a conexão com o Banco de Dados";

	$conexao = mysql_connect("localhost","adriano","123456") or die ($erro1);
	mysql_selectdb("produtos",$conexao) or die ($erro2);
?>
