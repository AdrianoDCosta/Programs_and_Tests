// Contador - Colocar antes da tag HTML

<?php // Contador de visitas
	$qtd=0;
	include 'contador.php';
	   if (isset($_COOKIE['counte'])) {
			$counte = $_COOKIE['counte'] + 1;
	  } else {
		$counte = 1;
		$qtd++;
	}
	setcookie('counte', "counte", time() + 7776000);
	$abre =@fopen("contador.php","w");
	$ss ='<?php $qtd='.$qtd.'; ?>';
	$escreve =fwrite($abre, $ss);
?>

// Chamando o contador - Colocar aonde quiser no código
<?php
	echo $qtd;
?>

