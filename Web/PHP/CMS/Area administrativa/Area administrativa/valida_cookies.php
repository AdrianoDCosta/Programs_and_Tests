<?php
	
	if(!(empty($nome_usuario) OR empty($senha)))
	{
		include "conectar.inc";
		$sql = "SELECT * FROM usuadm WHERE Nome = '$nome_usuario'";
		$resultado = mysql_query($sql);
		$linhas = mysql_num_rows($resultado);
		
		if($linhas==1)
		{
			if($senha != mysql_result($resultado,0,"senha"))
			{
				setcookie("nome_usuario");
				setcookie("senha");
				echo "Você não efetuou o login";
				exit;
			}
		}
		else
		{
			setcookie("nome_usuario");
			setcookie("senha");
			echo "Você não efetuou o login";
			exit;
		}
	}
	else
	{
		echo "Você não efetuou o login";
		exit;
	}
	mysql_close($conexao);
?>