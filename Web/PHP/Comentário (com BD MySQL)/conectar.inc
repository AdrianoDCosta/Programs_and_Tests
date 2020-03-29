<?php

	$conectar = mysql_connect("localhost","adriano","123456") or die ("Erro de Autenticaчуo!");
	mysql_select_db('noticias',$conectar) or die ("Nуo foi posivel selecionar o Banco de Dados!");
	
?>