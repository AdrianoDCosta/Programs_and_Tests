<html>
	<head>
		<link rel="stylesheet" type="text/css" href="pagmanutencao.css">
		
		<!-- O Internet Explorer suporta somente a pseudo-classe :hover aplicada a um link.
		Dessa forma, li:hover, que faz os sub-menus aparecerem, não funcionará nesse navegador.
		Utilizando o código JavaScript mostrado abaixo o Internet Explorer ira funcionar como Queremos -->
		
		<script language="JavaScript" type="text/JavaScript">
			startList = function()
			{
				if (document.all&&document.getElementById)
				{
					navRoot = document.getElementById("nav");
					for (i=0; i<navRoot.childNodes.length; i++)
					{
						node = navRoot.childNodes[i];
						if (node.nodeName=="LI")
						{
							node.onmouseover=function()
							{
								this.className+=" over";
							}
							node.onmouseout=function()
							{
								this.className=this.className.replace
								(" over", "");
							}
						}
					}
				}
			}
			window.onload=startList;
			
			<!-- Daqui para baixo so se for menu -> submenu -> outro submenu -->
			
			over = function()
			{
				var sfEls = document.getElementById("nav").getElementsByTagName("LI");
				for (var i=0; i<sfEls.length; i++)
				{
					sfEls[i].onmouseover=function()
					{
						this.className+=" over";
					}
					sfEls[i].onmouseout=function()
					{
						this.className=this.className.replace(new RegExp(" over\\b"), "");
					}
				}
			}
			if (window.attachEvent) window.attachEvent("onload", over);
			//-->
		</script>
		
		<title>: : : : : SISTEMA DE CADASTRAMENTO : : : : :</title>
	</head>
	<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">	
	
	<table border="1">
		<tr>
			<td>
			<!-- TABELAS DO TOPO -->
				<table class="titulo">
					<tr >
						<td>
							<img src="1.jpg">
						</td>
						<td class="centralizar">
							<h2><b> Area Administrativa  </b><h2>
						</td>
						<td>
							<img src="2.jpg">
						</td>
					</tr>
				</table>
				<!-- TABELA DA FAIXA DO MEIO -->
				<table class="datahora">
					<tr>
						<td class="formatacao1">
							Bem vindo:
							<?php 
								include "conectar.inc";

								$usuario=$_POST['usuario'];
								$senha=$_POST['senha'];
								$query = "SELECT Nome FROM usuadm WHERE Nome='$usuario'";
								$resultado = mysql_query($query,$conexao);
								
								while ($mostrar = mysql_fetch_array($resultado))
								{
									echo "<b>" . $mostrar['Nome'] . "</b>";
								}
								mysql_close($conexao);
							?>
						</td>
						<td class="formatacao2">
							<?php include "data.php"; echo " - "; include "hora.php"; ?>
						</td>
					</tr>
				</table>
				<br>
				<!-- TABELA COM MENU -->
				<table align="left">
					<tr>
						<td>
						<!-- MENU -->
							<ul id="nav">
								<li>
									<a href="#">: : : Cadastrar : : :</a>
									<ul>
										<li>
											<a href="cadprod.html" target="principal">: : Produto : :</a>
										</li>
										<li>
											<a href="#">: : Usuário : :</a>
										</li>
											<ul>
												<li>
													<a href="cadusuadm.html" target="principal">: Administrador :</a>
												</li>
												<li>
													<a href="cadusucli.html" target="principal">: Cliente :</a>
												</li>
											</ul>
									</ul>
								</li>
								<li>
									<a href="#">: : : Atualizar : : :</a>
									<ul>
										<li>
											<a href="atlprod.html" target="principal">: : Produto : :</a>
										</li>
										<li>
											<a href="atlusu.html" target="principal">: : Usuário : :</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">: : : : Excluir : : : :</a>
									<ul>
										<li>
											<a href="#">: : Produto : :</a>
										</li>
											<ul>
												<li>
													<a href="excprodcod.html" target="principal">: Por Código :</a>
												</li>
												<li>
													<a href="excprodnome.html" target="principal">: Por Nome :</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#">: : Usuário : :</a>
										</li>
											<ul>
												<li>
													<a href="excusuclicod.html" target="principal">: Por Código :</a>
												</li>
												<li>
													<a href="excusuclinome.html" target="principal">: Por Nome :</a>
												</li>
											</ul>
									</ul>
								</li>
								<li>
									<a href="#">: : : Pesquisar : : :</a>
									<ul>
										<li>
											<a href="#">: : Produto : :</a>
										</li>
											<ul>
												<li>
													<a href="pesqprodcod.html" target="principal">: Por Código :</a>
												</li>
												<li>
													<a href="pesqprodnome.html" target="principal">: Por Nome :</a>
												</li>
												<li>
													<a href="pesqprodcat.html" target="principal">: Por Categoria :</a>
												</li>
											</ul>
										<li>
											<a href="#">: : Usuário : :</a>
										</li>
											<ul>
												<li>
													<a href="pesqusucod.html" target="principal">: Por Código :</a>
												</li>
												<li>
													<a href="pesqusunome.html" target="principal">: Por Nome :</a>
												</li>
												<li>
													<a href="pesqusuclitodos.php" target="principal">: Todos :</a>
												</li>
											</ul>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
				</table>
				<!-- IFRAME -->
				<table width="670" height="380" align="left">
					<tr>
						<td>
							<iframe name="principal" src="1.html" frameborder="0" width="670" height="380">
							</iframe>
						</td>
					</tr>
				</table>

			</td>
		</tr>
	</table>
	
		<!-- RODAPÉ -->
		<table border="1" width="820">
			<tr align="right">
				<td>
					:: Design and Development: Adriano Dornelas da Costa ::
				</td>
			</tr>
		</table>
		
	</body>
</html>