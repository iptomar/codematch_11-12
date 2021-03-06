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
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Tolmai</title>
		
		<link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/header.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/hometolmai.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style2/repoPage.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style2/lingPage.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="style/circuloTExt.css" rel="stylesheet" type="text/css" media="screen" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
		<script type="text/javascript" src="js/highcharts/highcharts.js"></script>
		<script type="text/javascript" src="javascript/circuloTExt.js"></script>
		<script type="text/javascript">

/* Circling text trail- Tim Tilton
   Website: http://www.tempermedia.com/
   Visit: http://www.dynamicdrive.com/ for Original Source and tons of scripts
   Modified Here for more flexibility and modern browser support
   Modifications as first seen in http://www.dynamicdrive.com/forums/
   username:jscheuer1 - This notice must remain for legal use
   */

;(function(){

// Your message here (QUOTED STRING)
var msg = "Tolmai";

/* THE REST OF THE EDITABLE VALUES BELOW ARE ALL UNQUOTED NUMBERS */

// Set font's style size for calculating dimensions
// Set to number of desired pixels font size (decimal and negative numbers not allowed)
var size = 24;

// Set both to 1 for plain circle, set one of them to 2 for oval
// Other numbers & decimals can have interesting effects, keep these low (0 to 3)
var circleY = 0.75; var circleX = 2;

// The larger this divisor, the smaller the spaces between letters
// (decimals allowed, not negative numbers)
var letter_spacing = 5;

// The larger this multiplier, the bigger the circle/oval
// (decimals allowed, not negative numbers, some rounding is applied)
var diameter = 10;

// Rotation speed, set it negative if you want it to spin clockwise (decimals allowed)
var rotation = 0.4;

// This is not the rotation speed, its the reaction speed, keep low!
// Set this to 1 or a decimal less than one (decimals allowed, not negative numbers)
var speed = 0.3;

////////////////////// Stop Editing //////////////////////

if (!window.addEventListener && !window.attachEvent || !document.createElement) return;

msg = msg.split('');
var n = msg.length - 1, a = Math.round(size * diameter * 0.208333), currStep = 20,
ymouse = a * circleY + 20, xmouse = a * circleX + 20, y = [], x = [], Y = [], X = [],
o = document.createElement('div'), oi = document.createElement('div'),
b = document.compatMode && document.compatMode != "BackCompat"? document.documentElement : document.body,

mouse = function(e){
 e = e || window.event;
 ymouse = !isNaN(e.pageY)? e.pageY : e.clientY; // y-position
 xmouse = !isNaN(e.pageX)? e.pageX : e.clientX; // x-position
},

makecircle = function(){ // rotation/positioning
 if(init.nopy){
  o.style.top = (b || document.body).scrollTop + 'px';
  o.style.left = (b || document.body).scrollLeft + 'px';
 };
 currStep -= rotation;
 for (var d, i = n; i > -1; --i){ // makes the circle
  d = document.getElementById('iemsg' + i).style;
  d.top = Math.round(y[i] + a * Math.sin((currStep + i) / letter_spacing) * circleY - 15) + 'px';
  d.left = Math.round(x[i] + a * Math.cos((currStep + i) / letter_spacing) * circleX) + 'px';
 };
},

drag = function(){ // makes the resistance
 y[0] = Y[0] += (ymouse - Y[0]) * speed;
 x[0] = X[0] += (xmouse - 20 - X[0]) * speed;
 for (var i = n; i > 0; --i){
  y[i] = Y[i] += (y[i-1] - Y[i]) * speed;
  x[i] = X[i] += (x[i-1] - X[i]) * speed;
 };
 makecircle();
},

init = function(){ // appends message divs, & sets initial values for positioning arrays
 if(!isNaN(window.pageYOffset)){
  ymouse += window.pageYOffset;
  xmouse += window.pageXOffset;
 } else init.nopy = true;
 for (var d, i = n; i > -1; --i){
  d = document.createElement('div'); d.id = 'iemsg' + i;
  d.style.height = d.style.width = a + 'px';
  d.appendChild(document.createTextNode(msg[i]));
  oi.appendChild(d); y[i] = x[i] = Y[i] = X[i] = 0;
 };
 o.appendChild(oi); document.body.appendChild(o);
 setInterval(drag, 25);
},

ascroll = function(){
 ymouse += window.pageYOffset;
 xmouse += window.pageXOffset;
 window.removeEventListener('scroll', ascroll, false);
};

o.id = 'outerCircleText'; o.style.fontSize = size + 'px';

if (window.addEventListener){
 window.addEventListener('load', init, false);
 document.addEventListener('mouseover', mouse, false);
 document.addEventListener('mousemove', mouse, false);
  if (/Apple/.test(navigator.vendor))
   window.addEventListener('scroll', ascroll, false);
}
else if (window.attachEvent){
 window.attachEvent('onload', init);
 document.attachEvent('onmousemove', mouse);
};

})();

