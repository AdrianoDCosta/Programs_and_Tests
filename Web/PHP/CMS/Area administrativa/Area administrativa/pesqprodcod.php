<html>
	<body>
	
		<?php
			
			include "conectar.inc";
			
			$codigo = $_POST['codigo'];
			$query = "SELECT * FROM produtos WHERE codigo='$codigo'";
			$resultado = mysql_query($query,$conexao);
			$linhas = mysql_num_rows($resultado);
			
			if(empty($codigo['codigo']))
			{
				echo "Digite o <b><u>C�digo</u></b> do produto.";
				echo "<br><a href=\"pesqprodcod.html\">Voltar</a>";
			}
			elseif($linhas == 0)
			{
				echo "Produto n�o encontrado. <br>Verifique o <b><u>c�digo</u></b> digitado.";
				echo "<br><a href=\"pesqprodcod.html\">Voltar</a>";
			}
			else
			{
				while ($mostrar = mysql_fetch_object($resultado))
				{
		?>
			<table>
				<tr>
					<td width="160px" valign="top" >
					
						<?php echo "<img src='fotos/" . $mostrar->foto . "'alt='foto de exibi��o' /></td><td width=160px valign=top><font size=5>" . $mostrar->nome . "</font><br><b>Pre�o:</b> <font color=red>" . $mostrar->preco . "</font><br><b>Em estoque:</b> " . $mostrar->quantidade . "<br><b>Cor:</b> " . $mostrar->cor . "<br><b>Categoria:</b> " . $mostrar->categoria . "<br><b>C�digo:</b> " . $mostrar->codigo . "<br><hr><b><u>Informa��es do Produto:</u></b><br> " . $mostrar->informacoes;?>
					</td>
				</tr>
			</table>
		<?php
				}
			}
			mysql_close($conexao);
		?>
	</body>
</html>