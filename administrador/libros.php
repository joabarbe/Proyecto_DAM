<!-- para no poder acceder a libros.php directamente poniendo el enlace  -->
<?php
    session_start();
    require '../config/conexion.php';
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: login.php');
    }
?>
<?php include('template/header.php'); ?>
<?php
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtAutor=(isset($_POST['txtAutor']))?$_POST['txtAutor']:"";
    $txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
    $numStock=(isset($_POST['numStock']))?$_POST['numStock']:"";
    $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    require '../config/LibrosDAO.php';
?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Libros
                        </div>

                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                            <div class = "form-group">
                            <label for="txtID">ID</label>
                            <input type="text" required readonly class="form-control" name="txtID" value="<?php echo $txtID; ?>" id="txtID" placeholder="ID">
                            </div>
                            <div class="form-group">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" required class="form-control" name="txtNombre" value="<?php echo $txtNombre; ?>" id="txtNombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                            <label for="txtAutor">Autor</label>
                            <input type="text" required class="form-control" name="txtAutor" value="<?php echo $txtAutor; ?>" id="txtAutor" placeholder="Autor">
                            </div>
                            <div class="form-group">
                            <label for="txtPrecio">Precio</label>
                            <input type="text" required class="form-control" name="txtPrecio" value="<?php echo $txtPrecio; ?>" id="txtPrecio" placeholder="Precio">
                            </div>
                            <div class="form-group">
                            <label for="numStock">Stock</label>
                            <input type="number" required class="form-control" name="numStock" value="<?php echo $numStock; ?>" id="numStock" min="1" max="20" placeholder="Stock">
                            </div>
                            <div class="form-group">
                            <label for="Imagen">Imagen</label>
                            <br>
                            <!-- mostrar imagen -->
                            <?php if($txtImagen!=""){ ?>
                                <img src="../assets/img/<?php echo $txtImagen; ?>" width="50" alt="imagen">
                            <?php } ?>
                            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
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
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mostrar los libros de la BD -->
                            <?php foreach($resultados as $resultado){ ?>
                            <tr>
                                <td><?php echo $resultado['ID']; ?></td>
                                <td><?php echo $resultado['nombre']; ?></td>
                                <td><?php echo $resultado['autor']; ?></td>
                                <td><?php echo $resultado['precio']; ?></td>
                                <td><?php echo $resultado['stock']; ?></td>
                                <td>
                                    <img src="../assets/img/<?php echo $resultado['imagen']; ?>" width="50" alt="imagen">
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $resultado['ID']; ?>" />
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
<?php include('template/footer.php'); ?>
