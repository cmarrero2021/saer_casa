function graficar(etiqueta,graficoDiv,funcion) {
	$.ajax({
		url: "<?php echo base_url(); ?>graficos/getData1",
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
						label: etiqueta,
						data:valores,
						backgroundColor: bgColor,
						borderColor: bgBorder,
						borderWidth: 1				
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
		},
		error: function(data) {
			alert(data.responseText);
		}
	});
}