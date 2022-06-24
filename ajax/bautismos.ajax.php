<?php

require_once "../controladores/bautismos.controlador.php";
require_once "../modelos/bautismos.modelo.php";

class AjaxBautismos{

	/*=============================================
	EDITAR PARTIDAS DE BAUTISMOS
	=============================================*/	

	public $idCodLibro;
    public $idNumPartida;

	public function ajaxEditarBautismo(){

		$yave2 = "numpartida";
		$valor2 = $this-> idNumPartida;

        $yave1 = "codlibro";
        $valor1 = $this->idCodLibro;

		$respuesta = ControladorBautismos::ctrMostrarPartidasBautismo($yave1, $valor1, $yave2, $valor2);

		echo json_encode($respuesta);

	}




}

/*=============================================
EDITAR PARTIDA BAUTISMO - PASAR VALORES POST
=============================================*/
if(isset($_POST["idCodLibro"])){

    $editar = new AjaxBautismos();
    $editar -> idCodLibro = $_POST["idCodLibro"];
    $editar -> idNumPartida = $_POST["idNumPartida"];
	$editar -> ajaxEditarBautismo();

}





