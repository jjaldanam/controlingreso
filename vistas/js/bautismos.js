/*=============================================
EDITAR PARTIDA DE BAUTISMO
=============================================*/
$(document).on("click", ".btnEditarBautismo", function(){

	var idCodLibro = $(this).attr("idCodLibro");
	var idNumPartida = $(this).attr("idNumPartida");

	var datos = new FormData();
	datos.append("idCodLibro", idCodLibro);
	datos.append("idNumPartida", idNumPartida);

	 // console.log("Codigo del libro: ",idCodLibro," Número de Partida: ", idNumPartida);



	$.ajax({

		url:"ajax/bautismos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			 // console.log("respuesta", respuesta);

			$("#editarCodigoLibro").val(respuesta["codlibro"]);
			$("#editarFolio").val(respuesta["folio"]);
			$("#editarNumeroPartida").val(respuesta["numpartida"]);
			$("#editarFechaCelebracion").val(respuesta["fechacelebracion"]);
			$("#editarFechaNacimiento").val(respuesta["fechanacimiento"]);
			$("#editarLugarBautismo").val(respuesta["lugarbautismo"]);
			$("#editarCelebrante").val(respuesta["celebrante"]);
			$("#editarBautizado").val(respuesta["bautizado"]);
			$("#editarBautizadoSexo").html(respuesta["bautizadosexo"]);
			$("#editarBautizadoSexo").val(respuesta["bautizadosexo"]);
			$("#editarMadre").val(respuesta["madre"]);
			$("#editarPadre").val(respuesta["padre"]);
			$("#editarPadrino").val(respuesta["padrino"]);
			$("#editarMadrina").val(respuesta["madrina"]);
			$("#editarAbueloPaterno").val(respuesta["abuelopaterno"]);
			$("#editarAbuelaPaterna").val(respuesta["abuelapaterna"]);
			$("#editarAbueloMaterno").val(respuesta["abuelomaterno"]);
			$("#editarAbuelaMaterna").val(respuesta["abuelamaterna"]);
			$("#editarEstado").html(respuesta["estado"]);
			$("#editarEstado").val(respuesta["estado"]);

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


