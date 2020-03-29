<?php
	
	$max = 100; //DEFINE A QUANTIDADE DE LINHA
	
	if(!$pagina)
	{
		$pagina = 1;
	}
	$inicio = $pagina-1;
	$inicio = $inicio * $max;
	
	include "conectar.inc";
	
	$consulta = "SELECT * FROM usucli";
	$query = mysql_query("$consulta LIMIT $inicio,$max");
	$resultado = mysql_query($consulta);
	$linhas = mysql_num_rows($resultado);

	$tp = $linhas / $max;
	$regLinha = 3; //NUMERO DE REGISTROS POR LINHA
	
		$i = ceil($max / $regLinha);
		$j = 1;
		$z = 0;
		
	echo "<table width=670px border=0><tr>";
	
	while ($mostrar = mysql_fetch_array($query))
	{
		echo "<td>
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
			<b>CEP:</b>".$mostrar['cep']."<br>
		</td>";
				
		$z++;
		if($z == $regLinha and $j < $i)
		{
			echo "</tr><tr>";
			$z = 0;
			$j++;
		}
		if($z == $regLinha and $j == $i)
		{
			echo "</tr>";
		}
	}
	echo "</table>";
	
	$prox = $pagina +1;
	$ante = $pagina -1;
	
	if($pagina>0)
	{
		echo "<a href='?pagina=$ante'>Anterior</a>";
	}
	
	echo "|";
	
	if($pagina<$tp)
	{
		echo "<a href='?pagina=$prox'>Próxima</a>";
	}
	mysql_close($conexao);
?>