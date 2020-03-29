<html>
	<head>

		<? $header_image = rand(1,4);?>

	</head>
	
	<body>
		<!-- a mudança da imagem ocorre apos atualização da página -->
		<img src="/cidade/header_<? echo $header_image; ?>.png" alt="header" />
	
	</body>
</html>