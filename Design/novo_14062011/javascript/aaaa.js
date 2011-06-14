	$(document).ready(function() {		
			$.getJSON('functions/test_TopLanguages_2.php', get_Top);
	});
	function get_Top(dados){
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
						data:dados
						}]
				});
	}
			//numero de projectos do Sourceforge
			$(document).ready(function() {		
			var tex = "Sourceforge";
			$.getJSON('functions/test_totalProjectPorRepo.php',{dat:tex}, get_rep1);
	});
		function get_rep1(dados){
		if(dados != "null")
		{
			
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
						data: dados
					}]
				});
				}
				else 
				{
				var outro = "<p>Não foi encontrado o número de projectos do Sourceforge!</p>";
				$("#container10").html(outro);
				}
			}
			//numero de projectos do Launchpad
			
			$(document).ready(function() {		
			var tex = "Launchpad";
			$.getJSON('functions/test_totalProjectPorRepo.php',{dat:tex}, get_rep2);
	});
		function get_rep2(dados){
		if(dados != "null")
		{
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
						data: dados
					}]
				});
				}
				
				else 
				{
				var outro = "<p>Não foi encontrado o número de projectos do Launchpad!</p>";
				$("#container11").html(outro);
				}
				
				
				
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			//top de linguagens do Github
			$(document).ready(function() {		
			
			var tex ="Github";
			$.getJSON('functions/test_TopLanguagesRepo.php',{dat:tex}, get_TopRepo1);
	});
			function get_TopRepo1(dados){
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
						data:dados
						}]
				});
			
				}
				
				//top de linguagens do Sourceforge
			$(document).ready(function() {		
			
			var tex ="Sourceforge";
			$.getJSON('functions/test_TopLanguagesRepo.php',{dat:tex}, get_TopRepo2);
	});
			function get_TopRepo2(dados){
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
						data:dados
						}]
				});
			
				}
				
				
			//numero de projectos do Github
			$(document).ready(function() {		
			var tex = "Github";
			$.getJSON('functions/test_totalProjectPorRepo.php',{dat:tex}, get_rep3);
	});
		function get_rep3(dados){
		if(dados != "null")
		{
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
						data: dados
					}]
				});
				
				}
				
				else 
				{
				var outro = "<p>Não foi encontrado o número de projectos do Github!</p>";
				$("#container3").html(outro);
				}
				
				
				
			}
				
