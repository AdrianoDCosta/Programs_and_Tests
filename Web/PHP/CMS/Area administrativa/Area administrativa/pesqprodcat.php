<?php
	
	$max = 100; //DEFINE A QUANTIDADE DE LINHAS
	
	if(!$pagina)
	{
		$pagina = 1;
	}
	$inicio = $pagina-1;
	$inicio = $inicio * $max;
	
	include "conectar.inc";
	
	$categoria = $_POST['categoria'];
	$consulta = "SELECT * FROM produtos WHERE categoria LIKE '$categoria'";
	$query = mysql_query("$consulta LIMIT $inicio,$max");
	$resultado = mysql_query($consulta);
	$linhas = mysql_num_rows($resultado);

	if($linhas == 0)
	{
		echo "Nenhum <b><u>Produto</u></b> disponivel ainda.";
		echo "<br><a href=\"pesqprodcat.html\">Voltar</a>";
	}
	else
	{
		$tp = $linhas / $max;
		$regLinha = 2; //NUMERO DE REGISTROS POR LINHA
		
			$i = ceil($max / $regLinha);
			$j = 1;
			$z = 0;
			
		echo "<table border=0><tr>";
		
		while ($mostrar = mysql_fetch_object($query))
		{
			echo "<td width=160px valign=top><img src='fotos/" . $mostrar->foto . "'alt='foto de exibição' /></td><td width=160px valign=top><font size=5>" . $mostrar->nome . "</font><br><b>Preço:</b> <font color=red>" . $mostrar->preco . "</font><br><b>Em estoque:</b> " . $mostrar->quantidade . "<br><b>Cor:</b> " . $mostrar->cor . "<br><b>Categoria:</b> " . $mostrar->categoria . "<br><b>Código:</b> " . $mostrar->codigo . "<br><hr><b><u>Informações do Produto:</u></b><br> " . $mostrar->informacoes . "</td>";
					
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
	}
?>