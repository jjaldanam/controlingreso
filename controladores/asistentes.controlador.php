<?php

class ControladorAsistentes{

    /*===========================================================*/
    // ELIMINAR REGISTROS
    /*===========================================================*/

    public function ctrEliminarRegistro(){

        if(isset($_POST["eliminarRegistro"])){

            $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["eliminarRegistro"]);

            $compararToken = md5($usuario["nombre"]."+".$usuario["email"]);


            if($compararToken == $_POST["eliminarRegistro"]){

                $tabla = "registros";
                $valor = $_POST["eliminarRegistro"];

                $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla,$valor);

                if ($respuesta == "ok"){

                    // JS - Borrar la cache del navegador - borra las variables POST por si actualiza no se guarde 2 veces la info
                    echo '<script>

                        if ( window.history.replaceState ){
                            
                            window.history.replaceState(null,null, window.location.href );
                        }
                        
                        window.location = "inicio"

                     </script>';

                }
            }





        }
    }


//  TODO: Falta crear los Preg_macth de cada imput de los formularios de agregar partida y actualizar partida
//  TODO: INVESTIGAR ctype_alnum - supuestamente reemplaza el pregmatch que recibe solo números
    /*===========================================================*/
    // EDITAR BAUTISMO - ACTUALIZAR REGISTROS
    /*===========================================================*/

    static public function ctrActualizarRegistro(){

        if(isset($_POST["editarNidentidad"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNomyape"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarNidentidad"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDependencia"]) )  {

                $tabla = "asistentes";

                $datos = array("nidentidad" => $_POST["editarNidentidad"],
                    "nomyape" => $_POST["editarNomyape"],
                    "cargo" => $_POST["editarCargo"],
                    "dependencia" => $_POST["editarDependencia"]
                );

                $respuesta = ModeloAsistentes::mdlActualizarRegistro($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "El Asistente ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "asistentes";

									}
								})

					</script>';

                }

            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡El número de identidad no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "asistentes";

							}
						})

			  	</script>';
            }
        }

    }

    /*===========================================================*/
    // ADICIONAR UN ASISTENTE
    /*===========================================================*/
    static public function ctrRegistroAsistente(){

        if(isset($_POST["nidentidad"])){

            // todo -Falta los preg_match de las demàs variables
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nomyape"]) &&
                preg_match('/^[0-9]+$/', $_POST["nidentidad"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["cargo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["dependencia"]) )  {

                $tabla = "asistentes";
                $marcaDeTiempo = date('Y-m-d H:i:s', time());;

                $datos = array("nidentidad" => $_POST["nidentidad"],
                    "nomyape" => $_POST["nomyape"],
                    "cargo" => $_POST["cargo"],
                    "dependencia" => $_POST["dependencia"],
                    "ultimologin" => "Entrada",
                    "ultimologinfecha" => $marcaDeTiempo
                    );

                $respuesta = ModeloAsistentes::mdlRegistroAsistente($tabla,$datos);

                if($respuesta == "ok"){

                    echo '<script>

                        swal({
                            type: "success",
                            title: "¡El usuario ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                            
                        }).then((result)=>{
                            
                            if(result.value){
                                
                                window.location = "asistentes";
                                
                            }
                        });
                    
                    </script>';

                }

            }else{

                echo '<script>

                    swal({
                        type: "error",
                        title: "¡El número de documento no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        
                    }).then((result)=>{
                        
                        if(result.value){
                            
                            window.location = "asistentes";
                            
                        }
                    });
                    
                </script>';

            }

        }

    }

    /*===========================================================*/
    // LISTAR TABLA
    /*===========================================================*/

    static public function ctrSeleccionarRegistros($item,$valor){

        $tabla = "asistentes";

        $respuesta = ModeloAsistentes::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;
    }

    /*===========================================================*/
    // LISTAR TABLA CON DOS YAVES PRIMARIAS
    /*===========================================================*/


    static public function ctrMostrarPartidasBautismo($yave1,$valor1,$yave2,$valor2){

        $tabla = "partidasbautismos";


        $respuesta = ModeloBautismos::mdlMostrarPartidasBautismo($tabla, $yave1, $valor1, $yave2, $valor2);

        return $respuesta;
    }



}
