<!DOCTYPE HTML> 
<html  lang="pt">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Tolmai - Web Code Statistics</title>
	<link href="style/peelpage.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="style/tag02.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="images/favicon.ico" />

	<!--Links of Style-->
		<link href="style/header.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/peelpage.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/custom-theme/apprise.css" type="text/css" />
		<link href="css/capit.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/styleDescricaoInt.css" rel="stylesheet" type="text/css" media="screen" />

		<!--Links of jQuery-->
		<link type="text/css" href="css/custom-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
		<!--Slider dos repositorios-->
		<script type="text/javascript" src="jquery-1.6.js"></script>

		<script type="text/javascript" src="js/sliderRepositorios.js"></script>
		<script type="text/javascript" src="javascript/tag02.js"></script>
		<script type="text/javascript" src="javascript/tag02Repo.js"></script>
		<script type="text/javascript" src="javascript/tag02Proj.js"></script>
		<script type="text/javascript" src="javascript/tag02Ling.js"></script>

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
		<link rel="stylesheet" type="text/css" href="style/default.css" />
		<link rel="stylesheet" type="text/css" href="css/slider_css.css" />

</head>
<body>

<div id="outer">
	<div id="code">
		<img src="images/about1.png"  class="imagepeel"/>
		<img id="curl" src="images/fold.png">
	</div>

	<div id="upbg"></div>

	<div id="inner">

		<div class="header">
				<img src='images/back.png' style="width:687px; height:100px; position:absolute;" />
				<div>
					<img src="images/tolmai_400px.png" id="imagetolmai" style="height:80px;  position:absolute; z-index:5; padding-left: 50px; padding-top:10px;" onClick="returnHome();" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()"/>
				</div>
		</div>
		<div class="CoisasPesquisa">
			<input type="text" id="textoPesquisa" name="pesquisa" onkeyup="capitalize(this.value)"/>
					<select id="escolha" onChange="muda()">
						<option>Repositórios</option>
						<option>Projectos</option>
						<option>Autor</option>
						<option>Linguagens</option>
					</select>
			<INPUT type="button" id="bott" value="Pesquisa"  onclick = "funcPesquisa()"/>
		</div>
		<div id="accordion" style="padding-top:1px;">
			<div>
				<h3><a href="#" onClick="returnHome();">Home Page</a></h3>
				<div>
					<div class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
						<div id="primarycontent">
							<!-- primary content start -->

							<div class="post">
								<div class="header">
									<h4>Funcionalidades:</h3>
								</div>
								<div class="content">
									<img src="images/img.png" class="picA floatleft" alt="" />
									<p>Com a utilização do Tolmai os seus utilizadores podem ter acesso aos projectos alojados na Internet e visualizar informação sobre os mesmos. É possível visualizar os Repositórios existentes, os Projectos que alojam e ainda as Linguagens de programação utilizadas em cada projecto. Sobre cada repositório é criada um ranking de linguagens mais utilizadas em todos os seus projectos. Sobre cada projecto para além da informação sobre quem foi o seu autor e a data de criação, é possível visualizar a data da última actualização que esse mesmo projecto sofreu. Será disponibilizado um URL para que o utilizador possa aceder directamente ao projecto desejado.</p>
								</div>
								<div class="header">
									<h4>Objectivos:</h3>
								</div>
								<div class="content">
									<p>Garantir que os seus utilizadores têm acesso a informações sobre os projectos alojados na Internet como por exemplo no GitHub. Deve-se garantir uma correcta informação sobre cada projecto pesquisado, nomeadamente o seu autor, onde se aloja e a principal linguagem de programação utilizada. Os projectos mais recentes estão colocados em destaque para se garantir a actualização constante da informação apresentada.</p>

								</div>
							</div>
						</div>
						<div id="secondarycontent">
							<img src="images/helpUser.png" class="helpImage" align="right" onClick="homehelp();" style="position:relative; margin-top:5px; width:25px; height:25px;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()"/>
							<!-- secondary content start -->

							<h4>Linguagens</h4>
							<div class="content">
								<div class="list">
								<ul>
									<li><a onClick="toLinguagens();">C</a></li>
									<li><a onClick="toLinguagens();">C++</a></li>
									<li><a onClick="toLinguagens();">Java</a></li>
									<li><a onClick="toLinguagens();">D</a></li>
									<li><a onClick="toLinguagens();">A</a></li>
									<li><a href="#">PHP</a></li>
								
								</ul>
								</div>
							</div>

							<h4 class="text">Repositórios</h4>
							<div class="main_view"><!--slider dos reposit?rios-->
								<div class="window">
									<div class="image_reel">
										<a href="#"><img src="images/img_github.png" alt="" onClick="toRepository('Github');"/></a>
										<a href="#"><img src="images/img_launchpad.png" alt="" onClick="toRepository('SourceForge');"/></a>
										<a href="#"><img src="images/img_sourceforge.png" alt="" onClick="toRepository('Launchpad');"/></a>
									</div>
								</div>
								<div class="paging">
									<a href="#" rel="1" onClick="toRepository('Github');">1</a>
									<a href="#" rel="2" onClick="toRepository('SourceForge');">2</a>
									<a href="#" rel="3" onClick="toRepository('Launchpad');">3</a>
								</div>
							</div>
							<!-- secondary content end -->

						</div>
					</div>
				</div>
			</div>
			<div class="repoDIV">
				<h3><a href="#" >Repositório</a></h3>
				<div>
					<div class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
						<div id="primarycontent">
							<!-- primary content start -->
							<div class="post">
								<div class="header">
									<h4>Detalhes do Respositório: </h4>
								</div>
								<div class="content">
									<div class="divDescricao">
										<div class="divImagDescriRepo">
											<img src="images/img.png" class="imagRepoLogo"  onClick=" toProjectosfromrepository();" style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()"/>
										</div>
										<div class="descricaoRepo">
											<div class="nomeRepo" >
												GitHub
											</div>
											<div class="linguagensRepo">
												<a href="">C++</a>
												<a href="">C</a>
												<a href="">Java</a>
												<a href="">HTML</a>
											</div>
											<div class="descricaoallProj">
												<p>Descrição do Repositório:</p>
											</div>
											<div class="ownersRepo">
												<p>ownersRepo</p>
												<br />
											</div>
											<div class="urlRepo">
												<p>URL:
												<br /><a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a></p>
											</div>
										</div>
									</div>
								</div>
								<div class="header">
									<h4>Projectos: </h4>
								</div>
								<div style="margin-left:20px; margin-top:10px;">
									<input type="text" id="textoParaaPesquisa" name="pesquisa" onkeyup="capitalize(this.value)"/>
									<INPUT type="button" id="bott" value="Pesquisa"  onclick = "funcPesquisa()"/>
								</div>
								<div class="content">
									<div id ="divrepo" style="margin-top:10px; margin-left:10px; border:1px solid black;width:400px;height:90px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">

									</div>
								</div>
								<div class="header">
									<h4 style="margin-top:10px;">Número de Projectos: </h4>
									<div class="content">

									</div>
								</div>
							</div>
						</div>
						<div id="secondarycontent">
							<img src="images/helpUser.png" class="helpImage" align="right" onClick="homehelp();" style="position:relative; margin-top:5px; width:25px; height:25px;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()"/
							<!-- secondary content start -->

							<h4>Linguagens</h4>
							<div class="content">
								<div class="listR">
								<ul>
									<li><a onClick="toLinguagens();">C</a></li>
									<li><a onClick="toLinguagens();">C++</a></li>
									<li><a onClick="toLinguagens();">Java</a></li>
									<li><a onClick="toLinguagens();">D</a></li>
									<li><a onClick="toLinguagens();">A</a></li>
									<li><a href="#">PHP</a></li>
								
								</ul>
								</div>
							</div>

							<h4 class="text">Repositórios</h4>
							<div class="main_view"><!--slider dos reposit?rios-->
								<div class="window">
									<div class="image_reel">
										<a href="#"><img src="images/img_github.png" alt="" onClick="toRepository('Github');"/></a>
										<a href="#"><img src="images/img_launchpad.png" alt="" onClick="toRepository('SourceForge');"/></a>
										<a href="#"><img src="images/img_sourceforge.png" alt="" onClick="toRepository('Launchpad');"/></a>
									</div>
								</div>
								<div class="paging">
									<a href="#" rel="1" onClick="toRepository('Github');">1</a>
									<a href="#" rel="2" onClick="toRepository('SourceForge');">2</a>
									<a href="#" rel="3" onClick="toRepository('Launchpad');">3</a>
								</div>
							</div>
							<!-- secondary content end -->
						</div>
					</div>
				</div>
			</div>
			<div class="projDIV">
				<h3><a href="#" onClick="">Projecto</a></h3>
				<div>
					<div class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
						<div id="primarycontent">

							<!-- primary content start -->

							<div class="post">
								<div class="header">
									<h4>Detalhes do Projecto: </h4>
								</div>
								<div class="content">
									<div class="divDescricao">
										<div class="divImagDescriRepo">
											<br /><img src="images/img.png" class="imagRepoLogo"  onClick="toLinguagens();" style="position:relative;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()"/>
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
												Descrição do Projecto:
											</div>
											<div class="dataIni">
												Data Criação:
												<br />

											</div>
											<div class="dataAc">
												Data actualização:
												<br />
											</div>
											<div class="UrlPr">
												URL:
												<br /><a href="https://github.com/" target="blank" style="margin:10px;">https://github.com/</a>
											</div>
										</div>
									</div>
								</div>
								<div class="header">
									<h4 style="margin-top:165px;">Colaboradores:</h4>
								</div>
								<div style="margin-left:20px; margin-top:10px;">
									<input type="text" id="textoParaaPesquisa" name="pesquisa" onkeyup="capitalize(this.value)"/>
									<INPUT type="button" id="bott" value="Pesquisa"  onclick = "funcPesquisa()"/>
								</div>
								<div class="content">
									<div id ="divrepo" style="margin-top:5px; margin-left:10px; border:1px solid black;width:400px;height:70px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">

									</div>
								</div>
								<br />
								<div class="header">
									<h4 style="margin-top:-15px;">Número de Ficheiros: </h4>
									<div class="content">

									</div>
								</div>
							</div>
						</div>

						<div id="secondarycontent">
							<img src="images/helpUser.png" class="helpImage" align="right" onClick="homehelp();" style="position:relative; margin-top:5px; width:25px; height:25px;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()"/>
							<!-- secondary content start -->

							<h4>Linguagens</h4>
							<div class="content">
								<div class="listP">
								<ul>
									<li><a onClick="toLinguagens();">C</a></li>
									<li><a onClick="toLinguagens();">C++</a></li>
									<li><a onClick="toLinguagens();">Java</a></li>
									<li><a onClick="toLinguagens();">D</a></li>
									<li><a onClick="toLinguagens();">A</a></li>
									<li><a href="#">PHP</a></li>
								
								</ul>
								</div>
							</div>

							<h4 class="text">Repositórios</h4>
							<div class="main_view"><!--slider dos reposit?rios-->
								<div class="window">
									<div class="image_reel">
										<a href="#"><img src="images/img_github.png" alt="" onClick="toRepository('Github');"/></a>
										<a href="#"><img src="images/img_launchpad.png" alt="" onClick="toRepository('SourceForge');"/></a>
										<a href="#"><img src="images/img_sourceforge.png" alt="" onClick="toRepository('Launchpad');"/></a>
									</div>
								</div>
								<div class="paging">
									<a href="#" rel="1" onClick="toRepository('Github');">1</a>
									<a href="#" rel="2" onClick="toRepository('SourceForge');">2</a>
									<a href="#" rel="3" onClick="toRepository('Launchpad');">3</a>
								</div>
							</div>
							<!-- secondary content end -->
						</div>
					</div>
				</div>
				</div>
				<div class="lingDIV">
					<h3><a href="#" onClick=";">Linguagem</a></h3>
					<div>
						<div class="demoHeaders"> <!--tamanho da pagina interior do accorion-->
						
							<div id="primarycontent">

								<!-- primary content start -->

									<div class="post">
									<div class="header">
										<h4>Linguagem do GitHub</h4>
									</div>
									
									<div class="header">
										<h4 style="margin-top:165px;">Código Informativo da Linguagem:</h4>
									</div>
									<div class="content">
										<div style="width:450px; height:150px; background-color:#DCDCDC;">
										</div>
									</div>
								</div>
							</div>
							<div id="secondarycontent">
								<img src="images/helpUser.png" class="helpImage" align="right" onClick="homehelp();" style="position:relative; margin-top:5px; width:25px; height:25px;" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()"/>
								<!-- secondary content start -->

								<h4>Linguagens</h4>
								<div class="content">
									<div class="listL">
										<ul>
											<li><a onClick="toLinguagens();">C</a></li>
											<li><a onClick="toLinguagens();">C++</a></li>
											<li><a onClick="toLinguagens();">Java</a></li>
											<li><a onClick="toLinguagens();">D</a></li>
											<li><a onClick="toLinguagens();">A</a></li>
											<li><a href="#">PHP</a></li>
										</ul>
									</div>
								</div>

								<h4 class="text">Percentagem da Linguagem no Repositório</h4>
								
								
								<!-- secondary content end -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>