<html>
	<head>
	
	</head>
	
	<body
		
		<?php
			include 'contador.php';
			   if (isset($_COOKIE['counte'])) {
			  } else {
				$counte = 1;
				$qtd++;
			}
			setcookie('counte', time()+7776000);
			$abre =@fopen("contador.php","w");
			$ss ='<?php $qtd='.$qtd.'; ?>';
			$escreve =fwrite($abre, $ss);
		?> 

		<!-- colocar o código abaixo onde voce quer que seja exibido o contador -->
		<?php
			echo $qtd;
		?>
		
	</body>
</html>