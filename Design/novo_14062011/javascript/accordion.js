$(function(){	// Accordion	$( "#accordion" ).accordion({		event: "null", 		header: "h3"	});	desactivarAcc();	});var homehelp = function() {	apprise('Na Home Page temos disponivel a seguinte informacao: <br />As funcionalidades e aos objectivos gerais do projecto.<br />Uma nuvem de linguagens dos projectos disponiveis.<br />Uma pesquisa geral em todo o site, desde repositorios, projectos, autor ou linguagens.<br />Esta pesquisa pode ser visualizada na tab Pesquisa.<br />Quando o utilizador pretender ter acesso a informacao sobre os repositorios (github, sourceforge e launchpad) deve clicar no respectivo icone para ser redireccionado para a tab Repositorio.');}var linguagenshelp = function() {	apprise('Apos ter escolhido a linguagem na tab Projecto, e mostrada a seguinte informacao: <br />Um grafico com as linguagens existentes no repositorio.<br />Um grafico com o top de linguagens (este top e referente aos repositorios github, sourceforge e launchpad).<br />Codigo com o "Hello World" na linguagem seleccionada.');}var repositoriohelp = function() {	apprise('Apos ter sido escolhido o repositorio na Home Page, e mostrada a seguinte informacao: <br />Uma lista com todos os projectos pertencentes a esse mesmo repositorio.<br />Os detalhes gerais do repositorio.<br />O numero de projectos existentes em cada repositorio.<br />Uma pesquisa por projectos (o resultado desta pesquisa pode ser visualizado do lado esquerdo onde anteriormente se encontrava a lista de todos os projectos existentes no repositorio).<br />Quando o utilizador pretender ter acesso a informacao especifica sobre um projecto clica sobre a imagem desse mesmo projecto para ser redireccionado para a tab Projecto.');}var projectohelp = function() {	apprise('Apos ter escolhido o projecto na tab Repositorio, e mostrada a seguinte informacao: <br />Uma lista com os colaboradores do projecto seleccionado.<br />Os detalhes do projecto.<br />Um grafico referente ao numero de ficheiros contidos nesse projecto.<br />Quando o utilizador pretender ter acesso a informacao especifica sobre uma linguagem deve clicar na linguangem em causa que se encontra nos detalhes do projecto.');}var pesquisahelp = function() {	apprise('Apos ter realizado uma pesquisa na Home Page, e mostrada toda a informacao encontrada.<br />A informacao apresentada fica visivel na tab até que se realize uma nova pesquisa para que a qualquer momento o utilizador possa visualizar o que pesquisou.<br />Para isso basta clicar na tab Pesquisa.<br />Para sair desta tab basta clicar na tab Home Page.');}var desactivarAcc = function(){	//Para desactivar um separador do acordion:	// Add the class ui-state-disabled to the headers that you want disabled	$( ".lingDIV" ).addClass("ui-state-disabled");	$( ".projDIV" ).addClass("ui-state-disabled");	$( ".repoDIV" ).addClass("ui-state-disabled");	var accordion = $( "#accordion" ).data("accordion");	accordion._std_clickHandler = accordion._clickHandler;	accordion._clickHandler = function( event, target ) {	var clicked = $( event.currentTarget || target );	if (! clicked.hasClass("ui-state-disabled"))		this._std_clickHandler(event, target);	};	}var toProjectosfromrepository = function(projecto){   $("#accordion").accordion( "activate" , 2);   $( ".projDIV" ).removeClass("ui-state-disabled");	$( ".lingDIV" ).addClass("ui-state-disabled");	$( ".repoDIV" ).addClass("ui-state-disabled");   //var isto = $(this);   //alert(projecto);   //var isto3 = this.attr("id");   //var isto4 = $(projecto).text();   $.getJSON('functions/test_search_prj_detail.php',{dat:projecto}, abrerepoacordeonproj );   //jQuery.get('DB_functions/s_project_detail.php',{dat:projecto},abrerepoacordeonproj );}var toRepository = function(repo){		$("#accordion").accordion( "activate" , 3);	$( ".repoDIV" ).removeClass("ui-state-disabled");	$( ".projDIV" ).addClass("ui-state-disabled");	$( ".lingDIV" ).addClass("ui-state-disabled");	  $(document).ready(function(){    $.getJSON('functions/test_search_Repo.php',{dat:repo}, abrerepoacordeon );  $.getJSON('functions/test_get_repo.php',{dat:repo}, abrerepoacordeon3 );	//jQuery.get('DB_functions/search_repo_2.php',{dat:repo},abrerepoacordeon );    //jQuery.get('DB_functions/get_repo.php',{dat:repo},abrerepoacordeon3 );    });}var returnHome  = function(){   $("#accordion").accordion( "activate" , 0);   $( ".repoDIV" ).addClass("ui-state-disabled");   $( ".projDIV" ).addClass("ui-state-disabled");   $( ".lingDIV" ).addClass("ui-state-disabled");}var toLinguagens = function(){   $("#accordion").accordion( "activate" , 1);	$( ".lingDIV" ).removeClass("ui-state-disabled");	$( ".repoDIV" ).addClass("ui-state-disabled");	$( ".projDIV" ).addClass("ui-state-disabled");}var toProjectos = function(){   $("#accordion").accordion( "activate" , 2);	$( ".projDIV" ).removeClass("ui-state-disabled");	$( ".lingDIV" ).addClass("ui-state-disabled");	$( ".repoDIV" ).addClass("ui-state-disabled");}var funcPesquisa = function(){	//expressao a ser pesquisada	var tex=$("input").val();	var escol = $("#escolha").val(); 	//para nao desencadear quando a pagina é carregada	$(document).ready(function(){ 		//$("#bott").click( function(){ 		//se contiver expressao e for escolhido repositorios			if(tex !="" && escol == "Repositorios")		{	//sao retornados projectos do repositorio escolhido			$.getJSON('functions/test_search_Repo.php',{dat:tex}, processaResposta );		}//Se forem escolhidos dados sobre repositorios		else if (tex =="" && escol == "Repositorios")		{	//dados ainda nao dsiponiveis			apprise('Dados de repositorios');		}//se for pedido o top de linguagens		else if(tex =="" && escol == "Linguagens")		{	//sao retornadas linguagens e suas percentagens			$.getJSON('functions/test_TopLanguages_all.php', pickTopLinguagens );		}//se for pesquisada uma linguagem		else if(tex !="" && escol == "Linguagens")			{				var text=$('input').val().toUpperCase();			$.getJSON('functions/test_search_lang_proj.php',{dat:text}, search_ling );		}//se for feita uma pesquisa por autor		else if(tex !="" && escol == "Autor")		{						$.getJSON('functions/test_search_part_author.php',{dat:text}, search_aut );		}//Se for feita a pesquisa de um projecto (detalhe)		else if(tex !="" && escol == "Projectos")		{			$.getJSON('functions/test_search_prj_detail.php',{dat:text}, search_proj );		}		else if(tex =="" && escol == "Projectos")		{			//pesquisa de todos os projectos de todos os repositorios			$.getJSON('functions/test_search_Repo.php',{dat:"Github"}, processaResposta );			$.getJSON('functions/test_search_Repo.php',{dat:"Sourceforge"}, processaResposta );			$.getJSON('functions/test_search_Repo.php',{dat:"Launchpad"}, processaResposta );		}		else		{			apprise('Tem de preencher o campo referente ao autor');		}			});}var onChange = function(){				escol = $("#escolha").val();				//$("#escolha").bind('onChange', capitalize());			}			//função que muda a 1º letra da caixa de texto para maiúscula caso			//seja escolhido o repositóriovar capitalize = function(){				escol = $("#escolha").val(); 				tex=$("input").val();				if (escol == "Repositorios")				{				$("input").addClass('capit');				 				}				else				{				$("input").removeClass('capit');				}				escol = $("#escolha").val();				$("#escolha").bind('capitalize', onChange());				//$("#txt1").bind('keyup', mostrar());			}function abrerepoacordeon( dados )			{				var texto = "";				$.each(dados, function(key, value) {				texto = texto + "<p>-<b></b><a id='" + value + "' href='#' style='color: rgb(0,0,0)' onclick='toProjectosfromrepository(this.id)'>" + value + "</a></p>";				});					$("#divrepo").html(texto);				}			function abrerepoacordeon3( dados )			{				var texto = "";				if (dados =="null")				texto = "Nao foram retornados dados.";				else				{				$.each(dados, function(key, value) {					if(key == "description")						texto = texto + "<p><b>Descricao- </b>" + value + ".</p>";					else if(key == "url")						texto = texto + "<p><b>url- </b>" + value + ".</p>";					else if(key == "logo")						texto = texto + "";					else						texto = texto + "<p>--------------------------------------</p>";				});				}				$("#divDetaRepo").html(texto);				}function abrerepoacordeonproj( dados )			{				var texto = "";				$.each(dados, function(key, value) {				if(key == "date_c")					texto = texto + "<p><b>Data de criacao- </b>" + value + ".</p>";				else if(key == "date_l")					texto = texto + "<p><b>Data de actualizacao- </b>"+ value + ".</p>";				else if(key == "source")					texto = texto + "<p><b>Link- </b>" + value + ".</p>";				else if(key == "logo")					texto = texto +"";				else					texto = texto + "<p>--------------------------------------</p>";				});				$("#divproj").html(texto);				}			//funcao processada na pesquisa de projectos de repositorios			//e abre o acordeon de pesquisa			function processaResposta( dados )			{				var texto = "";				$("#accordion").accordion( "activate" , 4);				$.each(dados, function(key, value) {				if(dados != "null" && value !="")					texto = texto + "<p><p >-<b></b><a id='" + value + "' href='#' style='color: rgb(0,0,0)' onclick='toProjectosfromrepository(this.id)'>" + value + "</a></p></p><p></p>";							else if (dados != "null" && dados == "")					texto = texto + "<p>Nao foram encontrados dados.</p>";				else					texto = texto + "<p>Nao foram encontrados dados.</p>";				});				$("#res").html(texto);				}			//retorna os dados do top de linguagens			//e abre o acordeon de pesquisa			function pickTopLinguagens( dados )			{				var texto = "";				$("#accordion").accordion( "activate" , 4);				$.each(dados, function(key, value) {				if(dados != "null" && value !="")					texto = texto + "<p><b>" + key + " - </b>" + value + " %</p>";								else if (dados != "null" && dados == "")					texto = texto + "<p>Nao foram encontrados dados.</p>";				else					texto = texto + "<p>Nao foram encontrados dados.</p>";				});				$("#res").html(texto);				}			//retorna os dados de pesquisa por linguagem			//e abre o acordeon de pesquisa			function search_ling( dados )			{				var texto = "<p><b>Projectos:</b></p>";				$("#accordion").accordion( "activate" , 4);				$.each(dados, function(key, value) {					if(dados != "null" && value !="")						texto = texto + "<p><b>- </b>" + value + ".</p>";					else if (dados != "null" && dados == "")						texto = texto + "<p>Nao foram encontrados dados.</p>";					else					texto = "Não foram retornados dados.";				});				$("#res").html(texto);				}			//retorna os dados de pesquisa por autor			//e abre o acordeon de pesquisa			function search_aut( dados )			{					var texto = "<p><b>Projectos:</b></p>";				$("#accordion").accordion( "activate" , 4);				$.each(dados, function(key, value) {					if(dados != "null")						texto = texto + "<p><p >-<b></b><a id='" + value + "' href='#' style='color: rgb(0,0,0)' onclick='toProjectosfromrepository(this.id)'>" + value + "</a></p></p><p></p>";					else if (dados != "null" && dados == "")						texto = texto + "<p>Nao foram encontrados dados.</p>";					else					texto = "<p>Nao foram retornados dados.</p>";				});								$("#res").html(texto);				}			//retorna os dados de pesquisa por projecto			//e abre o acordeon de pesquisa			function search_proj( dados )			{				var texto = "";				$("#accordion").accordion( "activate" , 4);				$.each(dados, function(key, value) {				if(key == "date_c")					texto = texto + "<p><b>Data de criacao- </b>" + value + ".</p>";				else if(key == "date_l")					texto = texto + "<p><b>Data de actualizacao- </b>"+ value + ".</p>";				else if(key == "source")					texto = texto + "<p><b>Link- </b>" + value + ".</p>";				else if(key == "logo")					texto = texto +"";				else					texto = texto + "<p>--------------------------------------</p>";				});				$("#res").html(texto);				}