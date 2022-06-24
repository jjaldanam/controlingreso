<?php

require_once "conexion.php";

class ModeloBautismos{


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


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codlibro=:codlibro,folio=:folio,
                                                        fechacelebracion=:fechacelebracion,lugarbautismo=:lugarbautismo,
                                                        fechanacimiento=:fechanacimiento,
                                                        celebrante=:celebrante, bautizado=:bautizado, 
                                                        bautizadosexo=:bautizadosexo,bautizadotipodoc=:bautizadotipodoc,
                                                        bautizadonumdoc=:bautizadonumdoc, tipofiliacion=:tipofiliacion, 
                                                        madre=:madre, madreestadocivil=:madreestadocivil, padre=:padre,
                                                        padreestadocivil=:padreestadocivil, padrino=:padrino, 
                                                        madrina=:madrina, abuelamaterna=:abuelamaterna, 
                                                        abuelomaterno=:abuelomaterno, abuelapaterna=:abuelapaterna,
                                                        abuelopaterno=:abuelopaterno, estado=:estado
                                                        WHERE numpartida = :numpartida AND codlibro = :codlibro");

        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":numpartida", $datos["numpartida"], PDO::PARAM_INT);
        $stmt->bindParam(":codlibro", $datos["codlibro"], PDO::PARAM_STR);
        $stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
        $stmt->bindParam(":fechacelebracion", $datos["fechacelebracion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechanacimiento", $datos["fechanacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":lugarbautismo", $datos["lugarbautismo"], PDO::PARAM_STR);
        $stmt->bindParam(":celebrante", $datos["celebrante"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizado", $datos["bautizado"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizadosexo", $datos["bautizadosexo"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizadotipodoc", $datos["bautizadotipodoc"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizadonumdoc", $datos["bautizadonumdoc"], PDO::PARAM_STR);
        $stmt->bindParam(":tipofiliacion", $datos["tipofiliacion"], PDO::PARAM_STR);
        $stmt->bindParam(":madre", $datos["madre"], PDO::PARAM_STR);
        $stmt->bindParam(":madreestadocivil", $datos["madreestadocivil"], PDO::PARAM_STR);
        $stmt->bindParam(":padre", $datos["padre"], PDO::PARAM_STR);
        $stmt->bindParam(":padreestadocivil", $datos["padreestadocivil"], PDO::PARAM_STR);
        $stmt->bindParam(":padrino", $datos["padrino"], PDO::PARAM_STR);
        $stmt->bindParam(":madrina", $datos["madrina"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelamaterna", $datos["abuelamaterna"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelomaterno", $datos["abuelomaterno"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelapaterna", $datos["abuelapaterna"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelopaterno", $datos["abuelopaterno"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);



        if ($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->close();

        $stmt = null;
    }

    /*===========================================================
    INSERTAR UNA PARTIDA DE BAUTISMO
    ===========================================================*/

    static public function mdlRegistroBautismo($tabla, $datos){

        #prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numpartida, codlibro, folio, fechacelebracion,
                                                fechanacimiento,
                                                lugarbautismo, celebrante, bautizado, bautizadosexo, bautizadotipodoc,
                                                bautizadonumdoc, tipofiliacion, madre, madreestadocivil, padre,
                                                padreestadocivil, padrino, madrina, abuelamaterna, abuelomaterno,
                                                abuelapaterna, abuelopaterno, estado) 
                                                VALUES (:numpartida, :codlibro, :folio, :fechacelebracion,
                                                :fechanacimiento,
                                                :lugarbautismo, :celebrante, :bautizado, :bautizadosexo, :bautizadotipodoc,
                                                :bautizadonumdoc, :tipofiliacion, :madre, :madreestadocivil, :padre,
                                                :padreestadocivil, :padrino, :madrina, :abuelamaterna, :abuelomaterno,
                                                :abuelapaterna, :abuelopaterno, :estado)"
        );



        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":numpartida", $datos["numpartida"], PDO::PARAM_INT);
        $stmt->bindParam(":codlibro", $datos["codlibro"], PDO::PARAM_STR);
        $stmt->bindParam(":folio", $datos["folio"], PDO::PARAM_INT);
        $stmt->bindParam(":fechacelebracion", $datos["fechacelebracion"], PDO::PARAM_STR);
        $stmt->bindParam(":fechanacimiento", $datos["fechanacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":lugarbautismo", $datos["lugarbautismo"], PDO::PARAM_STR);
        $stmt->bindParam(":celebrante", $datos["celebrante"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizado", $datos["bautizado"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizadosexo", $datos["bautizadosexo"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizadotipodoc", $datos["bautizadotipodoc"], PDO::PARAM_STR);
        $stmt->bindParam(":bautizadonumdoc", $datos["bautizadonumdoc"], PDO::PARAM_STR);
        $stmt->bindParam(":tipofiliacion", $datos["tipofiliacion"], PDO::PARAM_STR);
        $stmt->bindParam(":madre", $datos["madre"], PDO::PARAM_STR);
        $stmt->bindParam(":madreestadocivil", $datos["madreestadocivil"], PDO::PARAM_STR);
        $stmt->bindParam(":padre", $datos["padre"], PDO::PARAM_STR);
        $stmt->bindParam(":padreestadocivil", $datos["padreestadocivil"], PDO::PARAM_STR);
        $stmt->bindParam(":padrino", $datos["padrino"], PDO::PARAM_STR);
        $stmt->bindParam(":madrina", $datos["madrina"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelamaterna", $datos["abuelamaterna"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelomaterno", $datos["abuelomaterno"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelapaterna", $datos["abuelapaterna"], PDO::PARAM_STR);
        $stmt->bindParam(":abuelopaterno", $datos["abuelopaterno"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);


        if ($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;
    }

    /*===========================================================*/
    // SELECCIONAR REGISTROS
    /*===========================================================*/

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if ($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

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

    /*=========================================================================*/
    // MOSTRAR PARTIDA DE BAUTISMO - 2 YAVES PRIMARIAS - NUMPARTIDA Y CODLIBRO
    /*=========================================================================*/

    // TO-DO: ADAPTAR CONSULTA A DOS YAVES PRIMARIAS - OK

    static public function mdlMostrarPartidasBautismo($tabla, $yave1, $valor1, $yave2, $valor2){

        if ($yave1 == null && $valor1 == null && $yave2 == null && $valor2 == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{

            // SELECT * FROM `partidasbautismos` WHERE `numpartida` = 172 AND `codlibro` = 444
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $yave1 = :valor1 AND $yave2 = :valor2 ");

            $stmt->bindParam(":valor1", $valor1, PDO::PARAM_INT);
            $stmt->bindParam(":valor2", $valor2, PDO::PARAM_INT);

            $stmt -> execute();

            return $stmt -> fetch(); // fetch - devuelve solo un registro

        }

        $stmt->close();

        $stmt = null;
    }

}
