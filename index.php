<?php include("template/header.php")?>
<?php 
    require("config/conexion.php"); 
    $querySelect=$conexion->prepare("SELECT * FROM libros");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach($resultados as $resultado){ ?>
<div class="col-md-3">
    <div class="card">
        <img src="assets/img/<?php echo $resultado["imagen"]; ?>" alt="imagen" height="200" class="card-img-top">
    </div>
    <div class="card-body">
        <h4 class="card-title"><?php echo $resultado["nombre"]; ?></h4>
        <p><?php echo $resultado["autor"]; ?></p>
        <a href="#" class="btn btn-primary" role="button">Reserva</a>
    </div>
</div>
<?php } ?>           
<?php include("template/footer.php")?>