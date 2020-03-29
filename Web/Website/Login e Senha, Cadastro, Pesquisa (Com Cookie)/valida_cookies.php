<?php

    if(!(empty($nome_usuario) OR empty($senha)))
    {
        include "conectar.inc";
        $sql = "SELECT * FROM usuarios WHERE Nome = '$nome_usuario'";
        $resultado = mysql_query($sql);
        $linhas = mysql_num_rows($resultado);
		
		if($linhas==1)
		{
			if($senha != mysql_result($resultado,0,"senha"))
			{
				setcookie("nome_usuario");
				setcookie("senha");
				echo "Você nao efetuou o login";
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
		echo "Voce não efetuou o login";
		exit;
	}
	mysql_close($conexao);
?>