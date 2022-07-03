<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Asistentes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Asistentes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAsistente">

              Agregar Asistente

          </button>

      </div>

      <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

              <thead>

              <tr>

                  <th style="width:10px">#</th>
                  <th>N.de Documento</th>
                  <th>Nombres y Apellidos completos</th>
                  <th>Cargo</th>
                  <th>Dependencia</th>
                  <th>Ultima Acción</th>
                  <th>Acciones</th>

              </tr>

              </thead>

              <tbody>

              <?php

              $item = null;
              $valor = null;
              $i = 1;

              $usuarios = ControladorAsistentes::ctrSeleccionarRegistros($item, $valor);

              foreach ($usuarios as $key => $value){

                  echo ' <tr>
                  <td>'.$i.'</td>
                  <td>'.$value["nidentidad"].'</td>
                  <td>'.$value["nomyape"].'</td>
                  <td>'.$value["cargo"].'</td>
                  <td>'.$value["dependencia"].'</td>
                  <td>'.$value["ultimologin"].' '.$value["ultimologinfecha"].'</td>';

                  // TODO: Crear campo ultimo ingreso/salida  para que se vea cuando fué la última vez que entró o salió



                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-success btnEditarUsuario" idUsuario="'.$value["nidentidad"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i>Entrar</button>

                      <button class="btn btn-warning btnEliminarUsuario" idUsuario="'.$value["nidentidad"].'" ><i class="fa fa-times"></i>Salir</button>

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

<div id="modalAgregarAsistente" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!-- CABEZA DEL MODAL  -->
                <div class="modal-header" style="background: #3c8dbc; color: white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Nuevo Asistente</h4>

                </div>

                <!-- CUERPO DEL MODAL  -->
                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NUMERO DE DOCUMENTO   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="number" min="0" max="9999999999" maxlength="11"
                                       oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                       class="form-control input-lg" name="nidentidad"
                                       placeholder="INGRESE EL NUMERO DE DOCUMENTO" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LOS NOMBRES Y APELLIDOS  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="nomyape"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="INGRESE LOS NOMBRES Y APELLIDOS" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CARGO  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="cargo"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Ingrese el Cargo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DEPENDENCIA   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="dependencia"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Dependencia" required>

                            </div>

                        </div>

                        <!-- TODO - Cambiar los íconos de los input   -->

                    </div>

                </div>

                <!-- PIE DEL MODAL  -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </div>

                <?php

                    $registro = ControladorAsistentes::ctrRegistroAsistente();

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



