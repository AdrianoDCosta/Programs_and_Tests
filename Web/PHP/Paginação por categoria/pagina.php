<?php
	
	include "conectar.inc";
	
	$numreg = 3;
	
	if (!isset($pg)) {
		$pg = 0;
	}
	
	$inicial = $_GET['pg']*$numreg;
	
	$categoria = $_GET['categoria'];
	
	$consulta = mysql_query("SELECT * FROM imoveis WHERE categoria LIKE '$categoria' LIMIT $inicial, $numreg ");
	
	$sql_conta = mysql_query("SELECT categoria FROM imoveis WHERE categoria='$categoria'");
	
	$quantreg = mysql_num_rows($sql_conta);
	
	include("paginacao.php");
	
	echo "<br><br>";

	while($mostrar = mysql_fetch_object($consulta))
		{
			echo "<tr><td><table border=0><td width=150px height=112 rowspan=2 align=center valign=middle border=0><img src='imagens/imoveis/img_abertura/" . $mostrar->foto . "'alt='Imagem' width='150' /></td><td width=350px align=center><b><u>". $mostrar->nome . "</td></tr><tr><td align=left valign=middle>" . $mostrar->descricao . "</td></tr><tr><td colspan=2 align=center><a href='" . $mostrar->id . "'>Detalhes</a></td></tr></table>";
		}
?>