<html>
	<body>
	
		<?php
			include "conectar.inc";
			
			if ($_POST['cadastrar'])
			{
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
				
				$consultacpf = mysql_query("SELECT * FROM usucli WHERE cpfecnpj='$cpf'");
				$consulta1 = mysql_num_rows($consultacpf);
				$consultaemail = mysql_query("SELECT * FROM usucli WHERE email='$email'");
				$consulta2 = mysql_num_rows($consultaemail);
				
				if(empty($nome["nome"]))
				{
					echo "Digite seu <b><u>Nome</u></b>.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($sobrenome["sobrenome"]))
				{
					echo "Digite seu <b><u>Sobrenome</u></b>.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($cpf["cpfecnpj"]))
				{
					echo "Digite seu <b><u>CPF ou CNPJ</u></b>.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif($consulta1 != 0)
				{
					echo "<b><u>CPF/CNPJ</u></b> já cadastrado";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($email["email"]))
				{
					echo "Digite seu <b><u>E-mail</u></b>.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif($consulta2 != 0)
				{
					echo "<b><u>E-mail</u></b> ja cadastrado";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($telefone["telefone"]))
				{
					echo "Digite o numero do seu <b><u>Telefone</u></b>.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($endereco["endereco"]))
				{
					echo "Digite o <b><u>Endereço</u></b> de onde você mora.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($numero["numero"]))
				{
					echo "Digite o <b><u>Numero</u></b> de onde você mora.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($bairro["bairro"]))
				{
					echo "Digite o <b><u>Bairro</u></b> de onde você mora.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($cidade["cidade"]))
				{
					echo "Digite o nome da <b><u>Cidade</u></b> onde você mora.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($estado["estado"]))
				{
					echo "Escolha seu <b><u>Estado</u></b>.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				elseif(empty($cep["cep"]))
				{
					echo "Digite o <b><u>CEP</u></b> de onve você mora.";
					echo "<br><a href=\"cadusucli.html\">Voltar</a>";
				}
				else
				{
					$query = "INSERT INTO usucli VALUES ('','$pessoa','$nome','$sobrenome','$empresa','$cpf','$email','$telefone','$endereco','$numero','$bairro','$cidade','$estado','$cep','')";
					mysql_query($query);
					
					echo "Cadastro de Usuário realizado com sucesso.";
		?>
			<form method="POST" action="umcliente.php">
				<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
				<input type="hidden" name="pessoa" value="<?php echo $pessoa; ?>">
				<input type="hidden" name="nome" value="<?php echo $nome; ?>">
				<input type="hidden" name="sobrenome" value="<?php echo $sobrenome; ?>">
				<input type="hidden" name="empresa" value="<?php echo $empresa; ?>">
				<input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
				<input type="hidden" name="email" value="<?php echo $email; ?>>
				<input type="hidden" name="telefone" value="<?php echo $telefone; ?>">
				<input type="hidden" name="endereco" value="<?php echo $endereco; ?>">
				<input type="hidden" name="numero" value="<?php echo $numero; ?>>
				<input type="hidden" name="bairro" value="<?php echo $bairro; ?>">
				<input type="hidden" name="cidade" value="<?php echo $cidade; ?>">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>>
				<input type="hidden" name="cep" value="<?php echo $cep; ?>">
				
				<input type="submit" value="Ver cliente cadastrado">
			</form>
			
			<form method="POST" action="cadusucli.html">
				<input type="submit" value="Cadastrar outro cliente">
			</form>
		<?php
				}
			}

			mysql_close($conexao);
		?>
	</body>
</html>