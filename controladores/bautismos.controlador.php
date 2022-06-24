<?php

class ControladorBautismos{

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

        if(isset($_POST["editarCodigoLibro"])){

            if(preg_match('/^[0-9]+$/', $_POST["editarCodigoLibro"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarNumeroPartida"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarNumeroPartida"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarFolio"])) {

                $tabla = "partidasbautismos";

                $datos = array("numpartida" => $_POST["editarNumeroPartida"],
                    "codlibro" => $_POST["editarCodigoLibro"],
                    "folio" => $_POST["editarFolio"],
                    "fechacelebracion" => $_POST["editarFechaCelebracion"],
                    "fechanacimiento" => $_POST["editarFechaNacimiento"],
                    "lugarbautismo" => $_POST["editarLugarBautismo"],
                    "celebrante" => $_POST["editarCelebrante"],
                    "bautizado" => $_POST["editarBautizado"],
                    "bautizadosexo" => $_POST["editarBautizadoSexo"],
                    "bautizadotipodoc" => null,
                    "bautizadonumdoc" => null,
                    "tipofiliacion" => null,
                    "madre" => $_POST["editarMadre"],
                    "madreestadocivil" => null,
                    "padre" => $_POST["editarPadre"],
                    "padreestadocivil" => null,
                    "padrino" => $_POST["editarPadrino"],
                    "madrina" => $_POST["editarMadrina"],
                    "estado" => $_POST["editarEstado"],
                    "abuelamaterna" => $_POST["editarAbuelaMaterna"],
                    "abuelomaterno" => $_POST["editarAbueloMaterno"],
                    "abuelapaterna" => $_POST["editarAbuelaPaterna"],
                    "abuelopaterno" => $_POST["editarAbueloPaterno"]
                );

                $respuesta = ModeloBautismos::mdlActualizarRegistro($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "bautismos";

									}
								})

					</script>';

                }

            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡El código del libro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "bautismos";

							}
						})

			  	</script>';
            }
        }

    }

    /*===========================================================*/
    // ADICIONAR UNA PARTIDA DE BAUTISMO
    /*===========================================================*/
    static public function ctrRegistroBautismo(){

        if(isset($_POST["codigoLibro"])){

            // todo -Falta los preg_match de las demàs variables
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["bautizado"]) &&
                preg_match('/^[0-9]+$/', $_POST["numeroPartida"]) &&
                preg_match('/^[0-9]+$/', $_POST["codigoLibro"])) {

                $tabla = "partidasbautismos";

                $datos = array("numpartida" => $_POST["numeroPartida"],
                    "codlibro" => $_POST["codigoLibro"],
                    "folio" => $_POST["folio"],
                    "fechacelebracion" => $_POST["fechaCelebracion"],
                    "fechanacimiento" => $_POST["fechaNacimiento"],
                    "lugarbautismo" => $_POST["lugarBautismo"],
                    "celebrante" => $_POST["celebrante"],
                    "bautizado" => $_POST["bautizado"],
                    "bautizadosexo" => $_POST["bautizadoSexo"],
                    "bautizadotipodoc" => null,
                    "bautizadonumdoc" => null,
                    "tipofiliacion" => null,
                    "madre" => $_POST["madre"],
                    "madreestadocivil" => null,
                    "padre" => $_POST["padre"],
                    "padreestadocivil" => null,
                    "padrino" => $_POST["padrino"],
                    "madrina" => $_POST["madrina"],
                    "abuelamaterna" => $_POST["abuelaMaterna"],
                    "abuelomaterno" => $_POST["abueloMaterno"],
                    "abuelapaterna" => $_POST["abuelaPaterna"],
                    "abuelopaterno" => $_POST["abueloPaterno"],
                    "estado" => $_POST["estado"]
                    );

                $respuesta = ModeloBautismos::mdlRegistroBautismo($tabla,$datos);

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
                                
                                window.location = "bautismos";
                                
                            }
                        });
                    
                    </script>';

                }

            }else{

                echo '<script>

                    swal({
                        type: "error",
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        
                    }).then((result)=>{
                        
                        if(result.value){
                            
                            window.location = "bautismos";
                            
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

        $tabla = "partidasbautismos";

        $respuesta = ModeloBautismos::mdlSeleccionarRegistros($tabla, $item, $valor);

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
