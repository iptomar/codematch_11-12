<!-- Top das linguagens do Github-->
<?php
require_once('DB_functions/get_topLanguagesToGraph2.php');
//dados_grafico();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	  <title>jQuery Easy Accordion Plugin</title>
	  
      <!-- Meta -->
      <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	  <meta name="author" content="Andrea Cima Serniotti - Madeincima.eu" />
	  <meta name="description" content="jQuery Easy Accordion Plugin - A highly flexible timed horizontal slider able to show any kind of content" />
      <meta name="keywords" content="jquery, sliding, toggle, slideUp, slideDown, login, login form, register" />
	  <meta name="keywords" content="jQuery, plugin, accordion, slider, slideshow, horizontal, timed, interval" />
      
      <!-- stylesheets login -->
  	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />	  
    <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />  
      <!-- Scripts -->
      <!-- scritps login hide -->
      <!-- jQuery - the core -->
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>

      <!-- INICIO DO CODIGO PARA O GRAFICO QUEIJO-->
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="../js/highcharts.js"></script>
 
 <script type="text/javascript">
	 var tituloGrafico = "Grafico de teste";
                        var dadosGrafico = [<?php dados_grafico(); ?>];//[['A',10],['B',20],['C',10],['D',20]];
	
			var chart;
				$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Top das Linguagens (Github)'
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
						 data: dadosGrafico

						
					}]
				});
			});
				
		</script>
 <!-- FIM DO CODIGO PARA O GRAFICO QUEIJO--> 
 
 <!-- INICIO DO CODIGO PARA O GRAFICO DE BARRAS-->
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="../js/highcharts.js"></script>
<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container2',
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 25
					},
					
					xAxis: {
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
							'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
					},
					yAxis: {
						title: {
							text: 'Percentagem'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					tooltip: {
						formatter: function() {
				                return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': '+ this.y +'N';
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -10,
						y: 100,
						borderWidth: 0
					},
					series: [{
						name: '.Net',
						data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
					}, {
						name: 'Java',
						data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
					}, {
						name: 'C++',
						data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
					}, {
						name: 'C',
						data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
					}]
				});
				
				
			});
				
		</script>

 
  <!-- FIM DO CODIGO PARA O GRAFICO DE BARRAS-->
 
 
 
    			
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
     
	  <script type="text/javascript" src="scripts/jquery.easyAccordion.js"></script>
      <script type="text/javascript" src="scripts/utility.js"></script>
      
      

 <style type="text/css">
		  html{font-size:62.5%}
		  body{ 
				font: 62.5% "Trebuchet MS", sans-serif; 
				margin-top: 5cm; 
				margin-right:110px; 
				margin-left:110px;  
				background: url(wallpaper.png);
				width:auto;
			}
			#header{  
				width:auto;
			}
			#foot{
				width:auto;
			}
			
		  .sample{margin:30px;border:1px solid #92cdec;background:#d7e7ff;padding:30px}
		  h1{margin:0 0 20px 0;padding:0;font-size:2em;}
		  h2{margin:40px 0 20px 0;padding:0;font-size:1.6em;}
		  .easy-accordion h2{margin:0px 0 20px 0;padding:0;font-size:1.6em;}
		  p{font-size:1.2em;line-height:170%;margin-bottom:20px}
		  		  
		 
		/*filipe inicoo schara NOT CHANGE THE FOLLOWING RULES */
		
		.easy-accordion{display:block;position:relative;overflow:hidden;padding:0;margin:0}
		.easy-accordion dt,.easy-accordion dd{margin:0;padding:0}
		.easy-accordion dt,.easy-accordion dd{position:absolute}
		.easy-accordion dt{margin-bottom:0;margin-left:0;z-index:5;/* Safari */ -webkit-transform: rotate(-90deg); /* Firefox */ -moz-transform: rotate(-90deg);-moz-transform-origin: 20px 0px;  /* Internet Explorer */ filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);cursor:pointer;}
		.easy-accordion dd{z-index:1;opacity:1;overflow:hidden}
		.easy-accordion dd.active{opacity:1;}
		.easy-accordion dd.no-more-active{z-index:2;opacity:1}
		.easy-accordion dd.active{z-index:3}
		.easy-accordion dd.plus{z-index:4}
		
		 
		 
		/* FEEL FREE TO CUSTOMIZE THE FOLLOWING RULES */
		
		dd p{line-height:120%}
			
     #accordion-2{width:900px;height:400px;padding:30px;background:#fff;border:3px solid #b5c9e8}
		#accordion-2 h2{
	font-size:2.5em;
	margin-top:10px;
}
		#accordion-2 dl{width:900px;height:400px}	
		#accordion-2 dt{
	height:56px;
	line-height:44px;
	text-align:right;
	padding:10px 15px 0 0;
	font-size:2.1em;
	font-weight:bold;
	font-family: Tahoma, Geneva, sans-serif;
	text-transform:uppercase;
	letter-spacing:2px;
	background:#5AB4D6 0 0 no-repeat;
	color:#000
}
		#accordion-2 dt.active{cursor:pointer;color:black ;background:grey 0 0 no-repeat}
		#accordion-2 dt.hover{
	color:#999;
}
		#accordion-2 dt.active.hover{
	color:#000
}
		#accordion-2 dd{padding:25px;background:url(images/slide.jpg) bottom left repeat-x;border:1px solid #dbe9ea;border-left:0;margin-right:6px}
		
		
		#accordion-2 a{color:#68889b}
		#accordion-2 dd img{float:right;margin:0 0 0 30px;position:relative;top:-20px}


      </style>
      
