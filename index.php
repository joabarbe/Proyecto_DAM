<?php include("template/header.php")?>
<?php 
    require("config/conexion.php");
    //para que se muestren los libros
    require("config/librosFull.php"); 
    //para realizar los filtros
    require("config/filtrosDAO.php");
?>
<!-- Formulario para el filtro por nombre -->
<div class="col-md-6 border border-secondary p-3">
    <form method="post" class="form-inline">
        <div class="form-group">
            <label class="mr-2">Buscar Libro</label>
            <input type="text" class="form-control formulario-input mr-2" name="palabra" value="<?php echo $palabra; ?>" placeholder="Buscar Libro">
        </div>
        <input type="submit" value="Buscar" class="btn btn-primary" name="busqueda" id="busqueda">
    </form>
</div>
<!-- Formulario para el filtro por categoria -->
<div class="col-md-6 border border-secondary p-3">
    <form action="index.php" method="POST" class="form-inline">
        <div class="form-group">
            <label for="filtro" class="mr-2">Filtrar por categoría</label>
            <select name="categoria" class="form-control formulario-input mr-2" id="filtro">
                <option selected disabled>Elija una categoría</option>
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
<?php $numLibros=0; ?>
<!-- Mostrar todos los libros -->
<?php foreach($resultados as $resultado){ ?>
<div class="col-md-3 mb-3 mt-3" >
    <div class="card border-secondary">
        <a href="reservas.php?id=<?php echo $resultado['ID']; ?>">
            <img src="assets/img/<?php echo $resultado["imagen"]; ?>" alt="imagen" height="300" class="card-img-top">
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
<?php $numLibros++;} ?> 
<?php if($numLibros==0){?>
    <div class="alert alert-danger mt-3 center" role="alert">
        <?php echo "No hay libros con ese título, vuelva a intentarlo poniendo otro título"; ?>
    </div>
<?php } ?>
<?php include("template/footer.php")?>