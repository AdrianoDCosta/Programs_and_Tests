<?php

	$nome=$_POST['nome'];
	$preco=$_POST['preco'];
	$descricao=$_POST['descricao'];

	include "conectar.inc";

	$query1 = "INSERT INTO coisas VALUES ('$nome','$preco','$descricao')";
	mysql_query($query1);

	$query2 = "SELECT Nome, Pre�o, Descri��o FROM coisas";
	$resultado2 = mysql_query($query2,$conexao);

	echo "<i> Cadastro realizado com sucesso!</i>";

?>
	<body>
		<table border="1">
			<tr>
				<td>Nome</td>
				<td>Pre�o</td>
				<td>Descri��o</td>
			</tr>


<?php

	while ($mostrar	= mysql_fetch_array($resultado2))
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