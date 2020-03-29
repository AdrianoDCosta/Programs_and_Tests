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
	
	$query = "SELECT * FROM usucli WHERE email='$email'";
	$resultado = mysql_query($query,$conexao);
	
	while ($mostrar = mysql_fetch_array($resultado))
	{
		echo "<table border=0><tr><td>
			<b>Código:</b>".$mostrar['codigo']."<br>
			<b>Pessoa:</b>".$mostrar['pessoa']."<br>
			<b>Nome:</b>".$mostrar['nome']."<br>
			<b>Sobrenome:</b>".$mostrar['sobrenome']."<br>
			<b>Empresa:</b>".$mostrar['empresa']."<br>
			<b>CPF/CNPJ:</b>".$mostrar['cpfecnpj']."<br>
			<b>e-mail:</b>".$mostrar['email']."<br>
			<b>Telefone:</b>".$mostrar['telefone']."<br>
			<b>Endereço:</b>".$mostrar['endereco']."Nº: ".$mostrar['numero']."<br>
			<b>Bairro:</b>".$mostrar['bairro']."<br>
			<b>Cidade:</b>".$mostrar['cidade']."<br>
			<b>Estado:</b>".$mostrar['estado']."<br>
			<b>CEP:</b>".$mostrar['cep']."</td></tr></table>";
	}	
	mysql_close($conexao);
?>