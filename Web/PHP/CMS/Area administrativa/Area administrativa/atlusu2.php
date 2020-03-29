<?php
	include "conectar.inc";
	
	$codigo=$_POST['codigo'];
	$pessoa=$_POST['pessoa'];
	$nome=$_POST['nome'];
	$sobrenome=$_POST['sobrenome'];
	$empresa=$_POST['empresa'];
	$cpf=$_POST['cpfecnpj'];
	$email=$_POST['email'];
	$telefone=$_POST['telefone'];
	$endereco=$_POST['endereco'];
	$numero=$_POST['numero'];
	$bairro=$_POST['bairro'];
	$cidade=$_POST['cidade'];
	$estado=$_POST['estado'];
	$cep=$_POST['cep'];
	
	$query = "UPDATE usucli SET pessoa='$pessoa', nome='$nome', sobrenome='$sobrenome', empresa='$empresa', cpfecnpj='$cpf', telefone='$telefone', endereco='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' WHERE email='$email'";
	$resultado = mysql_query($query,$conexao);
	
	echo "Dados atualizados com sucesso";
	
	mysql_close($conexao);
?>
<html>
	<body>
		<form method="POST" action="exibircliatl.php">
				<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
				<input type="hidden" name="pessoa" value="<?php echo $pessoa; ?>">
				<input type="hidden" name="nome" value="<?php echo $nome; ?>">
				<input type="hidden" name="sobrenome" value="<?php echo $sobrenome; ?>">
				<input type="hidden" name="empresa" value="<?php echo $empresa; ?>">
				<input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
				<input type="hidden" name="email" value="<?php echo $email; ?>">
				<input type="hidden" name="telefone" value="<?php echo $telefone; ?>">
				<input type="hidden" name="endereco" value="<?php echo $endereco; ?>">
				<input type="hidden" name="numero" value="<?php echo $numero; ?>">
				<input type="hidden" name="bairro" value="<?php echo $bairro; ?>">
				<input type="hidden" name="cidade" value="<?php echo $cidade; ?>">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>">
				<input type="hidden" name="cep" value="<?php echo $cep; ?>">
				
				<input type="submit" value="Ver dados cadastrados">
			</form>
			
			<form method="POST" action="atlusu.html">
				<input type="submit" value="Atualizar dados de outro Cliente">
			</form>
	</body>
</html>
