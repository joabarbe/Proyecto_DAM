<?php include("template/header.php")?>
<?php 
    require("config/conexion.php"); 
    //Para realizar el filtro por categoria
    if(isset($_GET["filtro"])){
        $querySelect=$conexion->prepare("SELECT * FROM libros WHERE categoria=:categoria");
        $querySelect->bindParam(":categoria",$_GET["filtro"]);
        $querySelect->execute();
        $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $querySelect=$conexion->prepare("SELECT * FROM libros");
        $querySelect->execute();
        $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
    }
    //para la busqueda de libros por nombre
    $busqueda=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
    $palabra=(isset($_POST['palabra']))?$_POST['palabra']:"";
    if($busqueda=="Buscar"){
        $sentencia=$conexion->prepare("SELECT * FROM libros WHERE nombre LIKE :nombre");
        $sentencia->bindValue(":nombre","%$palabra%");
        $sentencia->execute();
        $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!-- Formulario para el filtro por nombre -->
<div class="col-md-6 border border-secondary p-3">
    <form method="post" class="form-inline">
        <div class="form-group">
            <label class="mr-2">Buscar Libro</label>
            <input type="text" class="form-control mr-2" name="palabra" value="<?php echo $palabra; ?>" placeholder="Buscar Libro">
        </div>
        <input type="submit" value="Buscar" class="btn btn-primary" name="busqueda" id="busqueda">
    </form>
</div>
<!-- Formulario para el filtro por categoria -->
<div class="col-md-6 border border-secondary p-3">
    <form action="index.php" method="POST" class="form-inline">
        <div class="form-group">
            <label for="filtro" class="mr-2">Filtrar por categoría</label>
            <select name="categoria" class="form-control mr-2" id="filtro">
                <option>Elija una categoría</option>
                <option value="accion">Acción</option>
                <option value="ficcion">Ciencia ficción</option>
                <option value="cuentos">Cuentos</option>
                <option value="infantil">Infantil</option>
                <option value="misterio">Misterio</option>
                <option value="romantica">Novela romántica</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Quitar filtro</button>
        </div>
    </form>
</div>
<?php foreach($resultados as $resultado){ ?>
<div class="col-md-3 mb-3 mt-3" >
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