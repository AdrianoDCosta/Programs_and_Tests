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
				<td>Preço</td>
				<td>Descrição</td>
			</tr>

<?php

	while ($mostrar	= mysql_fetch_array($resultado))
	{

?>

			<tr>
				<td bgcolor="gainsboro"><?php echo $mostrar['Nome']; ?></td>
				<td bgcolor="gainsboro"><?php echo $mostrar['Preço']; ?></td>	
				<td bgcolor="gainsboro"><?php echo $mostrar['Descrição']; ?></td>
			</tr>

<?php
	}
	mysql_close();
?>
		</table>
	</body>
</html>