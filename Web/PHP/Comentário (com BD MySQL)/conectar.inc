<?php

	$conectar = mysql_connect("localhost","adriano","123456") or die ("Erro de Autentica��o!");
	mysql_select_db('noticias',$conectar) or die ("N�o foi posivel selecionar o Banco de Dados!");
	
?>