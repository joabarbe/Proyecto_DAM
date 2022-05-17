<?php 
    include("template/header.php");
    require("config/conexion.php");
    $sentencia=$conexion->prepare("SELECT * FROM libros WHERE ID=:id");
    //Cambiar la la variable txtID
    $sentencia->bindParam(":id",$_GET["id"]);
    $sentencia->execute();
    $datosLibro=$sentencia->fetch(PDO::FETCH_LAZY);
    //establecemos valores para el formulario

    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
    $txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
    $numTelefono=(isset($_POST['numTelefono']))?$_POST['numTelefono']:"";
    $txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
    $numCantidad=(isset($_POST['numCantidad']))?$_POST['numCantidad']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    require("config/reservasClientesDAO.php"); 
?>
                <div class="col-md-4">
                    <img src="assets/img/<?php echo $datosLibro["imagen"]; ?>" width="300" alt="imagen">
                </div>
                <div class="col-md-8 mt-5">
                <h2 class="mb-3"><?php echo $datosLibro["nombre"]; ?></h2>
                    <p class="precio"><?php echo $datosLibro["precio"]; ?>€</p>
                    <p class="descripcion"><?php echo $datosLibro["descripcion"]; ?></p>
                    <p>En stock: <?php echo $datosLibro["stock"]; ?></p>
                    <?php if($datosLibro["stock"]>0){ ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">¡Reserva ya!</button>
                    <?php }else{ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "Actualmente no hay stock del libro ".$datosLibro["nombre"].". 
                                Vuelva a intentarlo en otro momento."; ?>
                        </div>
                    <?php } ?>
                    <!-- Ventana modal para reservar los libros -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Reservar libro: <?php echo $datosLibro["nombre"]; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Libro</label>
                                            <input type="text" readonly class="form-control" id="" name="" value="<?php echo $datosLibro["nombre"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control formulario-input" id="txtNombre" name="txtNombre" placeholder="Introduce tu nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control formulario-input" id="txtApellidos" name="txtApellidos" placeholder="Introduce tus apellidos">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control formulario-input" id="txtEmail" name="txtEmail" placeholder="Introduce tu correo electrónico">
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="tel" class="form-control formulario-input" id="numTelefono" name="numTelefono" placeholder="Introduce tu teléfono">
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input type="text" class="form-control formulario-input" id="txtDireccion" name="txtDireccion" placeholder="Introduce tu dirección">
                                        </div>
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input type="number" class="form-control formulario-input" id="numCantidad" name="numCantidad" min="1" max="<?php echo $datosLibro["stock"]; ?>" placeholder="Cantidad">
                                        </div>
                                        <p>Precio: <?php echo $datosLibro["precio"]; ?>€ por unidad.</p>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" name="accion" value="Agregar" class="btn btn-success">Reservar</button>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include("template/footer.php");?>