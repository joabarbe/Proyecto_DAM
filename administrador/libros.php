<?php include('template/header.php'); ?>
<?php
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtAutor=(isset($_POST['txtAutor']))?$_POST['txtAutor']:"";
    $txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
    $numStock=(isset($_POST['numStock']))?$_POST['numStock']:"";
    $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
    $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
    $txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    require '../config/LibrosDAO.php';
?>
                <div class="col-md-4">
                <?php if(!empty($mensaje)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje ?>
                    </div>
                <?php endif; ?>
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
                            <label for="txtNombre">Título</label>
                            <input type="text" required class="form-control formulario-input" name="txtNombre" value="<?php echo $txtNombre; ?>" id="txtNombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                            <label for="txtAutor">Autor</label>
                            <input type="text" required class="form-control formulario-input" name="txtAutor" value="<?php echo $txtAutor; ?>" id="txtAutor" placeholder="Autor">
                            </div>
                            <div class="form-group">
                            <label for="txtPrecio">Precio</label>
                            <input type="text" required class="form-control formulario-input" name="txtPrecio" value="<?php echo $txtPrecio; ?>" id="txtPrecio" placeholder="Precio">
                            </div>
                            <div class="form-group">
                            <label for="numStock">Stock</label>
                            <input type="number" required class="form-control formulario-input" name="numStock" value="<?php echo $numStock; ?>" id="numStock" min="0" max="99" placeholder="Stock">
                            </div>
                            <div class="form-group">
                            <label for="txtCategoria">Categoria</label>
                            <select class="form-control formulario-input" required name="txtCategoria" id="txtCategoria">
                                <option value="">Elige una categoria</option>
                                <option value="accion" <?php if($txtCategoria=="accion"){echo "selected";} ?>>Acción</option>
                                <option value="ficcion" <?php if($txtCategoria=="ficcion"){echo "selected";} ?>>Ciencia ficción</option>
                                <option value="cuentos" <?php if($txtCategoria=="cuentos"){echo "selected";} ?>>Cuentos</option>
                                <option value="infantil" <?php if($txtCategoria=="infantil"){echo "selected";} ?>>Infantil</option>
                                <option value="misterio" <?php if($txtCategoria=="misterio"){echo "selected";} ?>>Misterio</option>
                                <option value="romantica" <?php if($txtCategoria=="romantica"){echo "selected";} ?>>Novela romántica</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea name="txtDescripcion" required class="form-control formulario-input" id="txtDescripcion" cols="38" rows="7" placeholder="Escribe la sinopsis del libro"><?php echo $txtDescripcion; ?></textarea>
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
                    <!-- Para desaparecer el boton de exportar tabla si no es administrador -->
                    <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="administrador"){ ?>
                    <a href="exports/librosExport.php" class="btn btn-success mb-3">Exportar tabla a excel</a>
                    <?php } ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th>Precio</th>
                                <th>Categoria</th>
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
                                <td><?php echo $resultado['categoria']; ?></td>
                                <td><?php echo $resultado['stock']; ?></td>
                                <td>
                                    <img src="../assets/img/<?php echo $resultado['imagen']; ?>" width="50" alt="imagen">
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $resultado['ID']; ?>" />
                                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $resultado['ID']; ?>">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Ventana modal de los libros -->
                            <div class="modal fade" id="exampleModal<?php echo $resultado['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar Libro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de borrar este libro?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <form method="post">
                                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $resultado['ID']; ?>" />
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