</script>
		<script type="text/javascript">
			$(function(){
				// Accordion
				$( "#accordion" ).accordion({
					event: "null",
					header: "h3"
				});
				
				$(".linkRepositorios").click(function() {
				   $("#accordion").accordion( "activate" , 3);
				});
				
				$(".linkProject").click(function() {
						   $("#accordion").accordion( "activate" , 2);
				});
				$(".linkLinguagens").click(function() {
						   $("#accordion").accordion( "activate" , 1);
				});
				 
				 
			});
		</script>	
		<script type="text/javascript">
			<!-- INICIO DO CODIGO PARA O GRAFICO QUEIJO vista inicial--> 		
			var chart;
<!-- variavel dados graficos que aponta para a funcao que esta no script mais em baixo no codigo no series::data:: vai ser colado o resultado da variavel-->
			 var dadosGrafico = [<?php dados_grafico(); ?>];//[['A',10],['B',20],['C',10],['D',20]];
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: ' '
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								formatter: function() {
									return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
								}
							}
						}
					},
				    series: [{
						type: 'pie',
						name: 'Browser share',
						data:dadosGrafico
					}]
				});
			});
				
		</script>
 <!-- FIM DO CODIGO PARA O GRAFICO QUEIJO repositorio--> 
 
<!--INICIO DO CODIGO QUE CONTA O NUMERO DE PROJECTOS NO GITHUB GRAFICO BARRA HORIZONTAL-->
  <script type="text/javascript">
		
			var chart;
			var retorno = [<?php get_RepoStats('Github'); ?>];
			
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container3',
						defaultSeriesType: 'bar'
					},
					title: {
						text: ' '
					},
					
					xAxis: {
						categories: ['Github'],
						title: {
							text: null
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: ' ',
							align: 'high'
						}
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +'projectos';
						}
					},
					plotOptions: {
						bar: {
							dataLabels: {
								enabled: true
							}
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -100,
						y: 100,
						floating: true,
						borderWidth: 1,
						backgroundColor: '#FFFFFF',
						shadow: true
					},
					credits: {
						enabled: false
					},
				        series: [{
						name: 'Projectos',
						data: retorno
					}]
				});
				
				
			});
 </script>
 <!--fim codigo -->
 <!--INICIO DO CODIGO QUE CONTA O NUMERO DE PROJECTOS NO sourceforge GRAFICO BARRA HORIZONTAL-->
  <script type="text/javascript">
		
			var chart;
			var retorno2 = [<?php get_RepoStats('Sourceforge'); ?>];
			
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container10',
						defaultSeriesType: 'bar'
					},
					title: {
						text: ' '
					},
					
					xAxis: {
						categories: ['Sourceforge'],
						title: {
							text: null
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: ' ',
							align: 'high'
						}
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +'projectos';
						}
					},
					plotOptions: {
						bar: {
							dataLabels: {
								enabled: true
							}
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -100,
						y: 100,
						floating: true,
						borderWidth: 1,
						backgroundColor: '#FFFFFF',
						shadow: true
					},
					credits: {
						enabled: false
					},
				        series: [{
						name: 'Projectos',
						data: retorno2
					}]
				});
				
				
			});
 </script>
 <!--INICIO DO CODIGO QUE CONTA O NUMERO DE PROJECTOS NO Launchpad GRAFICO BARRA HORIZONTAL-->
  <script type="text/javascript">
		
			var chart;
			var retorno3 = [<?php get_RepoStats('Launchpad'); ?>];
			
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container11',
						defaultSeriesType: 'bar'
					},
					title: {
						text: ' '
					},
					
					xAxis: {
						categories: ['Launchpad'],
						title: {
							text: null
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: ' ',
							align: 'high'
						}
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +'projectos';
						}
					},
					plotOptions: {
						bar: {
							dataLabels: {
								enabled: true
							}
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -100,
						y: 100,
						floating: true,
						borderWidth: 1,
						backgroundColor: '#FFFFFF',
						shadow: true
					},
					credits: {
						enabled: false
					},
				        series: [{
						name: 'Projectos',
						data: retorno3
					}]
				});
				
				
			});
 </script>
 <script type="text/javascript">
			<!-- INICIO DO CODIGO PARA O GRAFICO QUEIJO1 vista Linguagens--> 		
			 var dadosGraficos = [<?php dados_grafico_rep(); ?>];
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container4',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: ' '
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								formatter: function() {
									return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
								}
							}
						}
					},
				    series: [{
						type: 'pie',
						name: 'Browser share',
						data:dadosGraficos
						}]
				});
			});
				
		</script>
 <!-- FIM DO CODIGO PARA O GRAFICO QUEIJO1 vista linguagens--> 
 
 
  <script type="text/javascript">
			<!-- INICIO DO CODIGO PARA O GRAFICO QUEIJO2 vista Linguagens--> 		
			var chart;
			var dados = [<?php dados_grafico_repo(); ?>];
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container5',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: ' '
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								formatter: function() {
									return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
								}
							}
						}
					},
				    series: [{
						type: 'pie',
						name: 'Browser share',
						data: dados
					}]
				});
			});
				
		</script>
 <!-- FIM DO CODIGO PARA O GRAFICO QUEIJO2 vista linguagens--> 

 
  
 
 
 <!-- grafico conta o top linguagens em todos os repositorios(vista de linguagens)-->
 <script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container9',
						defaultSeriesType: 'column',
						margin: [ 50, 50, 100, 80]
					},
					title: {
						text: 'Linguagens mais utlizadas'
					},
					xAxis: {
						categories: [
							'C++', 
							'Java', 
							'.Net', 
							'Cobol', 
							'HTML'
						],
						labels: {
							rotation: -45,
							align: 'right',
							style: {
								 font: 'normal 13px Verdana, sans-serif'
							}
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Medida do eixo do Y'
						}
					},
					legend: {
						enabled: false
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.x +'</b><br/>'+
								 'Medida de cada linguagem: '+ Highcharts.numberFormat(this.y, 1) +
								 ' unidades';
						}
					},
				        series: [{
						name: 'Population',
						data: [34.4, 21.8, 20.1, 20, 19.6],
						dataLabels: {
							enabled: true,
							rotation: -90,
							color: '#FFFFFF',
							align: 'right',
							x: -3,
							y: 10,
							formatter: function() {
								return this.y;
							},
							style: {
								font: 'normal 13px Verdana, sans-serif'
							}
						}			
					}]
				});
				
				
			});
				
		</script>
	</head>
	<body>
		<div>
			<div class="header">
				<img src="images/banner.png" alt="Tolmai" id="imagetolmai"/>
			</div>
			<!-- Accordion -->
			<!--margin-top:100px; margin-bottom:100px; margin-right:50px; margin-left:50px;-->
			<div id="accordion">
				<div>
					<h3><a href="#">Home Page - Tolmai</a></h3>
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
								</div>
							</div>
							<div id="linguagensGrafico">
								<h1><center>Linguagens</center></h1>
								<center>
									<br /><div id="container"  >
									</div>
									<br /><br /><br /><a href="" class="linkRepositorios"><img src="images/logogithub.png" alt="Tolmai"  /></a>
									<a href="" class="linkRepositorios"><img src="images/logosourceforge.png" alt="Tolmai"  /></a>
								</center>
							</div>
						</div>
					</div>
				</div>
				<div>
					<h3><a href="#">Linguagens</a></h3>
					<div>
						<div class="demoHeaders">
							<div class="detalhesRepo">
								<p>Linguagens</p>
								<h1>Github</h1> 
							<div id="container4"  style="width: 350px; height:150px;margin:0 auto align='center'" ></div>
								<br />
								<h1>Sourceforge</h1>
								<div id="container5"  style="width: 350px; height:150px;margin:0 auto align='right'" ></div>
								<center>
									
								</center>
							</div>
							
							<div class="topRepo">
								<!--container do grafico QUEIJO-->
								<h1>Top de Linguagens: </h1>
								<br /><br /><br /><br />
								<center>
								<div id="container9" style="width: 350px; height:350px;></div>
								</center>
							</div>
							
							<div class="repPesquisa">
								<br /><br /><br />
								<div class="divPesquisaExt">
									<div class="divPesquisaInt">
										<div class="nomePesquisas">
											Search
										</div>
										
										<div class="campoEscreverPesquisas">
											 <input type="text" name="Pesquisa" class="pesquisaObjec" />
										</div>
										
										<div class="buttonPesquisas">
											<button type="button" class="buttonGo">Go</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<h3><a href="#">Projectos</a></h3>
					<div>
						<div class="demoHeaders">
							<div class="detalhesRepo">
								<p>Projectos:</p>
								<div class="divDescricao">
									<div class="divImagDescri">
										<a href="" class="linkLinguagens"><img src="images/erro.png" class="imageDes"/></a>
									</div>
									<div class="descricao">
										<div class="nomeRepo">
											Nome
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoDetalhes">
											Descri��o do Projecto:
										</div>
										<div class="owners">
											Owners
											<br />
										</div>
										<div class="url">
											URL
										</div>
									</div>
								</div>
								<div class="divDescricao">
									<div class="divImagDescri">
										<img src="images/erro.png" class="imageDes"/>
									</div>
									<div class="descricao">
										<div class="nomeRepo">
											Nome
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoDetalhes">
											Descri��o do Projecto:
										</div>
										<div class="owners">
											Owners
											<br />
										</div>
										<div class="url">
											URL
										</div>
									</div>
								</div>
								<div class="divDescricao">
									<div class="divImagDescri">
										<img src="images/erro.png" class="imageDes"/>
									</div>
									<div class="descricao">
										<div class="nomeRepo">
											Nome
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoDetalhes">
											Descri��o do Projecto:
										</div>
										<div class="owners">
											Owners
											<br />
										</div>
										<div class="url">
											URL
										</div>
									</div>
								</div>
							</div>
							
							<div class="topRepo">
								<!--container do grafico QUEIJO-->
								<h1>Top de Projectos:</h1>
								<br /><br /><br /><br />
								<center>
									
								</center>
							</div>
							
							<div class="repPesquisa">
								<br /><br /><br />
								<div class="divPesquisaExt">
									<div class="divPesquisaInt">
										<div class="nomePesquisas">
											Search
										</div>
										
										<div class="campoEscreverPesquisas">
											 <input type="text" name="Pesquisa" class="pesquisaObjec" />
										</div>
										
										<div class="buttonPesquisas">
											<button type="button" class="buttonGo">Go</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<h3><a>Reposit�rios</a></h3>
					<div>
						<div class="demoHeaders">
							<div class="detalhesRepo">
								<h1>�ltimos Projectos do Reposit�rio</h1>
								<div class="divDescricao">
									<div class="divImagDescri">
										<a href="" class="linkProject"><img src="images/erro.png" class="imageDes"/></a>
									</div>
									<div class="descricao">
										<div class="nomeRepo">
											Nome
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoDetalhes">
											Descri��o do Reposit�rio:
										</div>
										<div class="owners">
											Owners
											<br />
										</div>
										<div class="url">
											URL
										</div>
									</div>
								</div>
								<div class="divDescricao">
									<div class="divImagDescri">
										<img src="images/erro.png" class="imageDes"/>
									</div>
									<div class="descricao">
										<div class="nomeRepo">
											Nome
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoDetalhes">
											Descri��o do Reposit�rio:
										</div>
										<div class="owners">
											Owners
											<br />
										</div>
										<div class="url">
											URL
										</div>
									</div>
								</div>
								<div class="divDescricao">
									<div class="divImagDescri">
										<img src="images/erro.png" class="imageDes"/>
									</div>
									<div class="descricao">
										<div class="nomeRepo">
											Nome
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoDetalhes">
											Descri��o do Reposit�rio:
										</div>
										<div class="owners">
											Owners
											<br />
										</div>
										<div class="url">
											URL
										</div>
									</div>
								</div>
							</div>
							
							<div class="topRepo">
								<!--container do grafico QUEIJO-->
								<h1>Detalhes do Reposit�rios: </h1>
								<div class="divDescricao">
									<div class="divImagDescri">
										<img src="images/erro.png" class="imageDes"/>
									</div>
									<div class="descricao">
										<div class="nomeRepo">
											Nome
										</div>
										<div class="linguagensRepo">
											<a href="">C++</a>
											<a href="">C</a>
											<a href="">Java</a>
											<a href="">HTML</a>
											<a href="">XML</a>
										</div>
										<div class="descricaoDetalhes">
											Descri��o do Reposit�rio:
										</div>
										<div class="owners">
											Owners
											<br />
										</div>
										<div class="url">
											URL
										</div>
									</div>
								</div>
								<h1>Outros Reposit�rios: </h1>
								<p><a href="" class="linkLinguagens">Source Force</a><p>
								<p><a href="" class="linkLinguagens">Launchpad</a><p>
							</div>
							
							<div class="repPesquisa">
								<h1>N�mero de Projectos</h1>
					<!--Github-->			<div id="container3" style="width: 200px; height: 100px;"></div>
					<!--Sourceforge-->		<div id="container10" style="width: 200px; height: 100px;"></div>
					<!--Launchpad-->		<div id="container11" style="width: 200px; height: 100px;"></div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</body>
</html>
 
 

