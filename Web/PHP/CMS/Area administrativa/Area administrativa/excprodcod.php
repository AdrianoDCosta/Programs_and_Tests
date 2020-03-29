<?php

	include "conectar.inc";
	
	if($_POST['excluir'])
	{
		$excluir=$_POST['codigo'];
		$sql = mysql_query("SELECT * FROM produtos WHERE codigo='$excluir'");
		$linhas = mysql_num_rows($sql);
		
		if(empty($excluir['codigo']))
		{
			echo "Digite o <b><u>Código</u></b> do produto que deseja excluir.";
			echo "<br><a href=\"excprodcod.html\">Voltar</a>";
		}
		elseif($linhas == 0)
		{
			echo "Nenhum Produto cadastrado com este Código.";
			echo "<br><a href=\"excprodcod.html\">Voltar</a>";
		}
		else
		{
			$query = "DELETE FROM produtos WHERE codigo='$excluir'";
			$resultado = mysql_query($query);
			
			echo "Produto Deletado Com sucesso";
		}
	}
	mysql_close($conexao);
?>