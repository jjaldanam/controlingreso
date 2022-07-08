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

    /*=============================================
    ACTIVAR USUARIO
    =============================================*/

    public $activarNidentidad;
    public $activarAccion;


    public function ajaxInsertarHistorico(){

        $tabla = "historico";


        $valor1 = $this->activarAccion;
        $valor2 = $this->activarNidentidad;

        $respuesta = ModeloAsistentes::mdlInsertarHistorico($tabla, $valor1, $valor2);

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

/*=============================================
 ACTIVAR USUARIO
=============================================*/

if(isset($_POST["activarNidentidad"])){

    $activarHistorico = new AjaxAsistentes();
    $activarHistorico -> activarNidentidad = $_POST["activarNidentidad"];
    $activarHistorico -> activarAccion = $_POST["activarAccion"];

    $activarHistorico -> ajaxInsertarHistorico();

}




