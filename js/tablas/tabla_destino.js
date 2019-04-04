	var accion_guardar;
	var url;
	function fecha_actual() {
		var x = new Date();
		var titulo = "destino_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
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
				url : "destino/get_destino",
				type : 'GET'
			},		
			"dom": 'lrfBitp',
			buttons: [
			{
				text: "<i class='icon-plus btn btn-lg btn-bluegray'></i>",titleAttr: "Agregar un destino nuevo",
				action: function (e, dt, node, config) {
					accion_guardar = 'add';
					$n=0;
					$("#oficina option").each(function(){
						if ($(this).text() == "Seleccione una oficina") {
							$n++;
						}
					});
					if ($n == 0) {
						$('#oficina').prepend('<option value="0" selected>Seleccione una oficina</option>');
					}
					$m=0;
					$("#piso option").each(function(){
						if ($(this).text() == "Seleccione un piso") {
							$m++;
						}
					});
					if ($m == 0) {
						$('#piso').prepend('<option value="0" selected>Seleccione un piso</option>');
					}
					$('#destino_form')[0].reset();
					$("#id_registro").hide();
					$('#userModal').modal('show');
					$('#empresa option').show();
					$('.modal-title').text('Agreagr un nuevo destino');
				}
			},
			{ extend: 'excel', text: '<i class="fa fa-file-excel-o btn btn-lg btn-info linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a Excel", 
			exportOptions: {
				columns: [1,2,3,4]
			},
			filename: function() {
				var x = new Date();
				var titulo = "destino_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'excel', text: '<i class="icon-file-excel btn btn-lg btn-success linea-negra"></i>',titleAttr: "Exportar LA PAGINA ACTAUAL a Excel", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4]
			},
			filename: function() {
				var x = new Date();
				var titulo = "destino_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="fa fa-file-pdf-o btn btn-lg btn-primary linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a PDF", 
			exportOptions: {
				columns: [1,2,3,4]
			},
			filename: function() {
				var x = new Date();
				var titulo = "destino_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="icon-file-pdf btn btn-lg btn-warning linea-negra"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a PDF", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4]
			},
			filename: function() {
				var x = new Date();
				var titulo = "destino_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},

			{ extend: 'csv', text: '<i class="fa fa-file-text-o btn btn-lg btn-danger"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a CSV", 
			exportOptions: {
				columns: [1,2,3,4]
			},
			filename: function() {
				var x = new Date();
				var titulo = "destino_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},

			{ extend: 'csv', text: '<i class="icon-libreoffice btn btn-lg btn-verdeoscuro"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a CSV", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4]
			},
			filename: function() {
				var x = new Date();
				var titulo = "destino_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'print', text: '<i class="fa fa-print btn btn-lg btn-naranjaoscuro"></i>',titleAttr: "Imprimir TODOS LOS REGISTROS DEL FILTRO",
			exportOptions: {
				columns: [1,2,3,4]
			}},
			{ extend: 'print', text: '<i class="icon-printer btn btn-lg btn-purpura"></i>',titleAttr: "Imprimir LA PÁGINA ACTUAL",
			exportOptions: {
				rows: ':visible',
				columns: [1,2,3,4]
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
			url=base_url+'destino/ajax_agregar';
			$("#id_destino").val(0);
		} else {
			url=base_url+'destino/ajax_actualizar';
		}
		if ( $("#destino1").length==0    && $("#destino1").is("visible")) {
			var destino = $('#destino').val();
		} else {
			var destino = $('#destino1').val();
		}
		if (destino =="") {
			swal(
				'¡ERROR EN LA OPERACIÓN-1',
				'Debe indicar el nombre del destino',
				'error'
				);			
		} else {
			if ($("#id_destino").val() == "") {
				$("#id_destino").val(0);
			}
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'JSON',
				data: $('#destino_form').serialize(),
			})
			.done(function() {
				if ( $("#destino1").length>0  && $("#destino1").is(":visible")) {
					val = $("#empresa").prop('selectedIndex');
					$('#destino').append('<option value="'+val+'" selected="selected">'+destino+'</option>');
					$('#destino option[value='+val+']').attr("selected",true);
					mod = "agrDestino";
				} else {
					$('#item-list').dataTable().api().ajax.reload();
					mod = "userModal";
				}
				swal(
					'¡OPERACIÓN EXITOSA!',
					'El registro ha sido guardado',
					'success'
					);
				$("#"+mod).modal('hide');
				$("#destino_form")[0].reset();
			})
			.fail(function() {
				swal(
					'¡ERROR EN LA OPERACIÓN!-2',
					'El registro no se ha podido procesar',
					'error'
					);
				$("#userModal").modal('hide');
			})
			.always(function() {
			});
		}
		///20181016///
		$("#destino_form")[0].reset();
		// $(formulario)[0].reset();
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
				url = base_url+'destino/ajax_eliminar/'+id;
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
					swal(
						'¡ERROR EN LA OPERACIÓN!',
						'El registro no se pudo eliminar',
						'error'
						);
				})
				.always(function() {
				});
			}
		})
	}
	function editar1(id) {
		accion_guardar = 'update';
		$("#id_registro").show();
		$('#destino_form')[0].reset();
		$.ajax({
			url: base_url+"destino/ajax_editar/" + id,
			type: 'GET',
			dataType: 'JSON',
		})
		.done(function(data) {
			$('#etq_id_destino').html(data.id_destino);
			$('[name="destino"]').val(data.destino);
			$('[name="id_destino"]').val(data.id_destino);
			$('[name="empresa"]').val(data.empresa);
			$('#empresa option[value='+data.id_empresa+']').show();
			$("#empresa option[value="+ data.id_empresa +"]").attr("selected",true);
			$('#empresa option[value!='+data.id_empresa+']').hide();
			$('[name="abrev"]').val(data.abrev);
			$('#userModal').modal('show');
			$('.modal-title').text('Editar destino');
			$('"oficina"').prop('selectedIndex', 8);
		})
		.fail(function() {
			swal(
				'¡ERROR EN LA OPERACIÓN!',
				'El registro no se ha podido procesar',
				'error'
				);
			$("#userModal").modal('hide');			
		});
		///20181016///
		$("#destino_form")[0].reset();
		// $(formulario)[0].reset();

	}
	function ficha1(id) {
		url = base_url+"destino/ajax_editar/" + id;
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'TEXT',
			data:id,
		})
		.done(function(data) {
			$('#destino_ficha').text(data.destino);
			$('#empresa_ficha').text(data.empresa);
			$('#abreviatura_ficha').text(data.abrev);
			$('#id_destino_ficha').text(data.id_destino);
			$('#vistaModal').modal('show');
			$('.modal-title').text('Ficha del destino');
		})
		.fail(function() {
			alert('Error get data from ajax');
			swal(
				'¡ERROR EN LA OPERACIÓN!',
				'No se ha podido obtener la data asicrónica',
				'error'
				);
			$("#userModal").modal('hide');			

		});
		///20181016///
		$("#destino_form")[0].reset();
		// $(formulario)[0].reset();

	}
	$(document).on('keyup', "input[type=text]", function () {
		$(this).val(function (_, val) {
			return val.toUpperCase();
		});
	});