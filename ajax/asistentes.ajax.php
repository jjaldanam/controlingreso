<?php

require_once "../controladores/asistentes.controlador.php";
require_once "../modelos/asistentes.modelo.php";

class AjaxAsistentes{

	/*=============================================
	EDITAR ASISTENTE
	=============================================*/	

    public $nidentidad;

	public function ajaxEditarAsistente(){

        $yave1 = "nidentidad";
        $valor1 = $this->nidentidad;

		$respuesta = ControladorAsistentes::ctrSeleccionarRegistros($yave1, $valor1);

		echo json_encode($respuesta);

	}


}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["nidentidad"])){

    $editar = new AjaxAsistentes();
    $editar -> nidentidad = $_POST["nidentidad"];
	$editar -> ajaxEditarAsistente();

}





