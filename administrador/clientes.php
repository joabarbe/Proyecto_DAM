<?php include('template/header.php'); ?>
<?php 
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
    $txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
    $numTelefono=(isset($_POST['numTelefono']))?$_POST['numTelefono']:"";
    $txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
    $txtObservaciones=(isset($_POST['txtObservaciones']))?$_POST['txtObservaciones']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    require ("../config/ClientesDAO.php");
?>
                <div class="col-md-3">
                <?php if(!empty($mensaje)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje ?>
                    </div>
                <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            Clientes
                        </div>

                        <div class="card-body">
                            <form method="POST">
                            <div class = "form-group">
                            <label for="txtID">ID</label>
                            <input type="text" required readonly class="form-control" name="txtID" value="<?php echo $txtID; ?>" id="txtID" placeholder="ID">
                            </div>
                            <div class="form-group">
                            <label for="txtNombre">Nombre Cliente</label>
                            <input type="text" required class="form-control formulario-input" name="txtNombre" value="<?php echo $txtNombre; ?>" id="txtNombre" placeholder="Nombre del cliente">
                            </div>
                            <div class="form-group">
                            <label for="txtApellidos">Apellidos Cliente</label>
                            <input type="text" required class="form-control formulario-input" name="txtApellidos" value="<?php echo $txtApellidos; ?>" id="txtApellidos" placeholder="Apellidos del cliente">
                            </div>
                            <div class="form-group">
                            <label for="txtEmail">E-mail</label>
                            <input type="email" required class="form-control formulario-input" name="txtEmail" value="<?php echo $txtEmail; ?>" id="txtEmail" placeholder="e-mail">
                            </div>
                            <div class="form-group">
                            <label for="numTelefono">Teléfono</label>
                            <input type="tel" required class="form-control formulario-input" name="numTelefono" value="<?php echo $numTelefono; ?>" id="numTelefono" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                            <label for="txtDireccion">Dirección</label>
                            <input type="text" required class="form-control formulario-input" name="txtDireccion" value="<?php echo $txtDireccion; ?>" id="txtDireccion" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                            <label for="txtObservaciones">Observaciones</label>
                            <textarea name="txtObservaciones" required class="form-control formulario-input" id="txtObservaciones" cols="38" rows="7" placeholder="Observaciones"><?php echo $txtObservaciones; ?></textarea>
                            </div>
                            <button type="submit" value="Agregar" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> class="btn btn-success mb-3">Agregar</button><br>
                            <button type="submit" value="Modificar" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> class="btn btn-warning mb-3">Modificar</button><br>
                            <button type="submit" value="Cancelar" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> class="btn btn-danger">Cancelar</button>
                            </form>
                        </div>
                    </div>   
                </div>

                <div class="col-md-9">
                    <!-- Para desaparecer el boton de exportar tabla si no es administrador -->
                    <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="administrador"){ ?>
                    <a href="exports/clientesExport.php" class="btn btn-success mb-3">Exportar tabla a excel</a>
                    <?php } ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mostrar los usuarios de la BD -->
                            <?php foreach($resultados as $resultado){ ?>
                            <tr>
                                <td><?php echo $resultado['id']; ?></td>
                                <td><?php echo $resultado['nombre_cliente']; ?></td>
                                <td><?php echo $resultado['apellidos_cliente']; ?></td>
                                <td class="email-text"><a href="mailto:<?php echo $resultado['correo']; ?>"><?php echo $resultado['correo']; ?></a></td>
                                <td><?php echo $resultado['telef']; ?></td>
                                <td><?php echo $resultado['direcc']; ?></td>
                                <td><?php echo $resultado['observaciones']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $resultado['id']; ?>" />
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $resultado['id']; ?>">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Ventana Modal para confirmar el borrado -->
                            <div class="modal fade" id="exampleModal<?php echo $resultado['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de borrar a este cliente?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <form method="post">
                                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $resultado['id']; ?>" />
                                                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
<?php include('template/footer.php'); ?>