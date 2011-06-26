<!DOCTYPE html>
<?php
//require_once('DB_functions/get_topLanguagesToGraph.php');
//require_once('DB_functions/get_topLanguagesToGraph2.php');
//require_once('DB_functions/get_topLanguagesToGraph3_sourceforge.php');
//require_once('DB_functions/get_RepoStats.php');
//require_once('DB_functions/search_Top_To_Graph.php');
//dados_grafico();
?>
<html>
	<head>
		<!--meta-->
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!--titulo-->
		<title>Tolmai</title>
		 <link href="images/favicon.ico" />
		<!--Links of Style-->
		<link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/header.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/hometolmai.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/repoPage.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/lingPage.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/styleDescricaoInt.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/graficos.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/peelpage.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/projPage.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/custom-theme/apprise.css" type="text/css" />
		<link href="css/capit.css" rel="stylesheet" type="text/css" media="screen" />
			
		<!--Links of jQuery-->
		<link type="text/css" href="css/custom-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
		
		<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
		<script type="text/javascript" src="js/simpleSky.js"></script>
		<script type="text/javascript" src="js/highcharts/highcharts.js"></script>
		<script type="text/javascript" src="js/apprise-1.5.full.js"></script>
		<!--Links of JavaScript-->
		<script type="text/javascript" src="javascript/accordion.js"></script>
		
		<script type="text/javascript" src="javascript/aaaa.js"></script>
		<!--Links of Simple Sky-->
		<link href="simpleSky.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="simpleSky.js"></script>
		
		<!--Link of tremelikes-->
		<script type="text/javascript" src="js/tremeImage.js"></script>
		
		<!--Link of desability accodion-->
		
		
	</head>
	<body>
	<div id="code">
		<img src="images/about1.png"  class="imagepeel"/>
		<img id="curl" src="fold.png">
	</div>  
		<div>
			<div class="header">
				<img src="images/banner.png" alt="Tolmai" id="imagetolmai"  onClick="returnHome();"  style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" />
			</div>
			<div id="accordion">
				<div>
					<h3><a href="#" onClick="returnHome();">Home Page</a></h3>
					<div>
						<div class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
							<div id="descricaoProjecto"> <!--div do lado esquerdo do logotipo, das funcionalidades, dos objectivos do projecto-->
								<div class="simbolotolmai">
									<img  src="images/img.png" id="logotolmai">
								</div>
								<div class="funcioProjectoTol" >
									<h1>Funcionalidades do Projecto:</h1>
									<p>Com a utiliza��o do Tolmai os seus utilizadores podem ter acesso aos projectos alojados na Internet e visualizar informa��o sobre os mesmos. � poss�vel visualizar os Reposit�rios existentes, os projectos que alojam e ainda as linguagens de programa��o utilizadas em cada projecto. Sobre cada reposit�rio � criada um ranking de linguagens mais utilizadas em todos os seus projectos. Sobre cada projecto para al�m da informa��o sobre quem foi o seu autor e a data de cria��o, � poss�vel visualizar a data da �ltima actualiza��o que esse mesmo projecto sofreu. Ser� disponibilizado um URL para que o utilizador possa aceder directamente ao projecto desejado.</p>
								</div>
								<div class="objTol">
									<br />
									<h1>Objectivos do Projecto:</h1>
									<p>Garantir que os seus utilizadores t�m acesso a informa��es sobre os projectos alojados na Internet como por exemplo no GitHub. Deve-se garantir uma correcta informa��o sobre cada projecto pesquisado, nomeadamente o seu autor, onde se aloja e a principal linguagem de programa��o utilizada. Os projectos mais recentes est�o colocados em destaque para se garantir a actualiza��o constante da informa��o apresentada.</p>
									<!--<hr style="width:680px;"/>-->
								</div>
								<div class="linkofRepos">
									<!--<br /><h1>Reposit�rios:</h1>-->
									<div class="logosRepo" style="float:left;">
										<br /><br /><br />
										<img src="images/repositorios.png" style="float:left; padding:10px;"/>
										<img src="images/hr.png" /> 
										<img src="images/logogithub.png" alt="Tolmai" class="imaRepoTolmai" onClick="toRepository('Github');" style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" />
										<img src="images/logosourceforge.png" alt="Tolmai" class="imaRepoTolmai" onClick="toRepository('SourceForge');" style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" />
										<img src="images/logolaunchpad.png" alt="Tolmai" class="imaRepoTolmai" onClick="toRepository('Launchpad');" style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" />
									</div>
								</div>
							</div>
							
							<div>
								<div style="width:1px; heigth:460px; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
								</div>
								<div id="graficLinguags" >
									<h1><center>Linguagens</center></h1>
									<center>
									<!--<img src="images/home.png" />-->
									<div id="container" style="width: 450px; height:230px;margin:0 auto align="center" >
									
									</div>
									<br /><br /><br />
									<div >
										<br /><br /><h1><center>Pesquisa</center></h1>
										<input type="text" id="texto" name="pesquisa" onkeyup="capitalize(this.value)"/>
										<select id="escolha" onChange="muda()">
										  <option>Repositorios</option>
										  <option>Projectos</option>
										  <option>Autor</option>									  
										  <option>Linguagens</option>
										</select>
										<INPUT type="button" id="bott" value="pesquisa"  onclick = "funcPesquisa()"/>
										
									</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="lingDIV">
					<h3><a href="#" >Linguagem</a></h3>
					<div class="demoHeaders" style="barkgound-color:wgite;">
						<div class="divreporepo_um" style="">
							<h1>Linguagens do GitHub</h1>
							<!--<img src="images/graficoGIT.png" />-->
							<div id="container4"  style="width: 350px; height:200px;" ></div>
						</div>
						
						<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
						</div>
						
						<div class="divreporepo_dois" style="">
							<h1>Top Linguagens do Sourceforge</h1>
							<!--<img src="images/topLinguagens.png" />-->
							<div id="container5"  style="width: 350px; height:150px;margin:0 auto align='right'" ></div>
						</div>
						
						<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
						</div>
						
						<div class="divreporepo_tres" 	style="">
								<h1>C�digo informativo da Linguagem</h1>
								<br />
								<div class="helloWorldDiv">
								
								</div>
						</div>
					</div>
				</div>
				<div class="projDIV">
					<h3><a href="#">Projecto</a></h3>
					<div>
						<div class="demoHeaders">
							<div class="divreporepo_um" style="">
								<!--container do grafico QUEIJO-->
								<h1>Colaboradores deste Projecto</h1>
								<!--
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
								</div>-->
								<div id ="divColabo" style="margin: 20px; border:1px solid black;width:375px;height:400px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
								
								</div>
								
							</div>
							<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
								</div>
							<div class="divreporepo_dois" style="">
								<!--container do grafico QUEIJO-->
								<h1>Detalhes do Projecto</h1>
								<div class="divDescricaoProjj">
									<div class="divImagDescriRepo">
										<img src="images/no_image.png" class="imageRepoDes" onClick="toLinguagens();" style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" />
									</div>
									<div class="descricaoProjectNew">
										<div class="nomeRepo">
											Firefox
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
										<div class="dataIni">
											Data Cria��o:
											<br />
											
										</div>
										<div class="dataAc">
											Data actualiza��o:
											<br />
										</div>
										<div class="UrlPr">
											URL:
											<br /><a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
										</div>
									</div>
									<div id ="divproj" style="margin: 20px; border:1px solid black;width:375px;height:200px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
								
									</div>
								</div>
								<br /><br /><br />
							</div>
							
							<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
							</div>
							
							<div class="divreporepo_tres" 	style="">
								<div >
										<center><h1>Pesquisa de Projectos</h1></center>
										
										<input type="text" id="texto" name="pesquisa"/>
										<INPUT type="button" id="bott" value="pesquisa"  onclick = "funcPesquisa()"/>										
								</div>
								<h1>N�mero de Ficheiros</h1>

								<!--projecto-->			<div id="container30" style="width: 200px; height: 100px;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="repoDIV">
					<h3><a href="#">Reposit�rio</a></h3>
					<div>
						<div class="demoHeaders">
							<div class="divreporepo_um" style="">
								<!--container do grafico QUEIJO-->
								<h1>Projectos do Reposit�rio</h1>
								<div id ="divrepo" style="margin: 20px; border:1px solid black;width:375px;height:400px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
							
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
										<img src="images/no_image.png" class="imageRepoDes" onClick="toProjectos();" style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" />
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
								<div id ="divDetaRepo" style="margin: 20px; border:1px solid black;width:375px;height:200px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
								
								</div>
								<br /><br /><br />
								<!--<h1>Outros Reposit�rios</h1>
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
								</div></center>-->
							</div>
							
							<div style="width:1; heigth:460; float:left;">
									<hr size="460px" style="width:0px" align="left"/>
							</div>
							
							<div class="divreporepo_tres" 	style="">
								<div >
										<center><h1>Pesquisa de Projectos</h1></center>
										
										<input type="text" id="texto" name="pesquisa"/>
										<INPUT type="button" id="bott" value="pesquisa"  onclick = "funcPesquisa()"/>										
								</div>
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
						<div id="res" class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
							ola a todos!!							
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
 
 

