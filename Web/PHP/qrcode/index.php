<html>
	<head>
		<title> QRCode </title>
	</head>
	<body>
		<form method="post">
			Texto para o QRCode: <br/><input type="text" name="texto" required/><br/><br/>
			
			<input type="submit" value="GerarQRCode"/><br/><br/>
			<input type="hidden" name="gerado" value="S">
			
		<?php
			if (isset($_POST['gerado'])){
				
				require("phpqrcode/phpqrcode.php");
				
				$texto = $_POST['texto'];
				$qrcode = $texto . "\n";
			
				QRCode::png($qrcode, "Imagem_QRCode_H.png", QR_ECLEVEL_H);

				echo  '<div style="float: left; border: 1px solid #000;"> <img src="Imagem_QRCode_H.png"/> </div>';
			}
		?>

	</body>
</html>