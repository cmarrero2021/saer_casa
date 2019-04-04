function seleccionarAjax(nombre) {
	$("#auto").empty();
	$("#autorizado").val(nombre);
	$("#auto").slideUp(500);
	$("#auto").slideUp("slow");
}
function regresar_inicio() {
	window.location.assign("/regvisitas");
}
function ordenar(cab) {
	var enc = cab.innerHTML;
	alert(enc);
}
