<!DOCTYPE html>
<?php
require_once('DB_functions/get_topLanguagesToGraph.php');
require_once('DB_functions/get_topLanguagesToGraph2.php');
require_once('DB_functions/get_topLanguagesToGraph3_sourceforge.php');
require_once('DB_functions/get_RepoStats.php');
//dados_grafico();
?>
<html>
	<head>
		<!--meta-->
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!--titulo-->
		<title>Tolmai</title>
		<!--Links of Style-->
		<link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/header.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/hometolmai.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/repoPage.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/lingPage.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/styleDescricaoInt.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/graficos.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/peelpage.css" rel="stylesheet" type="text/css" media="screen" />
		<!--Links of jQuery-->
		<link type="text/css" href="css/custom-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
		<script type="text/javascript" src="js/highcharts/highcharts.js"></script>
		<!--Links of JavaScript-->
		<script type="text/javascript" src="javascript/accordion.js"></script>
		<script type="text/javascript">	
			var dadosGrafico = [<?php dados_grafico(); ?>];//[['A',10],['B',20],['C',10],['D',20]];
			var retorno2 = [<?php get_RepoStats('Sourceforge'); ?>];
			var retorno3 = [<?php get_RepoStats('Launchpad'); ?>];		
			var dadosGraficos = [<?php dados_grafico_rep(); ?>];
			var retorno = [<?php get_RepoStats('Github'); ?>];
			var dados = [<?php dados_grafico_repo(); ?>];
		</script>
		<script type="text/javascript" src="javascript/aaa.js"></script>
	</head>
	<body>
	<div id="code">
		<img src="images/about1.png"  class="imagepeel"/>
		<img id="curl" src="fold.png">
	</div>  
		<div>
			<div class="header">
				<img src="images/banner.png" alt="Tolmai" id="imagetolmai"/>
			</div>
			<div id="accordion">
				<div>
					<h3><a href="#" onClick="returnHome();">Home Page - Tolmai</a></h3>
					<div>
						<div class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
							<div id="descricaoProjecto"> <!--div do lado esquerdo do logotipo, das funcionalidades, dos objectivos do projecto-->
								<div class="simbolotolmai">
									<img  src="images/img.png" id="logotolmai">
								</div>
								<div class="funcioProjectoTol">
									<h1>Funcionalidades do Projecto:</h1>
									<p>Com a utiliza��o do Tolmai os seus utilizadores podem ter acesso aos projectos alojados na Internet e visualizar informa��o sobre os mesmos. � poss�vel visualizar os Reposit�rios existentes, os projectos que alojam e ainda as linguagens de programa��o utilizadas em cada projecto. Sobre cada reposit�rio � criada um ranking de linguagens mais utilizadas em todos os seus projectos. Sobre cada projecto para al�m da informa��o sobre quem foi o seu autor e a data de cria��o, � poss�vel visualizar a data da �ltima actualiza��o que esse mesmo projecto sofreu. Ser� disponibilizado um URL para que o utilizador possa aceder directamente ao projecto desejado.</p>
								</div>
								<div class="objTol">
									<h1>Objectivos do Projecto:</h1>
									<p>Garantir que os seus utilizadores t�m acesso a informa��es sobre os projectos alojados na Internet como por exemplo no GitHub. Deve-se garantir uma correcta informa��o sobre cada projecto pesquisado, nomeadamente o seu autor, onde se aloja e a principal linguagem de programa��o utilizada. Os projectos mais recentes est�o colocados em destaque para se garantir a actualiza��o constante da informa��o apresentada.</p>
									<!--<hr style="width:680px;"/>-->
								</div>
								<div class="linkofRepos">
									<br /><h1>Reposit�rios:</h1>
									<div class="logosRepo">
									<img src="images/logogithub.png" alt="Tolmai" class="imaRepoTolmai" onClick="toRepository();"/>
									<img src="images/logosourceforge.png" alt="Tolmai" class="imaRepoTolmai" onClick="toRepository();"/>
									<img src="images/logolaunchpad.png" alt="Tolmai" class="imaRepoTolmai" onClick="toRepository();"/>
									</div>
								</div>
							</div>
							
							<div>
								<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
								</div>
								<div id="graficLinguags">
									<h1><center>Linguagens</center></h1>
									<center>
									<!--<img src="images/home.png" />-->
									<div id="container" >
									
									</div>
									<br /><br /><br />
									<div >
										<h1><center>Pesquisa</center></h1>
										<input type="text" name="pesquisa"/>
										<select>
										  <option id="repositorios">Reposit�rios</option>
										  <option id="projectos">Projectos</option>
										  <option id="autor">Autor</option>									  
										  <option id="linguagens">Linguagens</option>
										</select>
										<INPUT type="button" value="pesquisa"  onclick = "funcPesquisa();"> 
									</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<h3><a href="#">Linguagens</a></h3>
					<div class="demoHeaders" style="barkgound-color:wgite;">
						<div class="divreporepo_um" style="">
							<h1>Linguagens do GitHub</h1>
							<!--<img src="images/graficoGIT.png" />-->
							<div id="container4"  style="width: 350px; height:150px;margin:0 auto align='center'" ></div>
						</div>
						
						<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
						</div>
						
						<div class="divreporepo_dois" style="">
							<h1>Top Linguagens</h1>
							<!--<img src="images/topLinguagens.png" />-->
							<div id="container5"  style="width: 350px; height:150px;margin:0 auto align='right'" ></div>
						</div>
						
						<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
						</div>
						
						<div class="divreporepo_tres" 	style="">
								<h1>N�o Sei</h1>
								<div id="container5"  style="width: 350px; height:150px;margin:0 auto align='right'" ></div>
						</div>
					</div>
				</div>
				<div>
					<h3><a href="#">Projectos</a></h3>
					<div>
						<div class="demoHeaders">
							<div class="divreporepo_um" style="">
								<!--container do grafico QUEIJO-->
								<h1>Outros Projectos do Reposit�rio</h1>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											<a href="#" onClick="toProjectView();">Github</a>
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								
							</div>
							<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
								</div>
							<div class="divreporepo_dois" style="">
								<!--container do grafico QUEIJO-->
								<h1>Detalhes do Projecto</h1>
								<div class="divDescricao">
									<div class="divImagDescriRepo">
										<img src="images/logogithub.png" class="imageRepoDes" onClick="toLinguagens();"/>
									</div>
									<div class="descricaoRepo">
										<div class="nomeRepo">
											Github
										</div>
										<div class="linguagensRepo">
											<a onClick="toLinguagens();">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoallProj">
											Descri��o do Reposit�rio:
										</div>
										<div class="ownersRepo">
											ownersProj
											<br />
										</div>
										<div class="urlRepo">
											URL:
											<br /><a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
									</div>
								</div>
								<br /><br /><br />
							</div>
							
							<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
							</div>
							
							<div class="divreporepo_tres" 	style="">
								<h1>N�mero de Projectos</h1>

								<img src="images/repo.png" />
							</div>
						</div>
					</div>
				</div>
				<div>
					<h3><a href="#">Reposit�rios</a></h3>
					<div>
						<div class="demoHeaders">
							<div class="divreporepo_um" style="">
								<!--container do grafico QUEIJO-->
								<h1>Projectos do Reposit�rio</h1>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj" onClick="toProjectos();"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											<a href="#" onClick="toProjectView();">Github</a>
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logogithub.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Github
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								
							</div>
							<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
								</div>
							<div class="divreporepo_dois" style="">
								<!--container do grafico QUEIJO-->
								<h1>Detalhes do Reposit�rios</h1>
								<div class="divDescricao">
									<div class="divImagDescriRepo">
										<img src="images/logogithub.png" class="imageRepoDes"/>
									</div>
									<div class="descricaoRepo">
										<div class="nomeRepo">
											Github
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoallProj">
											Descri��o do Reposit�rio:
										</div>
										<div class="ownersRepo">
											ownersProj
											<br />
										</div>
										<div class="urlRepo">
											URL:
											<br /><a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
									</div>
								</div>
								<br /><br /><br />
								<h1>Outros Reposit�rios</h1>
								<center><div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logosourceforge.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Source Forge
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div>
								<div class="divRepoProjDescricao">
									<div class="divImagDescriRepoProj">
										<img src="images/logolaunchpad.png" class="imageRepoDesProj"/>
									</div>
									<div class="descricaoRepoProj">
										<div class="nomeRepoProj">
											Launchpad
										</div>
										<div class="linguagensRepoProj">
											<a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
										<div class="descricaoallProjProj">
											Descri��o do Reposit�rio:
										</div>
									</div>
								</div></center>
							</div>
							
							<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
							</div>
							
							<div class="divreporepo_tres" 	style="">
								<h1>N�mero de Projectos</h1>

								<!--<img src="images/repo.png" />-->
								<!--Github-->			<div id="container3" style="width: 200px; height: 100px;"></div>
								<!--Sourceforge-->		<div id="container10" style="width: 200px; height: 100px;"></div>
								<!--Launchpad-->		<div id="container11" style="width: 200px; height: 100px;"></div>
							</div>
						</div>
					</div>
				</div>
				
				<div>
					<h3><a href="#" onClick="funcPesquisa();">Pesquisa</a></h3>
					<div>
						<div class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
							ola a todos!!							
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
 
 

