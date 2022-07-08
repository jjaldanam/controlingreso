<?php

require_once "conexion.php";

class ModeloAsistentes{


    /*===========================================================
    ELIMINAR UN REGISTRO DE ADMINISTRADORES
    ===========================================================*/

    static public function mdlEliminarRegistro($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token = :token");

        $stmt->bindParam(":token", $valor, PDO::PARAM_STR);

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;

    }

    /*===========================================================
    ACTUALIZAR UN REGISTRO
    ===========================================================*/

    static public function mdlActualizarRegistro($tabla, $datos){


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nomyape = :nomyape,
                                                        cargo = :cargo,dependencia = :dependencia                                                        
                                                        WHERE nidentidad = :nidentidad");

        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":nidentidad", $datos["nidentidad"], PDO::PARAM_STR);
        $stmt->bindParam(":nomyape", $datos["nomyape"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":dependencia", $datos["dependencia"], PDO::PARAM_STR);

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;
    }

    /*===========================================================
    INSERTAR UN ASISTENTE
    ===========================================================*/

    static public function mdlRegistroAsistente($tabla, $datos){


        // Crear el registro en la tabla ASISTENTES
        #prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( nidentidad, nomyape, cargo, dependencia,
                                                                        ultimologin, ultimologinfecha ) 
                                                VALUES ( :nidentidad, :nomyape, :cargo, :dependencia, :ultimologin,
                                                         :ultimologinfecha )"
        );

        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":nidentidad", $datos["nidentidad"], PDO::PARAM_INT);
        $stmt->bindParam(":nomyape", $datos["nomyape"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":dependencia", $datos["dependencia"], PDO::PARAM_STR);
        $stmt->bindParam(":ultimologin", $datos["ultimologin"], PDO::PARAM_STR);
        $stmt->bindParam(":ultimologinfecha", $datos["ultimologinfecha"], PDO::PARAM_STR);


        if ($stmt->execute()){


            // Crear el registro en la tabla HISTORICO
            $stmt2 = Conexion::conectar()->prepare("INSERT INTO historico ( id_historico, nidentidad_historico, accion, fecha, hora ) 
                                                VALUES ( NULL, :nidentidad, :tipoevento, :fecha, :hora )"
            );

            $fechaActual = date('Y-m-d', time());
            $horaActual = date('H:i:s');

            $stmt2->bindParam(":nidentidad", $datos["nidentidad"], PDO::PARAM_INT);
            $stmt2->bindParam(":tipoevento", $datos["ultimologin"], PDO::PARAM_STR);
            $stmt2->bindParam(":fecha", $fechaActual, PDO::PARAM_STR);
            $stmt2->bindParam(":hora", $horaActual, PDO::PARAM_STR);

            if(!$stmt2->execute()){
                echo "error adicionando en histórico";
            }
            // TERMINA de crear el registro en el HISTORICO



            return "ok";

        }else{

            return "error";

        }


        $stmt2->close();
        $stmt2 = null;


        $stmt->close();
        $stmt = null;
    }

    /*===========================================================*/
    // SELECCIONAR REGISTROS
    /*===========================================================*/

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if ($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY ultimologinfecha  DESC");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{



            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :item");
            $stmt->bindParam(":item", $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch(); // fetch - devuelve solo un registro

        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
    INSERTAR HISTORICO - BOTON AJAX
    =============================================*/

    static public function mdlInsertarHistorico($tabla, $valor1, $valor2){

        // Crear el registro en la tabla HISTORICO
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla ( id_historico, nidentidad_historico, accion, fecha, hora ) 
                                                VALUES ( NULL, :nidentidad, :accion, :fecha, :hora )"
        );

        $fechaActual = date('Y-m-d', time());
        $horaActual = date('H:i:s');

        $stmt2->bindParam(":nidentidad", $valor2, PDO::PARAM_INT);
        $stmt2->bindParam(":accion", $valor1, PDO::PARAM_STR);
        $stmt2->bindParam(":fecha", $fechaActual, PDO::PARAM_STR);
        $stmt2->bindParam(":hora", $horaActual, PDO::PARAM_STR);


        // TERMINA de crear el registro en el HISTORICO


        if($stmt2 -> execute()){

            $marcaDeTiempo = date('Y-m-d H:i:s', time());


            $stmt1 = Conexion::conectar()->prepare("UPDATE asistentes SET ultimologin= '$valor1',
                                                            ultimologinfecha='$marcaDeTiempo'
                                                            WHERE nidentidad = $valor2");

            if(!$stmt1->execute()){
                echo "error actualizando el asistente";
            }


            $stmt1->close();
            $stmt1 = null;
            // TERMINA de actualizar asistente


            return "ok";

        }else{

            return "error";

        }

        $stmt2 -> close();

        $stmt2 = null;

    }

    /*===========================================================
    ACTUALIZAR UN INTENTO FALLIDO
    ===========================================================*/

    static public function mdlActualizarIntentosFallidos($tabla, $valor, $token){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos_fallidos=:intentos_fallidos WHERE token = :token;");

        $stmt->bindParam(":token", $token, PDO::PARAM_STR);
        $stmt->bindParam(":intentos_fallidos", $valor, PDO::PARAM_INT);

        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;
    }


}
