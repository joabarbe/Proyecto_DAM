<?php
    //para no poder acceder a libros.php
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
                            Libros
                        </div>

                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                            <div class = "form-group">
                            <label for="txtID">ID</label>
                            <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                            </div>
                            <div class="form-group">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                            <label for="txtAutor">Autor</label>
                            <input type="text" class="form-control" name="txtAutor" id="txtAutor" placeholder="Autor">
                            </div>
                            <div class="form-group">
                            <label for="txtPrecio">Precio</label>
                            <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Precio">
                            </div>
                            <div class="form-group">
                            <label for="numStock">Stock</label>
                            <input type="number" class="form-control" name="numStock" id="numStock" min="1" max="20" placeholder="Stock">
                            </div>
                            <div class="form-group">
                            <label for="Imagen">Imagen</label>
                            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
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
                    <table class="table">
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
                            <tr>
                                <td>1</td>
                                <td>Harry Potter y la Pidera Filosofal</td>
                                <td>J.K. Rowling</td>
                                <td>20,50</td>
                                <td>18</td>
                                <td>imagen.jpg</td>
                                <td>Seleccionar | Borrar</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
<?php include('template/footer.php'); ?>
