<?php
	
	include "conectar.inc";
	
	$sql = mysql_query("SELECT * FROM produt ORDER BY Nome");
	
	while ($usuario = mysql_fetch_object($sql))
	{
		echo "<img src='fotos/" . $usuario->Foto . "' alt='Foto de exibi��o' /><br />";
		echo "<b>Nome:</b> " . $usuario->Nome . "<br />";
		echo "<b>Pre�o:</b> " . $usuario->Pre�o . "<br /><br />";
	}
?>