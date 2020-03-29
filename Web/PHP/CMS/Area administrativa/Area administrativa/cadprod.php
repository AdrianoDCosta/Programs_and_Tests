<html>
	<body>
<?php

	include "conectar.inc";
	
	if ($_POST['cadastrar'])
	{
		$codigo=$_POST['codigo'];
		$nome=$_POST['nome'];
		$preco=$_POST['preco'];
		$quantidade=$_POST['quantidade'];
		$cor=$_POST['cor'];
		$categoria=$_POST['categoria'];
		$foto=$_FILES["foto"];
		$informacoes=$_POST['informacoes'];
		
		$sql = mysql_query("SELECT * FROM produtos WHERE codigo='$codigo'");
		$linhas = mysql_num_rows($sql);
		$sql2 = mysql_query("SELECT * FROM produtos WHERE nome='$nome'");
		$linhas2 = mysql_num_rows($sql2);
		
		if(empty($codigo["codigo"]))
		{
			echo "Digite o <b><u>Código</u></b> do produto.";
			echo "<br><a href=\"cadprod.html\">Voltar</a>";
		}
		elseif(empty($nome["nome"]))
		{
			echo "Digite o <b><u>Nome</u></b> do produto.";
			echo "<br><a href=\"cadprod.html\">Voltar</a>";
		}
		elseif($linhas2 != 0)
		{
			echo "O Nome digitado já se encontra cadastrado";
			echo "<br><a href=\"cadprod.html\">Voltar</a>";
		}
		elseif(empty($preco["preco"]))
		{
			echo "Digite o <b><u>Preço</u></b> do produto.";
			echo "<br><a href=\"cadprod.html\">Voltar</a>";
		}
		elseif(empty($quantidade["quantidade"]))
		{
			echo "Digite a <b><u>Quantidade</u></b> de produtos você tem para venda.";
			echo "<br><a href=\"cadprod.html\">Voltar</a>";
		}
		elseif (!empty($foto["name"]))
		{
			$largura = 160;
			$altura = 180;
			$tamanho = 1000;
			
			if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"]))
			{
				$error[1] = "Isso não é uma imagem.";
			}
			
			$dimensoes = getimagesize($foto["tmp_name"]);
			
			if($dimensoes[0] > $largura)
			{
				$error[2] = "A largura da imagem não pode ultrapassar " . $largura . " Pixels";
			}
			if($dimensoes[1] > $altura)
			{
				$error[3] = "A altura da imagem não pode ultrapassar " . $altura . " Pixels";
			}
			if($arquivo["size"] > $tamanho)
			{
				$error[4] = "A imagem tem de ser no maximo " . $tamanho . " Bytes";
			}
			if(count($error) == 0)
			{
				preg_match("/\.(gif|bmp|png|jpg|jpeg)(1)$/i", $foto["name"], $ext);
				
				$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
				$caminho_imagem = "fotos/" . $nome_imagem;
				
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
				
				$sql = mysql_query("INSERT INTO produtos VALUES ('".$codigo."', '".$nome."', '".$preco."', '".$quantidade."', '".$cor."', '".$categoria."', '".$nome_imagem."', '".$informacoes."')");
				
				if($sql)
				{
					echo "Produto cadastrado com sucesso.";
				?>
					<form method="POST" action="umproduto.php">
						<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
						<input type="hidden" name="nome" value="<?php echo $nome; ?>">
						<input type="hidden" name="preco" value="<?php echo $preco; ?>">
						<input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
						<input type="hidden" name="cor" value="<?php echo $cor; ?>">
						<input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
						<input type="hidden" name="foto" value="<img src='fotos/"<?php echo $foto->foto; ?>>
						<input type="hidden" name="informacoes" value="<?php echo $informacoes; ?>">
						
						<input type="submit" value="Ver produto cadastrado">
					</form>
					
					<form method="POST" action="cadprod.html">
						<input type="submit" value="Cadastrar outro produto">
					</form>
				<?php
				}
			}
			
			if (count($error) != 0)
			{
				foreach ($error as $erro)
				{
				echo $erro . "<br />";
				}
			}
		}
		else
		{
			$sql2 = "INSERT INTO produtos VALUES ('".$codigo."', '".$nome."', '".$preco."', '".$quantidade."', '".$cor."', '".$categoria."', '', '".$informacoes."')";
			mysql_query($sql2);
			echo "Produto Cadastrado com sucesso. --> Sem foto <--";
		?>
			<form method="POST" action="umproduto.php">
				<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
				<input type="hidden" name="nome" value="<?php echo $nome; ?>">
				<input type="hidden" name="preco" value="<?php echo $preco; ?>">
				<input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
				<input type="hidden" name="cor" value="<?php echo $cor; ?>">
				<input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
				<input type="hidden" name="foto" value="<img src='fotos/"<?php echo $foto->foto; ?>>
				<input type="hidden" name="informacoes" value="<?php echo $informacoes; ?>">
				
				<input type="submit" value="Ver produto cadastrado">
			</form>
			
			<form method="POST" action="cadprod.html">
				<input type="submit" value="Cadastrar outro produto">
			</form>
		<?php
		}
	}
?>
	</body>
</html>