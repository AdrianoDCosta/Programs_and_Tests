<?php

	include "conectar.inc";
	
	if ($_POST['cadastrar'])
	{
		$nome=$_POST['nome'];
		$senha=$_POST['senha'];
		
		$sql = mysql_query("SELECT * FROM usuadm WHERE nome='$nome'");
		$linhas = mysql_num_rows($sql);
		
		if(empty($nome["nome"]))
		{
			echo "Preencha o campo <B><u>Nome</u></b>";
			echo "<br><a href=\"cadusuadm.html\">Voltar</a>";
		}
		elseif($linhas != 0)
		{
			echo "Nome de usuário já cadastrado.";
			echo "<br><a href=\"cadusuadm.html\">Voltar</a>";
		}
		elseif(empty($senha["senha"]))
		{
			echo "Digite uma <b><u>Senha</u></b>.";
			echo "<br><a href=\"cadusuadm.html\">Voltar</a>";
		}
		else
		{
			$query = "INSERT INTO usuadm VALUES ('', '$nome', '$senha')";
			mysql_query($query);
			
			echo "Cadastro de Usuário Realizado Com Sucesso.";	
		}
	}
	
	mysql_close($conexao);
?>