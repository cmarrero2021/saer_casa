	var accion_guardar;
	var url;
	function fecha_actual() {
		var x = new Date();
		var titulo = "estado_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
		return titulo;		
	}
	$.fn.DataTable.ext.pager.numbers_length = 3;
	$(document).ready(function() {
		$('#item-list').DataTable({
			"lengthMenu": [[5, 10, 20, 50, 100, 200, -1], [5, 10, 20, 50, 100, 200,  "Todos"]],
			"iDisplayLength": 10,
			"columnDefs": [
			{ width: "15%", targets: 0 }
			],
			"ajax": {
				url : "estados/get_estado",
				type : 'GET'
			},		
			"dom": 'lrfBitp',
			buttons: [
			{
				text: "<i class='icon-plus btn btn-lg btn-bluegray'></i>",titleAttr: "Agregar un estado nuevo",
				action: function (e, dt, node, config) {
					accion_guardar = 'add';
					$n=0;
					$('#estado_form')[0].reset();
					$("#id_registro").hide();
					$('#userModal').modal('show');
					$('.modal-title').text('Agreagr un nuevo estado');
				}
			},
			{ extend: 'excel', text: '<i class="fa fa-file-excel-o btn btn-lg btn-info linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a Excel", 
			exportOptions: {
				columns: [1,2]
			},
			filename: function() {
				var x = new Date();
				var titulo = "estado_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'excel', text: '<i class="icon-file-excel btn btn-lg btn-success linea-negra"></i>',titleAttr: "Exportar LA PAGINA ACTAUAL a Excel", 
			exportOptions: {
				rows:':visible',
				columns: [1,2]
			},
			filename: function() {
				var x = new Date();
				var titulo = "estado_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="fa fa-file-pdf-o btn btn-lg btn-primary linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a PDF", 
			exportOptions: {
				columns: [1,2]
			},
			filename: function() {
				var x = new Date();
				var titulo = "estado_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="icon-file-pdf btn btn-lg btn-warning linea-negra"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a PDF", 
			exportOptions: {
				rows:':visible',
				columns: [1,2]
			},
			filename: function() {
				var x = new Date();
				var titulo = "estado_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},

			{ extend: 'csv', text: '<i class="fa fa-file-text-o btn btn-lg btn-danger"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a CSV", 
			exportOptions: {
				columns: [1,2]
			},
			filename: function() {
				var x = new Date();
				var titulo = "estado_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},

			{ extend: 'csv', text: '<i class="icon-libreoffice btn btn-lg btn-verdeoscuro"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a CSV", 
			exportOptions: {
				rows:':visible',
				columns: [1,2]
			},
			filename: function() {
				var x = new Date();
				var titulo = "estado_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'print', text: '<i class="fa fa-print btn btn-lg btn-naranjaoscuro"></i>',titleAttr: "Imprimir TODOS LOS REGISTROS DEL FILTRO",
			exportOptions: {
				columns: [1,2]
			}},
			{ extend: 'print', text: '<i class="icon-printer btn btn-lg btn-purpura"></i>',titleAttr: "Imprimir LA PÁGINA ACTUAL",
			exportOptions: {
				rows: ':visible',
				columns: [1,2]
			}
		}],			
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ".",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		"aaSorting": [ [1,'asc'] ]
	});
});
	function ficha1(id) {
		url = base_url+"estados/ajax_editar/" + id;
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'JSON',
			data:id,
		})
		.done(function(data) {
			$('#id_estado_ficha').text(data.id_estado);
			$('#estado_ficha').text(data.estado);
			$('#vistaModal').modal('show');
			$('.modal-title').text('Ficha del estado');
		})
		.fail(function() {
			swal(
				'¡ERROR EN LA OPERACIÓN!',
				'No se ha podido obtener la data asicrónica',
				'error'
				);
			$("#userModal").modal('hide');			

		});
	}
	$(document).on('keyup', "input[type=text]", function () {
		$(this).val(function (_, val) {
			return val.toUpperCase();
		});
	});