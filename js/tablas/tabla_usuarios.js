	var accion_guardar;
	var url;
	var ajustarTamaño;
	function fecha_actual() {
		var x = new Date();
		var titulo = "usuarios_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
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
				url : "usuarios/get_usuarios",
				type : 'GET'
			},		
			"dom": 'lrfBitp',
			buttons: [
			{
				text: "<i class='icon-plus btn btn-lg btn-bluegray'></i>",titleAttr: "Agregar nuevo usuario",
				action: function (e, dt, node, config) {
					$("#usuarios_form")[0].reset();
					$("#nombre").prop('disabled','disabled');
					accion_guardar = 'add';
					$n=0;
					$("#cont-etq-usuario").hide();
					ajustarTamaño = setInterval(tamanio, 500);
					$(".ico-picedit-checkmark").css("color","#00000");
					$(".ico-picedit-close").css("color","#00000");
					$(".ico-picedit-ico-picedit-pencil").css("color","#00000");
					$(".ico-picedit-ico-picedit-insertpicture").css("color","#00000");
					$(".ico-picedit-ico-picedit-redo").css("color","#00000");
					$(".ico-picedit-ico-picedit-arrow-maximise").css("color","#00000");
					$('#userModal').modal('show');
					$('.modal-title').text('Agregar un nuevo usuario');
				}
			},
			{ extend: 'excel', text: '<i class="fa fa-file-excel-o btn btn-lg btn-info linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a Excel", 
			exportOptions: {
				columns: [1,2,3,4,5,6,7]
			},
			filename: function() {
				var x = new Date();
				var titulo = "usuarios_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'excel', text: '<i class="icon-file-excel btn btn-lg btn-success linea-negra"></i>',titleAttr: "Exportar LA PAGINA ACTAUAL a Excel", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4,5,6,7]
			},
			filename: function() {
				var x = new Date();
				var titulo = "usuarios_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="fa fa-file-pdf-o btn btn-lg btn-primary linea-negra"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a PDF", 
			exportOptions: {
				columns: [1,2,3,4,5,6,7]
			},
			filename: function() {
				var x = new Date();
				var titulo = "usuarios_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'pdf', text: '<i class="icon-file-pdf btn btn-lg btn-warning linea-negra"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a PDF", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4,5,6,7]
			},
			filename: function() {
				var x = new Date();
				var titulo = "usuarios_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},

			{ extend: 'csv', text: '<i class="fa fa-file-text-o btn btn-lg btn-danger"></i>',titleAttr: "Exportar TODOS LOS REGISTROS DEL FILTRO a CSV", 
			exportOptions: {
				columns: [1,2,3,4,5,6,7]
			},
			filename: function() {
				var x = new Date();
				var titulo = "usuarios_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'csv', text: '<i class="icon-libreoffice btn btn-lg btn-verdeoscuro"></i>',titleAttr: "Exportar LA PÁGINA ACTUAL a CSV", 
			exportOptions: {
				rows:':visible',
				columns: [1,2,3,4,5,6,7]
			},
			filename: function() {
				var x = new Date();
				var titulo = "usuarios_"+x.getFullYear()+""+("0"+(x.getMonth() +1)).slice(-2)+""+("0"+x.getDate()).slice(-2)+"_"+("0"+x.getHours()).slice(-2)+""+("0"+x.getMinutes()).slice(-2)+""+("0"+x.getSeconds()).slice(-2);
				return titulo;
			}},
			{ extend: 'print', text: '<i class="fa fa-print btn btn-lg btn-naranjaoscuro"></i>',titleAttr: "Imprimir TODOS LOS REGISTROS DEL FILTRO",
			exportOptions: {
				columns: [1,2,3,4,5,6,7]
			}},
			{ extend: 'print', text: '<i class="icon-printer btn btn-lg btn-purpura"></i>',titleAttr: "Imprimir LA PÁGINA ACTUAL",
			exportOptions: {
				rows: ':visible',
				columns: [1,2,3,4,5,6,7]
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
	function guardar(){
		if (accion_guardar == 'add') {
			url=base_url+'usuarios/ajax_agregar';
			$("#id_usuario").val(0);
		} else {
			url=base_url+'usuarios/ajax_actualizar';
		}
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'JSON',
			data: $('#usuarios_form').serialize()
		})
		.done(function(data) {
			$('#item-list').dataTable().api().ajax.reload();
			mod = "userModal";
			swal(
				'¡OPERACIÓN EXITOSA!',
				'El registro ha sido guardado',
				'success'
				);
			$("#"+mod).modal('hide');
			$("#usuarios_form")[0].reset();
		})
		.fail(function(data) {
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
		$("#destino_form")[0].reset();
	}
	function ficha(id) {
		url = base_url+"usuarios/ajax_editar/" + id;
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'TEXT',
			data:id,
		})
		.done(function(dat) {
			var data = jQuery.parseJSON(dat);
			$("#id_usuario_ficha").text(data.id_usuario);
			$("#cedula_ficha").text(data.ci_usuario);
			$("#nombre_ficha").text(data.nombre_usuario);
			$("#login_ficha").text(data.login_usuario);
			$("#grupo_ficha").text(data.id_grupo);
			$("#activo-ficha-cont").text(data.activo);
			$("#fecha_ficha").text(data.fecha_creacion);
			$('#vistaModal').modal('show');
			$('.modal-title').text('Ficha del usuario');
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
		$("#usuarios_form")[0].reset();
	}
	$("#nombre").on('keyup',function() {
		$(this).val(function (_, val) {
			return val.toUpperCase();
		});
	});
	$("#cedula").on('blur',function() {
		var ced = $("#cedula").val();
		$("#buscar").modal('toggle');
		$.ajax({
			url: 'usuarios/buscar_cne/'+ced,
			type: 'POST',
			dataType: 'TEXT',
			data: ced,
		})
		.done(function(dat) {
			var data = jQuery.parseJSON(dat);
			$("#nombre").val(data.nombre_visitante);

			var nombre = data.nombre_visitante;
			if (nombre.length == 0) {
				$("#nombre").removeClass("obligatorio");
				$("#nombre").prop("disabled",false);
				$("#nombre").focus();
			} else {
				$("#nombre").prop("disabled",true);
				$("#nombre").addClass("obligatorio")
			}
		})
		.fail(function() {
		})
		.always(function() {
			$("#buscar").modal('toggle');
		});	
	});


	$("#clave2").on('blur',function() {
		var c1 = $("#clave").val();
		var c2 = $("#clave2").val();
		if (c1 != c2 ) {
			swal(
				'¡ERROR EN LA VERIFICACIÓN DE CLAVE!',
				'La clave introducida y su verificación no coinciden, intente de nuevo',
				'error'
				);
		}
	});

	function tamanio() {
		var ancho = $(".picedit_box").css("width");
		if (ancho != "210px") {
			$(".picedit_box").css("width","210px");
			$(".picedit_video active").css("width","210px");
			$(".picedit_box").css("height","160px");
			$(".picedit_video active").css("height","160px");
		}
	}