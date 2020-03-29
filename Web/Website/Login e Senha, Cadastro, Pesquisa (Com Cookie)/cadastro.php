<?php

	$nome=$_POST['nome'];
	$preco=$_POST['preco'];
	$descricao=$_POST['descricao'];

	include "conectar.inc";

	$query1 = "INSERT INTO coisas VALUES ('$nome','$preco','$descricao')";
	mysql_query($query1);

	$query2 = "SELECT Nome, Preço, Descrição FROM coisas";
	$resultado2 = mysql_query($query2,$conexao);

	echo "<i> Cadastro realizado com sucesso!</i>";

?>
	<body>
		<table border="1">
			<tr>
				<td>Nome</td>
				<td>Preço</td>
				<td>Descrição</td>
			</tr>


<?php

	while ($mostrar	= mysql_fetch_array($resultado2))
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