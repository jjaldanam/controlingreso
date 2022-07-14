/*=============================================
EDITAR ASISTENTE
=============================================*/

$(document).on("click", ".btnEditarAsistente", function(){

	var nidentidad = $(this).attr("nidentidad");


	var datos = new FormData();
	datos.append("nidentidad", nidentidad);




	$.ajax({

		url:"ajax/asistentes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			  // console.log("respuesta", respuesta);

			$("#editarNidentidad").val(respuesta["nidentidad"]);
			$("#editarNomyape").val(respuesta["nomyape"]);
			$("#editarCargo").val(respuesta["cargo"]);
			$("#editarDependencia").val(respuesta["dependencia"]);

		}

	});

})

// /*=============================================
// CONFIRMAR ACCION con MODAL - ME FALLA AL MOMENTO DE ACTUALIZAR LA ÚLTIMA ACCION, NO REGARGA BIEN LA PAGINA DESPUES DE HACER LOS CAMBIOS EN LA BD
// =============================================*/
//
// $(document).on("click", ".btnAccion", function(){
//
// 	var nidentidad = $(this).attr("nidentidad");
// 	var nomyape = $(this).attr("nomyape");
// 	var accion = $(this).attr("accion")
//
//
// 	// confirmarNidentidad
// 	$("#confirmarNidentidad").val(nidentidad);
// 	$("#confirmarNomyape").val(nomyape);
// 	$("#confirmarAccion").val(accion);
// 	$("#confirmarAccionTexto").html(accion);
//
//
//
// })




/*=============================================
JUNTO CON AJAX - ACTIVAR -ENTRADA/SALIDA DE  ASISTENTE    - TEMPORALMENTE NO USADO
=============================================*/
/*
$(".btnActivarHistorico").click(function (){

	var nidentidad = $(this).attr("nidentidad");
	var accion = $(this).attr("accion");

	var datos = new FormData();
	datos.append("activarNidentidad", nidentidad);
	datos.append("activarAccion", accion);

	$.ajax({

		url:"ajax/asistentes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

		}
	})


	if(accion == 'Salida' ){

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Entrada');
		$(this).attr('accion','Entrada');

	}else{
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
	 	$(this).html('Salida');
	 	$(this).attr('accion','Salida');

	 }


})

*/


/*=============================================
CONFIRMAR ACCION DEL ASISTENTE ( ENTRADA / SALIDA )
=============================================*/
$(document).on("click", ".btnAccion", function(){

	var nidentidad = $(this).attr("nidentidad");
	var nomyape = $(this).attr("nomyape")
	var accion = $(this).attr("accion");

	swal({
		title: '¿Confirma la '+accion.toUpperCase()+' de '+nomyape+'?',
		text: "¡Si no está seguro puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Confirmar!'
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=asistentes&nidentidad="+nidentidad+"&accion="+accion;

		}

	})

})