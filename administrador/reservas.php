<?php 
    include('template/header.php'); 
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    require ("../config/ReservasDAO.php");
?>
                <div class="col-md-12">
                    <a href="exports/reservasExport.php" class="btn btn-primary mb-3">Exportar tabla a excel</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Cliente</th>
                                <th>Apellidos Cliente</th>
                                <th>e-mail</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Cantidad</th>
                                <th>Libro</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mostrar las reservas de la BD -->
                            <?php foreach($resultados as $resultado){ ?>
                            <tr>
                                <td><?php echo $resultado['id']; ?></td>
                                <td><?php echo $resultado['nom_cliente']; ?></td>
                                <td><?php echo $resultado['apell_cliente']; ?></td>
                                <td><?php echo $resultado['email']; ?></td>
                                <td><?php echo $resultado['telefono']; ?></td>
                                <td><?php echo $resultado['direccion']; ?></td>
                                <td><?php echo $resultado['cantidad']; ?></td>
                                <td><?php echo $resultado['nombre']; ?></td>
                                <td>
                                    <form method="post">
                                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $resultado['id']; ?>" />
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmarModal<?php echo $resultado['id']; ?>">Completado</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $resultado['id']; ?>">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Ventana modal del completado de la reserva -->
                            <div class="modal fade" id="confirmarModal<?php echo $resultado['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Completar reserva</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que la reserva se ha completado? Si pulsas en Sí la reserva se borrará y 
                                                se reducira el stock del libro.
                                            </p> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <form method="post">
                                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $resultado['id']; ?>" />
                                                <input type="submit" name="accion" value="Sí" class="btn btn-success"/>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ventana Modal para confirmar el borrado -->
                            <div class="modal fade" id="exampleModal<?php echo $resultado['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Borrar Reserva</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de borrar esta reserva?
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