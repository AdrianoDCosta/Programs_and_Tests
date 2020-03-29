<?php
	
	$nome=$_POST['nome'];
	$comentario=$_POST['comentario'];
	
	include "conectar.inc";

	$query1 = "INSERT INTO comentarios VALUES ('$nome','$comentario')";
	$resultado1 = mysql_query($query1);
	
	$query2 = "SELECT * FROM comentarios";
	$resultado2 = mysql_query($query2);
		
	mysql_close();
	
	while ($linha = mysql_fetch_array($resultado2))
		{
			echo "<b>Nome: </b>" . $linha['nome'] . "<br><br>" . $linha['comentario'] . "<br><br>";
		}	
?>