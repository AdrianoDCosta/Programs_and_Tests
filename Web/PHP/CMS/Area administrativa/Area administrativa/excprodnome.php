<?php

	include "conectar.inc";
	
	if($_POST['excluir'])
	{
		$excluir=$_POST['nome'];
		$sql = mysql_query("SELECT * FROM produtos WHERE nome='$excluir'");
		$linhas = mysql_num_rows($sql);
		
		if(empty($excluir['nome']))
		{
			echo "Digite o <b><u>Nome</u></b> do produto que deseja excluir.";
			echo "<br><a href=\"excprodnome.html\">Voltar</a>";
		}
		elseif($linhas == 0)
		{
			echo "Nenhum Produto cadastrado com este Nome.";
			echo "<br><a href=\"excprodnome.html\">Voltar</a>";
		}
		else
		{
			$query = "DELETE FROM produtos WHERE nome='$excluir'";
			$resultado = mysql_query($query);
			
			echo "Produto Deletado Com sucesso";
		}
	}
	mysql_close($conexao);
?>