<?php

$msg[0] = "Erro de autenticação!";
$msg[1] = "Erro na seleção do banco de dados!";

$conexao=mysql_connect("localhost","adriano","123456") or die ($msg[0]);
mysql_select_db("produtos",$conexao) or die ($msg[1]);

?>