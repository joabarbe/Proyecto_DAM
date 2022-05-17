<?php
    //Para realizar el filtro por categoria
    if(isset($_GET["filtro"])){
        $querySelect=$conexion->prepare("SELECT * FROM libros WHERE categoria=:categoria");
        $querySelect->bindParam(":categoria",$_GET["filtro"]);
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