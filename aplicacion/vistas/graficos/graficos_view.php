<div class="container">
	<span class="no-imprimir">
		<button id="pdf" class="btn btn-primary" title="Exporta los gráficos de esta página a PDF">PDF</button>
	</span>
	<div id="graficos">
		<div class="row">
			<div class="col-md-12 ">
				<canvas id="visitasSemana" class="graficosCanvas"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<canvas id="visitasDestino" class="graficosCanvas"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<canvas id="visitasTrabajador" class="graficosCanvas"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<canvas id="visitasProcedencia" class="graficosCanvas"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<canvas id="visitasPueblo" class="graficosCanvas"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<canvas id="visitasVisitante" class="graficosCanvas"></canvas>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/chart-master/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/graficos.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jspdf.min.js"></script>
<script type="text/javascript">
	function graficar(etiqueta,graficoDiv,funcion) {
		Chart.plugins.register({
			beforeDraw: function(chartInstance) {
				var ctx = chartInstance.chart.ctx;
				ctx.fillStyle = "white";
				ctx.fillRect(0, 0, chartInstance.chart.width, chartInstance.chart.height);
			}
		});	
		Chart.plugins.register({
			afterDraw: function(chartInstance) {
				if (chartInstance.config.options.showDatapoints) {
					var helpers = Chart.helpers;
					var ctx = chartInstance.chart.ctx;
					var fontColor = helpers.getValueOrDefault(chartInstance.config.options.showDatapoints.fontColor, chartInstance.config.options.defaultFontColor);
					ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
					ctx.textAlign = 'center';
					ctx.textBaseline = 'bottom';
					ctx.fillStyle = fontColor;
					chartInstance.data.datasets.forEach(function (dataset) {
						for (var i = 0; i < dataset.data.length; i++) {
							var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
							var scaleMax = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
							var yPos = (scaleMax - model.y) / scaleMax >= 0.93 ? model.y + 20 : model.y - 5;
							ctx.fillText(dataset.data[i], model.x, yPos);
						}
					});
				}
			}
		});
		$.ajax({
			url: "<?php echo base_url(); ?>graficos/"+funcion,
		async:false, //importante
		type: 'get',
		dataType: "json", //importante
		success:function(data) {
			bgColor = [];
			bgBorder = [];
			etiquetas = [];
			valores = [];
			$.each(data, function(i,item){
				var r = Math.random() * 255;
				r = Math.round(r);
				var g = Math.random() * 255;
				g = Math.round(g);
				var b = Math.random() * 255;
				b = Math.round(b);
				bgColor.push('rgba('+r+','+g+','+b+', 0.3)');
				bgBorder.push('rgba('+r+','+g+','+b+', 1)');
				etiquetas.push(item.etiquetas);
				valores.push(item.valores);
			});
			var ctx = document.getElementById(graficoDiv).getContext("2d");
			var visitasSemana = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: etiquetas,
					datasets: [{
						label: '',
						data:valores,
						backgroundColor: bgColor,
						borderColor: bgBorder,
						borderWidth: 1				
					}]
				},
				options: {
					showDatapoints: true,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					},
					title: {
						display: true,
						text: etiqueta
					}
				}
			});
		},
		error: function(data) {
			alert(data.responseText);
		}
	});
	}
</script>
<script type="text/javascript">
	graficar("HISTÓRICO - VISITAS POR DIA DE SEMANA","visitasSemana","getData/vtotal_visitas_semanal_gr");
	graficar("HISTÓRICO - 10 DESTINOS CON MAS VISITAS","visitasDestino","getData/vvisitantes_destino_gr");
	graficar("HISTÓRICO - 10 TRABAJADORES CON MAS VISITAS","visitasTrabajador","getData/vvisitantes_personal_gr");
	graficar("HISTÓRICO - 10 PROCEDENCIAS CON MAS VISITANTES","visitasProcedencia","getData/vvisitantes_procedencia_gr");
	graficar("HISTÓRICO - 10 PUEBLOS CON MAS VISITANTES","visitasPueblo","getData/vvisitantes_pueblo_gr");
	graficar("HISTÓRICO - 10 PRINCIPALES VISITANTES","visitasVisitante","getData/vvisitas_visitante_gr");
	$('#pdf').click(function() {
		//var options = {};
		var options = {pagesplit:true};
		var pdf = new jsPDF('l', 'pt', 'a4');
		pdf.addHTML($("#graficos"), 15, 15, options, function() {
			pdf.save('pageContent.pdf');
			HideLoader();
		});
	});
</script>
