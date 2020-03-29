<?php

	include "conectar.inc";
	
	$codigo=$_POST['codigo'];
	$nome=$_POST['nome'];
	$preco=$_POST['preco'];
	$quantidade=$_POST['quantidade'];
	$cor=$_POST['cor'];
	$categoria=$_POST['categoria'];
	$foto=$_FILES["foto"];
	$informacoes=$_POST['informacoes'];
	
	$query = "UPDATE produtos SET codigo='$codigo', preco='$preco', quantidade='$quantidade', cor='$cor', categoria='$categoria', informacoes='$informacoes' WHERE nome='$nome'";
	$resultado = mysql_query($query,$conexao);
	
	echo "Dados atualizados com sucesso";
	
	mysql_close($conexao);
?>
<html>
	<body>
		<form method="POST" action="exibirprodatl.php">
			<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
			<input type="hidden" name="nome" value="<?php echo $nome; ?>">
			<input type="hidden" name="preco" value="<?php echo $preco; ?>">
			<input type="hidden" name="cor" value="<?php echo $cor; ?>">
			<input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
			<input type="hidden" name="foto" value="<?php echo $foto; ?>">
			<input type="hidden" name="informacoes" value="<?php echo $informacoes; ?>">
		
			<input type="submit" value="Ver dados atualizados">
		</form>
		<form method="POST" action="atlprod.html">
			<input type="submit" value="Atualizar dados de outro Produto">
		</form>
	</body>
</html>