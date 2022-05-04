<?php
    //para no poder acceder a usuarios.php
    // directamente poniendo el enlace 
    session_start();
    require '../config/conexion.php';
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: login.php');
    }
?>
<?php include('template/header.php'); ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Usuarios
                        </div>

                        <div class="card-body">
                            <form method="POST">
                            <div class = "form-group">
                            <label for="txtID">ID</label>
                            <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                            </div>
                            <div class="form-group">
                            <label for="txtNombre">Usuario</label>
                            <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                            <label for="txtAutor">Contraseña</label>
                            <input type="password" class="form-control" name="txtContrasenia" id="txtContrasenia" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                            <label for="txtPrecio">Rol</label>
                            <input type="text" class="form-control" name="txtRol" id="txtRol" placeholder="Rol">
                            </div>
                            <div class="btn-group" role="group" aria-label="">
                                <button type="button" class="btn btn-success">Agregar</button>
                                <button type="button" class="btn btn-warning">Modificar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                            </form>
                        </div>
                    </div>   
                </div>

                <div class="col-md-8">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3</td>
                                <td>admin</td>
                                <td>1234</td>
                                <td>administrador</td>
                                <td>
                                    <form method="post">
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                        </form></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
<?php include('template/footer.php'); ?>