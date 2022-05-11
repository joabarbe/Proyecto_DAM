<?php
    require("conexion.php");
    //sentencia para obtener todos las reservas
    $querySelect=$conexion->prepare("SELECT * FROM clientes");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);

    if($accion=="Borrar"){
        $sentencia=$conexion->prepare("DELETE FROM clientes WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        header("Location:reservas.php");
    }
?>