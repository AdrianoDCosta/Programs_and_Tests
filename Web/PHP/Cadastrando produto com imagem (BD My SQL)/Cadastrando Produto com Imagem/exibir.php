<?php
	
	include "conectar.inc";
	
	$sql = mysql_query("SELECT * FROM produt ORDER BY Nome");
	
	while ($usuario = mysql_fetch_object($sql))
	{
		echo "<img src='fotos/" . $usuario->Foto . "' alt='Foto de exibição' /><br />";
		echo "<b>Nome:</b> " . $usuario->Nome . "<br />";
		echo "<b>Preço:</b> " . $usuario->Preço . "<br /><br />";
	}
?>