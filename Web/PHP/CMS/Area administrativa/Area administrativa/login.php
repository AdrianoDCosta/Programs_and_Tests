<?php
	include "conectar.inc";
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$sql = "SELECT * FROM usuadm WHERE Nome = '$usuario'";
	$resultado = mysql_query($sql);
	$linhas = mysql_num_rows($resultado);
	
	if(empty ($usuario['usuario']) and empty($senha['senha']))
	{
		echo "<html><body>Digite o seu <b>Nome de Usuário</b> e sua <b>Senha</b> para entrar no Sistema<br>";
		echo "<a href=\"administrar.html\">Voltar</a></body></html>";
	}
	elseif($linhas==0)
	{
		echo "<html><body>Usuário Inexistente<br>";
		echo "<a href=\"administrar.html\">Voltar</a></body></html>";
	}
	else
	{
		if($senha != mysql_result($resultado,0,"senha"))
		{
			echo "<html><body>Senha Inválida<br>";
			echo "<a href=\"administrar.html\">Voltar</a></body></html>";
		}
		else
		{
			setcookie("nome_usuario",$usuario);
			setcookie("senha",$senha);
			echo "Nome de Usuário e Senha confirmados <br><br>";
		?>
			<html>
				<body>
					
					<form method="POST" action="manutencao.php">
						<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
						<input type="hidden" name="senha" value="<?php echo $senha; ?>">
						
						<input type="submit" value="Clique aqui para entrar no Sistema">
					</form>
				</body>
			</html>
		<?php
		}
	}
	mysql_close($conexao);
?>