</head>
<body>
			<div id="header">
            </div>
			        

        <div id="accordion-2">
            <dl>
                <dt>Linguagens</dt>
				
				
                <dd>
     <!--container do grafico QUEIJO--> <div id="container" style="width: 470px; height: 350px; margin: 0 auto" align="center"></div>
    
                <p> <!--<img src="images/mammoths/img1.png" alt="Alt text to go here" />--></p>
              </dd>
                <dt>Projectos</dt>           
                <dd><h2>Vista de Projecto</h2><!-- container do grafico BARRAS--> <div id="container2" style="width:600px; height: 300px; margin: 0 auto"></div><p><!--img src="images/mammoths/img2.png" alt="Alt text to go here" /--> </p>			
				</dd>
                <dt>Repositorios</dt>
                <dd><h2>Vista de Reposit�rio</h2>                     
                <p><img src="images/mammoths/img3.png" alt="Alt text to go here" /></p></dd>
                <dt class="active">Tolmai Project</dt>
                <dd><h2>Tolmai Project</h2><div id="tolmaipage">
							<div class="tolmaihome">
								<div class="funcioProjectoTol">
								<p style="font-size:14px">	Funcionalidades do Projecto:
										Com a utiliza��o do Tolmai os seus utilizadores podem ter acesso aos projectos alojados na Internet e visualizar informa��o sobre os mesmos. � poss�vel visualizar os Reposit�rios existentes, os projectos que alojam e ainda as linguagens de programa��o utilizadas em cada projecto. Sobre cada reposit�rio � criada um ranquing de linguagens mais utilizadas em todos os seus projectos. Sobre cada projecto para al�m da informa��o sobre quem foi o seu autor e a data de cria��o, � poss�vel visualizar a data da �ltima actualiza��o que esse mesmo projecto sofreu. Ser� disponibilizado um URL para que o utilizador possa aceder directamente ao projecto desejado.
							</p>	</div>
                                <p></p>
                                <p></p>
								<div class="objTol">
								<p style="font-size:14px">	Objectivos do Projecto:
										Garantir que os seus utilizadores t�m acesso a informa��es sobre os projectos alojados na Internet como por exemplo no GitHub. Deve-se garantir uma correcta informa��o sobre cada projecto pesquisado, nomeadamente o seu autor, onde se aloja e a principal linguagem de programa��o utilizada. Os projectos mais recentes est�o colocados em destaque para se garantir a actualiza��o constante da informa��o apresentada.
								</p></div></dd>
           </dl>
        </div>
        
        	
		</div>
        		<p>2011 Tolmai Project | IPT - DEP INFORM�TICA</p>
                
 <!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome to Web-Kreation</h1>
				<h2>Sliding login panel Demo with jQuery</h2>		
				<p class="grey">You can put anything you want in this sliding panel: videos, audio, images, forms... The only limit is your imagination!
</p>
				<h2>Download</h2>
				<p class="grey">To download this script go back to <a href="http://web-kreation.com/index.php/tutorials/nice-clean-sliding-login-panel-built-with-jquery" title="Download">article &raquo;</a></p>
			</div>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="#" method="post">
					<h1>Member Login</h1>
					<label class="grey" for="log">Username:</label>
					<input class="field" type="text" name="log" id="log" value="" size="23" />
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="#">Lost your password?</a>
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				<form action="#" method="post">
					<h1>Not a member yet? Sign Up!</h1>				
					<label class="grey" for="signup">Username:</label>
					<input class="field" type="text" name="signup" id="signup" value="" size="23" />
					<label class="grey" for="email">Email:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					<label>A password will be e-mailed to you.</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Hello Guest!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->
			

</body>
</html>
