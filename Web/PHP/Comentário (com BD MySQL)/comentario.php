<?php
	
	include "conectar.inc";
	
	$query = "SELECT * FROM comentarios";
	$resultado = mysql_query($query);
			
	mysql_close();
		
	while ($linha = mysql_fetch_array($resultado))
		{
			echo "<b>Nome: </b>" . $linha['nome'] . "<br><br>" . $linha['comentario'] . "<br><br>";
		}	
		
?>