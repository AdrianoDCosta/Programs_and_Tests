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
			echo "Digite o <b>C�digo</b> do produto que deseja alterar os dados";
			echo "<br><a href=\"atlprod.html\">Voltar</a>";
		}
		elseif($linhas == 0)
		{
			echo "Produto n�o encontrado. <br>Verifique o <b><u>C�digo</u></b> digitado.";
			echo "<br><a href=\"atlprod.html\">Voltar</a>";
		}
		else
		{
			while ($mostrar = mysql_fetch_object($resultado))
			{
	?>
		<form method="POST" action="atlprod2.php">
			<table>
				<tr>
					<td valign="top">
						<?php echo "<img src='fotos/" . $mostrar->foto . "'alt='foto de exibi��o'>"?>
					</td>
					<td valign="top">
						<b>C�digo:</b> <input type="text" name="codigo" size="5" value="<?php echo $mostrar->codigo ?>"><br>
						<b>Nome:</b> <?php echo $mostrar->nome ?><br>
						<b>Pre�o:</b> <input type="text" name="preco" size="10" value="<?php echo $mostrar->preco ?>"><br>
						<b>Em estoque:</b> <input type="text" name="quantidade" size="4" value="<?php echo $mostrar->quantidade ?>"><br>
						<b>Cor:</b> <input type="text" name="cor" size="20" value="<?php echo $mostrar->cor ?>"><br>
						<b>Categoria:</b> <?php echo $mostrar->categoria ?> =
						<select name="categoria">
							<option selected>: : : : : : ESCOLHA UMA CATEGORIA : : : : : : :
							<option>: : : : : : : : : : : : : DESKTOP : : : : : : : : : : : :
							<option value="computadores">Computador Completo
							<option value="computador-usado">Computador Usado
							<option value="processador-pc">Processadores p/ Desktop
							<option value="placamae-pc">Placas-m�e p/ Desktop
							<option value="memoria-pc">M�morias p/ Desktop
							<option value="hd-pc">HDs p/ Desktop
							<option value="gravador-pc">Gravadores CDs/DVDs
							<option value="cooler-pc">Coolers p/ Desktop
							<option value="fonte-pc">Fontes
							<option value="gabinete">Gabinetes
							<option value="computador-outros">Desktop - Outros
							<option>: : : : : : : : : : : : NOTEBOOK : : : : : : : : : : :
							<option value="notebooks">Notebook Completo
							<option value="processador-note">Processadores p/ Notebook
							<option value="placamae-note">Placas-m�e p/ Notebook
							<option value="placamae-note">M�morias p/ Notebook
							<option value="hd-note">HDs p/ Notebook
							<option value="gravador-note">Gravadores CDs/DVDs
							<option value="cooler-note">Coolers p/ Notebook
							<option value="bateria">Bater�as
							<option value="carregador">Caregadores
							<option value="malas">Maletas e Mochilas
							<option value="note-outros">Notebook - Outros
							<option>: : : : : : : : : : : IMPRESSORA : : : : : : : : : :
							<option value="impressoras">Impressoras
							<option value="pecas-imp">Pe�as p/ Impressoras
							<option value="cartucho-hp">Cartuchos HP
							<option value="cartucho-epson">Catuchos Epson
							<option value="cartucho-cannon">Cartuchos Cannon
							<option>: : : : : : : : : REDE e INTERNET : : : : : : : :
							<option value="modems">Modems
							<option value="roteadores">Roteadores
							<option value="placarede">Placas Rede/Adaptadores Sem Fio
							<option value="rede-outros">Rede e Internet - Outros
							<option>: : : : : : : : : : : : : : GAMES : : : : : : : : : : : : : : :
							<option value="videogame">V�deo Game
							<option value="manete"> Manetes
							<option value="game-outros">Games - Outros
							<option>: : : : : : : M�VEIS p/ ESCRIT�RIO : : : : :
							<option value="cadeiras">Cadeira
							<option value="mesas">Mesas
							<option value="gaveteiros">Gaveteiros
							<option value="moveis-outros">Moveis - Outros
							<option>: : : : : : : : : : : : : : : : CFTV : : : : : : : : : : : : : : :
							<option value="cameras">C�meras
							<option value="placascftv">Placas
							<option value="cftv-outros">CFTV - Acess�rios
							<option>: : : : : : : OUTROS PRODUTOS : : : : : :
							<option value="cameradigital">C�meras Digitais
							<option value="celular">Celulares
							<option value="pendrive">Pen Drive
							<option value="cartao">Cart�o de M�moria
							<option value="fone">Fone de Ouvido e/ou Microfone
							<option value="cabos">Cabos
							<option value="adaptadores">Adaptadores
							<option value="outros">Outros Produtos
						</select>
						<b>Informa��es:</b> <textarea name="informacoes" rows="9" cols="48"><?php echo $mostrar->informacoes ?></textarea>
						<br><br>
						<input type="submit" value="Atualizar Dados">
					</td>
				</tr>
			</table>
		</form>
	<?php
			}
		}
		mysql_close($conexao);
	?>
	</body>
</html>