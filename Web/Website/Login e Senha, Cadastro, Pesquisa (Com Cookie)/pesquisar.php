<?php

	$opcao = $_POST['opcao'];
	$pesquisa = $_POST['pesquisa'];

	include "conectar.inc";

	$query = "SELECT * FROM coisas WHERE $opcao LIKE '$pesquisa%'";
	$resultado = mysql_query($query,$conexao);

	echo "<b>Resultados da Pesquisa:</b><br><br> ";
?>
<html>
	<body>
		<table border="1">
			<tr>
				<td>Nome</td>
				<td>Pre�o</td>
				<td>Descri��o</td>
			</tr>

<?php

	while ($mostrar	= mysql_fetch_array($resultado))
	{

?>

			<tr>
				<td bgcolor="gainsboro"><?php echo $mostrar['Nome']; ?></td>
				<td bgcolor="gainsboro"><?php echo $mostrar['Pre�o']; ?></td>	
				<td bgcolor="gainsboro"><?php echo $mostrar['Descri��o']; ?></td>
			</tr>

<?php
	}
	mysql_close();
?>
		</table>
	</body>
</html>