<?php

require_once "../../../controladores/bautismos.controlador.php";
require_once "../../../modelos/bautismos.modelo.php";

/*  TODO: -Fechas en español para
 *
 * */

class ImprimirPartidaBautismo{

public $libro;
public $partida;

public function traerImpresionBautismo(){

// Traemos la información de la Partida
$yave1 = "codlibro";
$valor1 = $this->libro;
$yave2 = "numpartida";
$valor2 = $this->partida;


$respuestaPartida = ControladorBautismos::ctrMostrarPartidasBautismo($yave1, $valor1, $yave2, $valor2);

// Traemos librería para imprimir fecha como texto
require_once('lib_fecha_texto.php');
$fecha_texto = fechaATexto("22/03/2021");

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

    <table>
    
        <tr>        
<!--         En pdf el ancho de la página es 540px                                  -->
            <th colspan="3" style="width: 540px"><img src="images/membretesupvalvanera.png"></th>            
        </tr>
        <tr>
            <td colspan="3" style="width: 540px; text-align: center"><br /><br /><br />PARTIDA DE BAUTISMO<br /><br /></td>
        </tr>
        <tr>
        
            <td style="width: 70px"></td>
            <td style="width: 400px">
Certifico que en el libro $respuestaPartida[codlibro] folio $respuestaPartida[folio] y número $respuestaPartida[numpartida], se encuentra la siguiente partida: 
                 <br /><br />

                Fecha de Bautismo: $respuestaPartida[fechacelebracion]<br /><br />
                
                Bautizado: $respuestaPartida[bautizado]<br /><br />
                
                Fecha de Nacimiento: $respuestaPartida[fechanacimiento]<br /><br />
                
                Hijo legítimo de: $respuestaPartida[padre] y $respuestaPartida[madre]<br /><br />
                
                Abuelos Paternos: $respuestaPartida[abuelopaterno] y $respuestaPartida[abuelapaterna]<br /><br />
                
                Abuelos Maternos: $respuestaPartida[abuelomaterno] y $respuestaPartida[abuelamaterna]<br /><br />
                
                Padrinos: $respuestaPartida[padrino] y $respuestaPartida[madrina]<br /><br />
                
                Ministro: $respuestaPartida[celebrante]<br /><br />
                
                Da Fe: $respuestaPartida[celebrante]<br />
                
                <hr>
                <br />&nbsp;<br />
               
                NOTAS MARGINALES: No tiene hasta la fecha.
                <br />
               <hr />
                &nbsp;<br />              
                
                Expedida en Pitalito - Huila (Colombia) el $fecha_texto
                <br />
                <br /><br /><br />
                
                Doy Fe &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AQUI VIENE LA FIRMA DEL SACERDOTE
                <br /><br />                
                
                ----------------------------------------------------------------------------------------------------
                Registraduria Eclesial - Gestión Eclesial
                
                
                
               
                
            </td>
            <td style="width: 70px"></td>
            
        </tr>
    
    </table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// -------------------------------------------------------------------------------
// SALIDA DEL ARCHIVO

$pdf->Output('partidaBautismo.php');

}

}

$bautismo = new ImprimirPartidaBautismo();
$bautismo -> libro = $_GET["libro"];
$bautismo -> partida = $_GET["partida"];
$bautismo -> traerImpresionBautismo();

?>