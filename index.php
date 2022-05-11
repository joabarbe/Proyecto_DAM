<?php include("template/header.php")?>
<?php 
    require("config/conexion.php"); 
    $querySelect=$conexion->prepare("SELECT * FROM libros");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach($resultados as $resultado){ ?>
<div class="col-md-3 mb-3" >
    <div class="card border-secondary">
        <a href="reservas.php?id=<?php echo $resultado['ID']; ?>">
            <img src="assets/img/<?php echo $resultado["imagen"]; ?>" alt="imagen" height="200" class="card-img-top">
        </a>
        <div class="card-body">
            <a href="reservas.php?id=<?php echo $resultado['ID']; ?>">
                <h5 class="card-title"><?php echo $resultado["nombre"]; ?></h5>
            </a>
            <p><?php echo $resultado["autor"]; ?></p>
            <p class="precio"><?php echo $resultado["precio"]; ?>€</p>
            <a href="reservas.php?id=<?php echo $resultado['ID']; ?>" class="btn btn-primary" role="button">Reserva</a>
        </div>
    </div>
</div>
<?php } ?>           
<?php include("template/footer.php")?>