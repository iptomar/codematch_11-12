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
				