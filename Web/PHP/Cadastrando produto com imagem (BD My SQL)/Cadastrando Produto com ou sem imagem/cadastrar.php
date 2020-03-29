<?php

	include "conectar.inc";
	
	if ($_POST['cadastrar'])
	{
		$nome=$_POST['nome'];
		$preco=$_POST['preco'];
		$foto=$_FILES["foto"];
		
		if (!empty($foto["name"]))
		{
			$largura = 150;
			$altura = 180;
			$tamanho = 1000;
			
			if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"]))
			{
				$error[1] = "Isso não é uma imagem.";
			} 
	
			$dimensoes = getimagesize($foto["tmp_name"]);
	
			if($dimensoes[0] > $largura)
			{
				$error[2] = "A largura da imagem não pode ultrapassar ".$largura." pixels";
			}
			if($dimensoes[1] > $altura)
			{
				$error[3] = "A altura não pode ultrapassar " . $altura . " pixels";
			}
			if($arquivo["size"] > $tamanho)
			{
				$error[4] = "A imagem deve ter no maximo " . $tamanho . " bytes";
			}
			if(count($error) == 0)
			{
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
				
				$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
				$caminho_imagem = "fotos/" . $nome_imagem;
				
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
				
				$sql = mysql_query("INSERT INTO produt VALUES ('".$nome."', '".$preco."', '".$nome_imagem."')");
				
				if($sql)
				{
					echo "Produto cadastrado com sucesso.";
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
		else// Se não selecionar uma imagem.
		{
			$sql2 = "INSERT INTO produt VALUES ('$nome','$preco','')";
			mysql_query($sql2);
			echo "Produto Cadastrado com sucesso. --> Sem foto <--";
		}
	}
?>