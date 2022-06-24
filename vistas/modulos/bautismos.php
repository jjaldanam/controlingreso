<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Bautismos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Bautismos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPartida">

              Agregar Partida

          </button>

      </div>

      <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

              <thead>

                  <tr>

                      <th style="width:10px">#</th>
                      <th>No. de Partida</th>
                      <th>Libro</th>
                      <th>Folio</th>
                      <th>Fecha de Celebración</th>
                      <th>Celebrante</th>
                      <th>Bautizado</th>
                      <th>Sexo del Bautizado</th>
                      <th>Estado</th>
                      <th>Fecha de Creación</th>
                      <th>Acciones</th>

                  </tr>



              </thead>

              <tbody>

              <?php

              $item = null;
              $valor = null;
              $i = 1;

              $usuarios = ControladorBautismos::ctrSeleccionarRegistros($item, $valor);

              foreach ($usuarios as $key => $value){

                  $fechaCelebracion = date_create_from_format('Y-m-d', $value["fechacelebracion"]);
                  $fechaCelebracion = date_format($fechaCelebracion, 'd-m-Y');

                  echo ' <tr>
                  <td>'.$i.'</td>
                  <td>'.$value["numpartida"].'</td>
                  <td>'.$value["codlibro"].'</td>
                  <td>'.$value["folio"].'</td>
                  <td>'.$fechaCelebracion.'</td>
                  <td>'.$value["celebrante"].'</td>
                  <td>'.$value["bautizado"].'</td>
                  <td>'.$value["bautizadosexo"].'</td>                
                  ';


//     TODO: Luego arreglo el boton con ajax -ej: video31 del curso POS - primero lo hago dentro de Modificar bautismo
                  if($value["estado"] != 0){

                      echo '<td><button class="btn btn-success btn-xs " idCodLibro="'.$value["codlibro"].'" idNumPartida="'.$value["numpartida"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                      echo '<td><button class="btn btn-danger btn-xs " idCodLibro="'.$value["codlibro"].'" idNumPartida="'.$value["numpartida"].'" estadoUsuario="1">Desactivado</button></td>';

                  }


                  echo '<td>'.$value["fechacreacion"].'</td>';

                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarBautismo" idCodLibro="'.$value["codlibro"].'" idNumPartida="'.$value["numpartida"].'" data-toggle="modal" data-target="#modalEditarBautismo"><i class="fa fa-pencil"></i></button> 
                      
                      <button class="btn btn-info btnImprimirBautismo" idCodLibro="'.$value["codlibro"].'" idNumPartida="'.$value["numpartida"].'">
                            <i class="fa fa-print"></i>
                      </button>
                      
                    </div>  

                  </td>

                </tr>';

                  $i++;
              }

              ?>

              </tbody>

          </table>

      </div>
      <!-- /.box-body -->

    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- ============================================= -->
<!-- VENTANA MODAL - AGREGAR PARTIDA DE BAUTISMO   -->
<!-- ============================================= -->

<div id="modalAgregarPartida" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!-- CABEZA DEL MODAL  -->
                <div class="modal-header" style="background: #3c8dbc; color: white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Nueva Partida de Bautismo</h4>

                </div>

                <!-- CUERPO DEL MODAL  -->
                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NUMERO DE LIBRO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="number" min="0" max="9999" maxlength="4"
                                       oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       class="form-control input-lg" name="codigoLibro"
                                       placeholder="Ingrese el número del Libro" required>

                            </div>

                        </div>

                        <!-- TODO - Cambiar los íconos de los input   -->
                        <!-- ENTRADA PARA EL NUMERO DEL FOLIO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="folio"
                                       placeholder="Ingrese el número del Folio" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NUMERO DE PARTIDA   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="numeroPartida"
                                       placeholder="Ingrese el número de Partida" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA FECHA DE CELEBRACION   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="fechaCelebracion"
                                       placeholder="Ingrese la fecha de celebración" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA FECHA DE NACIMIENTO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="fechaNacimiento"
                                       placeholder="Ingrese la fecha de Nacimiento" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL LUGAR DE BAUTISMO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       name="lugarBautismo" placeholder="Ingrese el lugar del bautismo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CELEBRANTE   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="celebrante"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Ingrese el nombre del Celebrante" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DEL BAUTIZADO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="bautizado"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Ingrese el nombre del Bautizado" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL SEXO DEL BAUTIZADO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <select name="bautizadoSexo" class="form-control input-lg">

                                    <option value="">Seleccionar Sexo</option>

                                    <option value="M">Masculino</option>

                                    <option value="F">Femenino</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DE LA MADRE   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="madre"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre de la Madre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PADRE   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="padre"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre del Padre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PADRINO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="padrino"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre del Padrino">

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA MADRINA  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="madrina"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre de la Madrina">

                                <input type="hidden" name="estado" value="1">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL ABUELO PATERNO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="abueloPaterno"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre del Abuelo Paterno">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL ABUELA PATERNA   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="abuelaPaterna"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre de la Abuela Paterna">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL ABUELO MATERNO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="abueloMaterno"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre del Abuelo Materno">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL ABUELA MATERNA   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="abuelaMaterna"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Nombre de la Abuela Materna">

                            </div>

                        </div>


                    </div>

                </div>

                <!-- PIE DEL MODAL  -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </div>

                <?php

                    $registro = ControladorBautismos::ctrRegistroBautismo();

                    if($registro == "ok"){

                        // JS - Borrar la cache del navegador - borra las variables POST por si actualiza no se guarde 2 veces la info
                        echo '<script>

                            if ( window.history.replaceState ){

                                window.history.replaceState(null,null, window.location.href );
                            }

                         </script>';

                        echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                    }

                    if($registro == "error"){

                        // JS - Borrar la cache del navegador - borra las variables POST por si actualiza no se guarde 2 veces la info
                        echo '<script>

                                if ( window.history.replaceState ){

                                    window.history.replaceState(null,null, window.location.href );
                                }

                             </script>';

                        echo '<div class="alert alert-danger">Error, no se permiten caracteres especiales!</div>';
                    }
                ?>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR BAUTISMO
======================================-->

<div id="modalEditarBautismo" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Bautismo</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NUMERO DE LIBRO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i> &nbsp;&nbsp; Codigo libro: </span>

                                <input type="text" class="form-control input-lg" name="editarCodigoLibro"
                                       id="editarCodigoLibro" value="" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NUMERO DE PARTIDA   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i> &nbsp;&nbsp; Número de
                                    Partida: </span>

                                <input type="text" class="form-control input-lg" name="editarNumeroPartida"
                                       id="editarNumeroPartida" value="" readonly>

                            </div>

                        </div>

                        <!-- TODO - Cambiar los íconos de los input   -->
                        <!-- ENTRADA PARA EL NUMERO DEL FOLIO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>  Folio: </span>

                                <input type="text" class="form-control input-lg" name="editarFolio"
                                       id="editarFolio" value="" required>

                            </div>

                        </div>
                        
                        <!-- ENTRADA PARA FECHA DE CELEBRACION   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i> &nbsp;&nbsp; Fecha de
                                    celebración: </span>

                                <input type="text" class="form-control input-lg" name="editarFechaCelebracion"
                                       id="editarFechaCelebracion" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA FECHA DE NACIMIENTO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i> &nbsp;&nbsp; Fecha de
                                    nacimiento: </span>

                                <input type="text" class="form-control input-lg" name="editarFechaNacimiento"
                                       id="editarFechaNacimiento" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL LUGAR DE BAUTISMO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i> &nbsp;&nbsp; Lugar de
                                    Bautismo: </span>

                                <input type="text" class="form-control input-lg" name="editarLugarBautismo"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarLugarBautismo" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CELEBRANTE   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Celebrante:
                                </span>

                                <input type="text" class="form-control input-lg" name="editarCelebrante"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarCelebrante" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DEL BAUTIZADO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Nombre
                                    del Bautizado:</span>

                                <input type="text" class="form-control input-lg" name="editarBautizado"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarBautizado" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL SEXO DEL BAUTIZADO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Sexo:</span>

                                <select name="editarBautizadoSexo" class="form-control input-lg">

                                    <option value="" id="editarBautizadoSexo"></option>

                                    <option value="M">Masculino</option>

                                    <option value="F">Femenino</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DE LA MADRE   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Madre:</span>

                                <input type="text" class="form-control input-lg" name="editarMadre"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarMadre" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PADRE   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Padre:</span>

                                <input type="text" class="form-control input-lg" name="editarPadre"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarPadre" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PADRINO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Padrino:</span>

                                <input type="text" class="form-control input-lg" name="editarPadrino"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarPadrino" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA MADRINA  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Madrina:</span>

                                <input type="text" class="form-control input-lg" name="editarMadrina"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarMadrina" value="">

                            </div>

                        </div>

                        <!-- EDITAR ABUELO PATERNO  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Abuelo Paterno:</span>

                                <input type="text" class="form-control input-lg" name="editarAbueloPaterno"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarAbueloPaterno" value="">

                            </div>

                        </div>

                        <!-- EDITAR ABUELA PATERNA  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Abuela Paterna:</span>

                                <input type="text" class="form-control input-lg" name="editarAbuelaPaterna"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarAbuelaPaterna" value="">

                            </div>

                        </div>

                        <!-- EDITAR ABUELO MATERNO  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Abuelo Materno:</span>

                                <input type="text" class="form-control input-lg" name="editarAbueloMaterno"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarAbueloMaterno" value="">

                            </div>

                        </div>

                        <!-- EDITAR ABUELA MATERNA  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Abuela Materna:</span>

                                <input type="text" class="form-control input-lg" name="editarAbuelaMaterna"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarAbuelaMaterna" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL ESTADO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>Estado:</span>

                                <select name="editarEstado" class="form-control input-lg">

                                    <option value="" id="editarEstado"></option>

                                    <option value="1">Activado</option>

                                    <option value="0">Desactivado</option>

                                </select>

                            </div>

                        </div>


                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar Bautismo</button>

                </div>

                <?php

                 $editarBautismo = ControladorBautismos::ctrActualizarRegistro();

                ?>

            </form>

        </div>

    </div>

</div>



