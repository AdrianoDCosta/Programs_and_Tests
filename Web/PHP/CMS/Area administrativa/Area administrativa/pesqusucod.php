<html>
	<body>
	
		<?php
			
			include "conectar.inc";
			
			$codigo = $_POST['codigo'];
			$query = "SELECT * FROM usucli WHERE codigo='$codigo'";
			$resultado = mysql_query($query,$conexao);
			$linhas = mysql_num_rows($resultado);
			
			if(empty($codigo['codigo']))
			{
				echo "Digite o <b><u>C�digo</u></b> do usu�rio.";
				echo "<br><a href=\"pesqusucod.html\">Voltar</a>";
			}
			elseif($linhas == 0)
			{
				echo "Usu�rio n�o encontrado. <br>Verifique o <b><u>C�digo</u></b> digitado.";
				echo "<br><a href=\"pesqusucod.html\">Voltar</a>";
			}
			else
			{
				while ($mostrar = mysql_fetch_array($resultado))
				{
		?>
			<table>
				<tr>
					<td>
						<b>C�digo:</b> <?php echo $mostrar['codigo'];?><bR>
						<b>Pessoa:</b> <?php echo $mostrar['pessoa'];?><br>
						<b>Nome:</b> <?php echo $mostrar['nome'];?><br>
						<b>Sobrenome:</b> <?php echo $mostrar['sobrenome'];?><br>
						<b>Empresa:</b> <?php echo $mostrar['empresa'];?><br>
						<b>CPF/CNPJ:</b> <?php echo $mostrar['cpfecnpj'];?><br>
						<b>e-mail:</b> <?php echo $mostrar['email'];?><br>
						<b>Telefone:</b> <?php echo $mostrar['telefone'];?><br>
						<b>Endere�o:</b> <?php echo $mostrar['endereco'];?> N�: <?php echo $mostrar['numero'];?><br>
						<b>Bairro:</b> <?php echo $mostrar['bairro'];?><br>
						<b>Cidade:</b> <?php echo $mostrar['cidade'];?><br>
						<b>Estado:</b> <?php echo $mostrar['estado'];?><br>
						<b>CEP:</b> <?php echo $mostrar['cep'];?><br>
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