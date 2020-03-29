<?php

	include "conectar.inc";
	
	if($_POST['excluir'])
	{
		$excluir=$_POST['codigo'];
		$sql = mysql_query("SELECT * FROM usucli WHERE codigo='$excluir'");
		$linhas = mysql_num_rows($sql);
		
		if(empty($excluir['codigo']))
		{
			echo "Digite o <b><u>Código</u></b> do cliente que deseja excluir.";
			echo "<br><a href=\"excusuclicod.html\">Voltar</a>";
		}
		elseif($linhas == 0)
		{
			echo "Nenhum Cliente cadastrado com este Código.";
			echo "<br><a href=\"excusuclicod.html\">Voltar</a>";
		}
		else
		{
			$query = "DELETE FROM usucli WHERE codigo='$excluir'";
			$resultado = mysql_query($query);
			
			echo "Cliente Deletado Com sucesso";
		}
	}
	mysql_close($conexao);
?>