	var accion_guardar;
	var url;
	function fecha_actual() {
		var x = new Date();
		var titulo = "aeropuerto_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
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
				url : "aeropuertos/get_aeropuerto",
				type : 'GET'
			},		
			"dom": 'lrfBitp',
			buttons: [
			{
				text: "<i class='icon-plus btn btn-lg btn-bluegray'></i>",titleAttr: "Agregar un aeropuerto nuevo",
				action: function (e, dt, node, config) {
					accion_guardar = 'add';
					$n=0;
					$("#tipo option").each(function(){
						if ($(this).text() == "Seleccione un tipo de aeropuerto") {
							$n++;
						}
					});
					if ($n == 0) {
						$('#tipo').prepend('<option value="0" selected>Seleccione un tipo de aeropuerto</option>');
					}
					$m=0;
					$("#estado option").each(function(){
						if ($(this).text() == "Seleccione un estado") {
							$m++;
						}
					});
					if ($m == 0) {
						$('#estado').prepend('<option value="0" selected>Seleccione un estado</option>');
					}
					$('#aeropuerto_form')[0].reset();
					$("#id_registro").hide();
					$('#userModal').modal('show');
					$('#tipo option').show();
					$('#estado option').show();
					$('.modal-title').text('Agreagr un nuevo aeropuerto');
				}
			},
			{ extend: 'excel', text: '<i class="fa fa-file-excel-o btn btn-lg btn-info linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a Excel", 
			exportOptions: {
				columns: [1,2,3,4,5,6,7,8]
			},
			filename: function() {
				var x = new Date();
				var titulo = "aeropuerto_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'excel', text: '<i class="icon-file-excel btn btn-lg btn-success linea-negra"></i>',titleAttr: "Exportar LA PAGINA ACTAUAL a Excel", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4,5,6,7,8]
			},
			filename: function() {
				var x = new Date();
				var titulo = "aeropuerto_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="fa fa-file-pdf-o btn btn-lg btn-primary linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a PDF", 
			exportOptions: {
				columns: [1,2,3,4,5,6,7,8]
			},
			filename: function() {
				var x = new Date();
				var titulo = "aeropuerto_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="icon-file-pdf btn btn-lg btn-warning linea-negra"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a PDF", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4,5,6,7,8]
			},
			filename: function() {
				var x = new Date();
				var titulo = "aeropuerto_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},

			{ extend: 'csv', text: '<i class="fa fa-file-text-o btn btn-lg btn-danger"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a CSV", 
			exportOptions: {
				columns: [1,2,3,4,5,6,7,8]
			},
			filename: function() {
				var x = new Date();
				var titulo = "aeropuerto_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},

			{ extend: 'csv', text: '<i class="icon-libreoffice btn btn-lg btn-verdeoscuro"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a CSV", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4,5,6,7,8]
			},
			filename: function() {
				var x = new Date();
				var titulo = "aeropuerto_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'print', text: '<i class="fa fa-print btn btn-lg btn-naranjaoscuro"></i>',titleAttr: "Imprimir TODOS LOS REGISTROS DEL FILTRO",
			exportOptions: {
				columns: [1,2,3,4,5,6,7,8]
			}},
			{ extend: 'print', text: '<i class="icon-printer btn btn-lg btn-purpura"></i>',titleAttr: "Imprimir LA PÁGINA ACTUAL",
			exportOptions: {
				rows: ':visible',
				columns: [1,2,3,4,5,6,7,8]
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
	function guardar1(){
		if (accion_guardar == 'add') {
			url=base_url+'aeropuertos/ajax_agregar';
			$("#id_aeropuerto").val(0);
		} else {
			url=base_url+'aeropuertos/ajax_actualizar';
		}
		var datos1 = $('#aeropuerto_form').serialize();
		var datos1 = datos1.substr(datos1.length - 15);
		var datos2 = $('#aeropuerto_form').serialize();
		var datos2 = datos2.substr(0,datos2.length - 15);
		if (datos1 == "administrado=SI") {
			var dat = "administrado='true'";
		} else {
			var dat = "administrado='false'";
		}
		var datos = datos2 + dat;
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'text',
			data: datos
		})
		.done(function() {
			$('#item-list').dataTable().api().ajax.reload();
			swal(
				'¡OPERACIÓN EXITOSA!',
				'El registro ha sido guardado',
				'success'
				);
			$("#userModal").modal('hide');
		})
		.fail(function() {
			$('#item-list').dataTable().api().ajax.reload();
			//ME DA UN ERROR 500 AUN CUANDO SI ACTUALIZA, REVISAR POR QUÉ
			swal(
				'¡OPERACIÓN EXITOSA!',
				'El registro ha sido guardado',
				'success'
				);

			// swal(
			// 	'¡ERROR EN LA OPERACIÓN!-2',
			// 	'El registro no se ha podido procesar',
			// 	'error'
			// 	);
			$("#userModal").modal('hide');
		})
		.always(function() {
		});

	}
	function eliminar1(id) {
		swal({
			title: '¿Está seguro de borar el registro N° '+id+'?',
			text: "¡La operación no se puede deshacer!",
			type: 'warning',
			dangerMode: true,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '¡Si!'
		}).then(result => {
			if (result.value) {
				var url;
				url = base_url+'aeropuertos/ajax_eliminar/'+id;
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'JSON',
				})
				.done(function(data) {
					$('#userModal').modal('hide');
					$('#item-list').dataTable().api().ajax.reload();
					swal(
						'¡Registro Eliminado!',
						'El registro ha sido eliminado.',
						'success'
						);					
				})
				.fail(function() {
					$('#userModal').modal('hide');
					$('#item-list').dataTable().api().ajax.reload();
					swal(
						'¡Registro Eliminado!',
						'El registro ha sido eliminado.',
						'success'
						);						
					// swal(
					// 	'¡ERROR EN LA OPERACIÓN!',
					// 	'El registro no se pudo eliminar',
					// 	'error'
					// 	);
				})
				.always(function() {
				});
			}
		})
	}
	function editar1(id) {
		accion_guardar = 'update';
		$("#id_registro").show();
		$.ajax({
			url: base_url+"aeropuertos/ajax_editar/" + id,
			type: 'GET',
			dataType: 'JSON',
		})
		.done(function(data) {
			$('#etq_id_aeropuerto').html(data.id_aeropuerto);
			$('[name="aeropuerto"]').val(data.aeropuerto);
			$('[name="id_aeropuerto"]').val(data.id_aeropuerto);
			$('[name="tipo"]').val(data.tipo);
			$('#tipo option[value='+data.id_tipo+']').show();
			$("#tipo option[value="+ data.id_tipo +"]").attr("selected",true);
			$('[name="iata"]').val(data.iata);
			$('[name="oaci"]').val(data.cod_oaci);
			$('[name="iata"]').val(data.cod_iata);
			$('[name="aeropuerto"]').val(data.aeropuerto);
			$('[name="denominacion"]').val(data.denominacion);
			$('#estado option[value='+data.id_estado+']').show();
			$("#estado option[value="+ data.id_estado +"]").attr("selected",true);
			$('[name="administrado"]').val(data.administrado);
			$('#userModal').modal('show');
			$('.modal-title').text('Editar aeropuerto');
			$('"tipo"').prop('selectedIndex', 8);
			$('"estado"').prop('selectedIndex', 8);
		})
		.fail(function() {
			swal(
				'¡ERROR EN LA OPERACIÓN!',
				'El registro no se ha podido procesar',
				'error'
				);
			$("#userModal").modal('hide');			
		});
	}
	function ficha1(id) {
		url = base_url+"aeropuertos/ajax_editar/" + id;
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'JSON',
			data:id,
		})
		.done(function(data) {
			$('#id_aeropuerto_ficha').text(data.id_aeropuerto);
			$('#tipo_ficha').text(data.tipo_aeropuerto);
			$('#iata_ficha').text(data.cod_iata);
			$('#oaci_ficha').text(data.cod_oaci);
			$('#aeropuerto_ficha').text(data.aeropuerto);
			$('#denominacion_ficha').text(data.denominacion);
			$('#estado_ficha').text(data.estado);
			$('#administrado_ficha').text(data.administrado);
			$('#vistaModal').modal('show');
			$('.modal-title').text('Ficha del aeropuerto');
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