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
IMPRIMIR PARTIDA DE BAUTISMO
=============================================*/
$(".tablas").on("click", ".btnImprimirBautismo", function(){

	var idCodLibro = $(this).attr("idCodLibro");
	var idNumPartida = $(this).attr("idNumPartida");

	// var datos = new FormData();
	// datos.append("idCodLibro", idCodLibro);
	// datos.append("idNumPartida", idNumPartida);

	window.open("extensiones/tcpdf/pdf/partidaBautismo.php?libro="+idCodLibro+"&partida="+idNumPartida, "_blank");


})


