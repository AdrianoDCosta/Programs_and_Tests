<html>
	<body>
<?php
	
	include "conectar.inc";

	$codigocli=$_POST['codigo'];
	$query1 = "SELECT * FROM usucli WHERE codigo='$codigocli'";
	$resultado1 = mysql_query($query1,$conexao);
	$linhas = mysql_num_rows($resultado1);
	
	if(empty($codigocli['codigo']))
	{
		echo "Digite o <b>Código</b> do cliente que deseja alterar os dados.";
		echo "<br><a href=\"atlusu.html\">Voltar</a>";
	}
	elseif($linhas == 0)
	{
		echo "Usuário não encontrado. <br>Verifique o <b><u>Código</u></b> digitado.";
		echo "<br><a href=\"atlusu.html\">Voltar</a>";
	}
	else
	{
		$query2 = "SELECT * FROM usucli WHERE codigo='$codigocli'";
		$resultado2 = mysql_query($query2,$conexao);
		$mostrar = mysql_fetch_array($resultado2)
?>
		<form method="POST" action="atlusu2.php">
			<table>
				<tr>
					<td>
						<b>Código: </b><?php echo $mostrar['codigo']; ?><br>
					</td>
				</tr>
				<tr>
					<td>
						<b>Pessoa: ................</b>
					</td>
					<td>
						<?php echo $mostrar['pessoa']; ?> | 
						Pessoa Física: <input type="radio" name="pessoa" value="fisica" checked> | 
						Pessoa Juridica: <input type="radio" name="pessoa" value="juridica">
					</td>
				</tr>
				<tr>
					<td>
						<b>Nome: ..................</b>
					</td>
					<td>
						<input type="text" name="nome" size="20" value="<?php echo $mostrar['nome']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Sobrenome: ..........</b>
					</td>
					<td>
						<input type="text" name="sobrenome" size="20" value="<?php echo $mostrar['sobrenome']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Empresa: ..............</b>
					</td>
					<td>
						<input type="text" name="empresa" size="30" value="<?php echo $mostrar['empresa']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>CPF/CNPJ: .........</b>
					</td>
					<td>
						<input type="text" name="cpfecnpj" size="15" value="<?php echo $mostrar['cpfecnpj']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>E-mail: .................</b>
					</td>
					<td>
						<input type="hidden" name="email" value="<?php echo $mostrar['email']; ?>"><?php echo $mostrar['email']; ?>
					</td>
				</td>
				<tr>
					<td>
						<b>Telefone: ..............</b>
					</td>
					<td>
						<input type="text" name="telefone" size="15" value="<?php echo $mostrar['telefone']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Endereço: ............</b>
					</td>
					<td>
						<input type="text" name="endereco" size="35" value="<?php echo $mostrar['endereco']; ?>">
						<b>Nº: ..</b>
						<input type="text" name="numero" size="5" value="<?php echo $mostrar['numero']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Bairro: .................</b>
					</td>
					<td>
						<input type="text" name="bairro" size="25" value="<?php echo $mostrar['bairro']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Cidade: ................</b>
					</td>
					<td>
						<input type="text" name="cidade" size="25" value="<?php echo $mostrar['cidade']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Estado: ................</b>
					</td>
					<td>
						<?php echo $mostrar['estado']; ?> | 
						<select name="estado">
							<option value="Minas Gerais" selected>MG
							<option value="São Paulo">SP
							<option value="Rio de Janeiro">RJ
							<option value="AC">AC
							<option value="Tocantins">TO
							<option value="amazonas">AM
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<b>Cep: ....................</b>
					</td>
					<td>
						<input type="text" name="cep" size="10" value="<?php echo $mostrar['cep']; ?>">
					</td>
					
					<td align="left">
						<input type="submit" value="Atualizar Dados">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
	}
	mysql_close($conexao);
?>