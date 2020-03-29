<html>
	<head>
		<title>Fale conosco</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body onselectstart='return false'>
	
		<div id="formulario">
			<form method="POST" name="email" enctype="multipart/form-data">
				<label>
					<span>Seu nome (obrigatório)</span>
					<input type="text" name="nome" value="<?php echo $_POST["nome"]; ?>">
				</label>
				
				<label>
					<span>Seu e-mail (obrigatório)</span>
					<input type="text" name="email" value="<?php echo $_POST["email"]; ?>">
				</label>
				
				<label>
					<span>Assunto (obrigatório)</span>
					<input type="text" name="assunto" value="<?php echo $_POST["assunto"]; ?>">
				</label>
				
				<label>
					<span>Digite sua mensagem (obrigatório)</span>
					<textarea name="mensagem"></textarea>
				</label>

				<button type="submit" name="enviar" value="Enviar">Enviar</button>
				
			</form>
		</div>
		
	</body>	
</html>

<?php

	if ($_POST['enviar']){
		
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$assunto = $_POST["assunto"];
		$mensagem = $_POST["mensagem"];

		$para = "email do destinatário";

		if(empty($nome["nome"])){
			echo "<h3 class='validar'>Preencha o campo nome!</h3>";
		}elseif(empty($email["email"])){
			echo "<h3 class='validar'>Informe seu email!</h3>";
		}elseif(empty($assunto["assunto"])){
			echo "<h3 class='validar'>Digite o assunto!</h3>";
		}elseif(empty($mensagem["mensagem"])){
			echo "<h3 class='validar'>Digite sua mensagem!</h3>";
		}else{
		
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: \"$nome\" <$email>\r\n";
		$headers .= "Content-type: text/html; charset=\"UTF-8\"";

		$msg = "<html><b><font size=\"3\">Nome: </font></b>$nome<br><br><b><font size=\"3\">E-mail: </font></b>$email<br><br><b><font size=\"3\">$nome </font>escreveu o seguinte:</b><br><br>$mensagem</html>";

		mail($para, $assunto, $msg, $headers);

		echo "<h3 class='enviado'>Mensagem enviada com sucesso!</h3>";
		}
	}
?>