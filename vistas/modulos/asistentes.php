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
                  <th>Acciones</th>
                  <th>Ultima Acción</th>
                  <th>Editar</th>

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
                  <td>'.$value["dependencia"].'</td>';


                  // Comparar si el último login fue otro día
                  $fechaActual = date('Y-m-d', time());
                  $solamenteFecha = date('Y-m-d',strtotime($value['ultimologinfecha']));



                  //     TODO: Luego arreglo el boton con ajax -ej: video31 del curso POS - primero lo hago dentro de Modificar bautismo
                  if($value["ultimologin"] != "Entrada" || $fechaActual != $solamenteFecha  ){

                      echo '<td><button class="btn btn-success  nidentidad="'.$value["nidentidad"].'" accion="Entrada">Entrada</button></td>';

                  }else{

                      echo '<td><button class="btn btn-danger" nidentidad="'.$value["nidentidad"].'"  accion="Salida">Salida</button></td>';

                  }


                  echo '<td>'.$value["ultimologin"].' - '.$value["ultimologinfecha"].'</td>';
                  echo '<td>
                            <div class="btn-group">
                        
                              <button class="btn btn-warning btnEditarAsitente" nidentidad="'.$value["nidentidad"].'" data-toggle="modal" data-target="#modalEditarAsistente">
                                <i class="fa fa-pencil"></i> 
                              </button>
                              
                            </div>
 
                        </td>';

                  echo '</tr>';

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
<!-- VENTANA MODAL - AGREGAR NUEVO ASISTENTE   -->
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
                                       placeholder="INGRESE EL NÚMERO DE DOCUMENTO" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LOS NOMBRES Y APELLIDOS  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="nomyape"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       placeholder="Ingrese los nombres y apellidos." required>

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
MODAL EDITAR ASISTENTE
======================================-->

<div id="modalEditarAsistente" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Asistente</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">


                        <!-- ENTRADA PARA EL NUMERO IDENTIDAD   -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i> &nbsp;&nbsp; Número de
                                    Identidad: </span>

                                <input type="text" class="form-control input-lg" name="editarNidentidad"
                                       id="editarNidentidad" value="" readonly>

                            </div>

                        </div>

                        <!-- TODO - Cambiar los íconos de los input   -->
                        <!-- ENTRADA PARA LOS NOMBRES Y APELLIDOS  -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Nombres y Apellidos:
                                </span>

                                <input type="text" class="form-control input-lg" name="editarNomyape"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarNomyape" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Cargo:</span>

                                <input type="text" class="form-control input-lg" name="editarCargo"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarCargo" value="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA DEPENDENCIA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i>&nbsp;&nbsp; Dependencia:</span>

                                <input type="text" class="form-control input-lg" name="editarDependencia"
                                       style="text-transform:uppercase;"
                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                       id="editarDependencia" value="" required>

                            </div>

                        </div>


                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar Asistente</button>

                </div>

                <?php

                 $editarAsistente = ControladorAsistentes::ctrActualizarRegistro();

                ?>

            </form>

        </div>

    </div>

</div>



