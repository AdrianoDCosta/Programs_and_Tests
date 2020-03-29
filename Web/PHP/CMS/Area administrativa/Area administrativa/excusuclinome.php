<?php

	include "conectar.inc";
	
	if($_POST['excluir'])
	{
		$excluir=$_POST['nome'];
		$sql = mysql_query("SELECT * FROM usucli WHERE nome='$excluir'");
		$linhas = mysql_num_rows($sql);
		
		if(empty($excluir['codigo']))
		{
			echo "Digite o <b><u>Nome</u></b> do cliente que deseja excluir.";
			echo "<br><a href=\"excusuclinome.html\">Voltar</a>";
		}
		elseif($linhas == 0)
		{
			echo "Nenhum Cliente cadastrado com este Nome.";
			echo "<br><a href=\"excusuclinome.html\">Voltar</a>";
		}
		else
		{
			$query = "DELETE FROM usucli WHERE nome='$excluir'";
			$resultado = mysql_query($query);
			
			echo "Cliente Deletado Com sucesso";
		}
	}
	mysql_close($conexao);
?>