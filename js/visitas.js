			$("#mostrar").submit(function( event ) {
				var cedula =$("#cedula").val();
				var nombre =$("#nombre").val();
				var telefono =$("#telefono").val();
				var pueblos =$("#pueblos").val();
				var estados =$("#estados").val();
				var procedencia =$("#procedencia").val();
				var tipo_visitante =$("#tipo_visitante").val();
				var motivo =$("#motivo").val();
				var piso =$("#piso").val();
				var destino =$("#destino").val();
				var autorizado =$("#autorizado").val();
				var observaciones =$("#observaciones").val();		
				$("#ocedula").val(cedula);
				$("#onombre").val(nombre);
				$("#otelefono").val(telefono);
				$("#opueblos").val(pueblos);
				$("#oestados").val(estados);
				$("#oprocedencia").val(procedencia);
				$("#otipo_visitante").val(tipo_visitante);
				$("#omotivo").val(motivo);
				$("#opiso").val(piso);
				$("#odestino").val(destino);
				$("#oautorizado").val(autorizado);
				$("#oobservaciones").val(observaciones);
				if (cedula =="" || nombre == "" || estados == "" || procedencia == "" || tipo_visitante == "" || motivo == "" || piso == "" || destino == "" || autorizado == "") {
					alert("DEBE COMPLETAR TODOS LOS CAMPOS OBLIGATORIOS");
					event.preventDefault();
				}
			});
			$(document).ready(function() {
				$("#observaciones").on('keyup', function() {
					var observaciones = $(this).val().toUpperCase();
					$(this).val(observaciones.toUpperCase());
				})
			});
			$(document).ready(function() {
				$("#autorizado").on('keyup',function() {
					var autoriza = $(this).val().toUpperCase();
					if (autoriza.length>0) {
						$("#auto").slideDown(500);
						$("#auto").slideDown("slow");
						$(this).val(autoriza.toUpperCase());
						$.ajax({
							url: "<?php echo base_url(); ?>regvisitas/getAutorizado",
							type: 'POST',
							data: 'autoriza ='+autoriza,
							success:function(data) {
								var actual = $("#auto").html();
								var comple = data.split(",");
								var index = 0;
								var val = "";
								var personas="";
								comple.forEach(function(valor,indice,array) {
									index = ((((valor.substr(0,valor.indexOf(":"))).replace('"','')).replace('"','')).replace('{','')).replace('}','');
									val = ((((valor.substr(valor.indexOf(":"),valor.length-valor.indexOf(":"))).replace(":","")).replace("}","")).replace('"','')).replace('"','');
									var salto = "";
									var auto = "auto";
									cont = "<div id='"+val+"' class='resaltado' onClick='seleccionarAjax("+'"'+val+'"'+");'>"+val+"</div>";
									personas = personas+salto+cont;
								})
								$("#auto").html(personas);
							},
							error: function(data) {
								alert(data.responseText);
							}
						});				
					} else {
						$("#auto").slideUp(500);
						$("#auto").slideUp("slow");
						$("#auto").empty();
					}
				})
			});
			$(document).ready(function() {
				$("#piso").on('change', function() {
					var id_piso = $(this).val();
					if(id_piso) {
						$.ajax({
							url: "<?php echo base_url(); ?>regvisitas/getDestino",
							type: 'POST',
							data: 'id_piso ='+id_piso,
							success:function(data) {
								var sep = data.split(",");
								$("#destino").empty();
								sep.forEach(function(valor,indice,array) {
									var index = ((((valor.substr(0,valor.indexOf(":"))).replace('"','')).replace('"','')).replace('{','')).replace('}','');
									var val = ((((valor.substr(valor.indexOf(":"),valor.length-valor.indexOf(":"))).replace(":","")).replace("}","")).replace('"','')).replace('"','');
									var opcion = '<option value = '+index+'>'+val+'</option>'
									if (opcion != '<option value = ></option>') {
										var opc = new Option(val,index);
										$(opc).html(val);
										$("#destino").append(opc);
									}
								});
							},
							error: function(data) {
								alert(data.responseText);
							}
						});
					} else {
						$('destino').html('<otion value = "">Seleccione primero el piso>');
					}
				});
			});