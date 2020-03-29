<?php

	include "conectar.inc";
	
	$codigo=$_POST['codigo'];
	$nome=$_POST['nome'];
	$preco=$_POST['preco'];
	$quantidade=$_POST['quantidade'];
	$cor=$_POST['cor'];
	$categoria=$_POST['categoria'];
	$foto=$_FILES["foto"];
	$informacoes=$_POST['informacoes'];
	
	$query = "SELECT * FROM produtos WHERE nome='$nome'";
	$resultado = mysql_query($query,$conexao);
	
	while ($mostrar = mysql_fetch_object($resultado))
	{
		echo "<html><body><table><tr><td width=160px valign=top><img src='fotos/" . $mostrar->foto . "'alt='foto de exibição' /></td><td width=160px valign=top><font size=5>" . $mostrar->nome . "</font><br><b>Preço:</b> <font color=red>" . $mostrar->preco . "</font><br><b>Em estoque:</b> " . $mostrar->quantidade . "<br><b>Cor:</b> " . $mostrar->cor . "<br><b>Categoria:</b> " . $mostrar->categoria . "<br><b>Código:</b> " . $mostrar->codigo . "<br><hr><b><u>Informações do Produto:</u></b><br> " . $mostrar->informacoes . "</td></tr></talbe></body></html>";
	}
	mysql_close($conexao);
?>