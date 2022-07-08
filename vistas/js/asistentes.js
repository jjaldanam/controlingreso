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


/*=============================================
ACTIVAR -ENTRADA/SALIDA DE  ASISTENTE
=============================================*/
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


