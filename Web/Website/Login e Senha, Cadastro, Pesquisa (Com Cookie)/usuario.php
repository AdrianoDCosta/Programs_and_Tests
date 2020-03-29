<?php
    include "conectar.inc";
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM usuarios WHERE Nome = '$usuario'";
    $resultado = mysql_query($sql);
    $linhas = mysql_num_rows($resultado);
     
	if($linhas == 0)
	{
		echo "<html><body>Usuario Inexistente<br>";
		echo "<a href=\"principal.htm\" target=\"principal\">Voltar</a></body></html>";
	}
	else
	{
		if($senha != mysql_result($resultado,0,"senha"))
		{
			echo "<html><body>Senha Inválida<br>";
			echo "<a href=\"principal.htm\" target=\"principal\">Voltar</a></body></html>";
		}
		else
		{
			setcookie("nome_usuario",$usuario);
			setcookie("senha",$senha);
			echo "<html>
					<body>
						<table>
							<tr>
								<td>
									<form method=\"POST\" action=\"cadastro.php\" target=\"conteudo\">

										Nome: <input type=\"text\" name=\"nome\"><br>
										Preço: <input type=\"text\" name=\"preco\"><br>
										Descrição: <input type=\"text\" name=\"descricao\"><br><br>
								</td>
								<td>
										<input type=\"submit\" value=\"Cadastrar\">
									</form>
								</td>
							</tr>
						</table>
					</body>
				</html>";
		}
	}
	mysql_close($conexao);
?>