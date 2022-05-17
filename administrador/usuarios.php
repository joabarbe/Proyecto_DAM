<?php include('template/header.php'); ?>
<?php 
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtUsuario=(isset($_POST['txtUsuario']))?$_POST['txtUsuario']:"";
    $txtContrasenia=(isset($_POST['txtContrasenia']))?$_POST['txtContrasenia']:"";
    $txtRol=(isset($_POST['txtRol']))?$_POST['txtRol']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    require ("../config/UsuariosDAO.php");
?>
                <div class="col-md-4">
                <?php if(!empty($mensaje)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje ?>
                    </div>
                <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            Usuarios
                        </div>

                        <div class="card-body">
                            <form method="POST">
                            <div class = "form-group">
                            <label for="txtID">ID</label>
                            <input type="text" required readonly class="form-control" name="txtID" value="<?php echo $txtID; ?>" id="txtID" placeholder="ID">
                            </div>
                            <div class="form-group">
                            <label for="txtNombre">Usuario</label>
                            <input type="text" required class="form-control formulario-input" name="txtUsuario" value="<?php echo $txtUsuario; ?>" id="txtUsuario" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                            <label for="txtAutor">Contraseña</label>
                            <input type="password" required class="form-control formulario-input" name="txtContrasenia" value="<?php echo $txtContrasenia; ?>" id="txtContrasenia" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                            <label for="txtRol">Rol</label>
                            <select class="form-control formulario-input" required name="txtRol" id="txtRol">
                                <option value="">Elige un rol</option>
                                <option value="administrador" <?php if($txtRol=="administrador"){echo "selected";} ?>>Administrador</option>
                                <option value="empleado" <?php if($txtRol=="empleado"){echo "selected";} ?>>Empleado</option>
                            </select>
                            </div>
                            <div class="btn-group" role="group" aria-label="">
                                <button type="submit" value="Agregar" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> class="btn btn-success">Agregar</button>
                                <button type="submit" value="Modificar" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> class="btn btn-warning">Modificar</button>
                                <button type="submit" value="Cancelar" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> class="btn btn-danger">Cancelar</button>
                            </div>
                            </form>
                        </div>
                    </div>   
                </div>

                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mostrar los usuarios de la BD -->
                            <?php foreach($resultados as $resultado){ ?>
                            <tr>
                                <td><?php echo $resultado['id']; ?></td>
                                <td><?php echo $resultado['usuario']; ?></td>
                                <td><?php echo $resultado['rol']; ?></td>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de borrar a este usuario?
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