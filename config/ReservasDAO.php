<?php
    require("conexion.php");
    require("reservasFull.php");
    

    if($accion=="Borrar"){
            $sentencia=$conexion->prepare("DELETE FROM clientes WHERE id=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            header("Location:reservas.php");
    }

    if($accion=="Sí"){ 
        //seleccionar todos los datos de las 2 tablas por su id de cliente
        $query=$conexion->prepare("SELECT * FROM libros, clientes WHERE libros.ID=clientes.id_libro AND clientes.id=:id");
        $query->bindParam(":id",$txtID);
        $query->execute();
        $datos=$query->fetch(PDO::FETCH_ASSOC);
        //actualiza el stock del libro
        $sentencia=$conexion->prepare("UPDATE libros,clientes SET stock=:stock WHERE libros.ID=id_libro AND libros.ID=:ID AND clientes.id=:id");
        $stockFinal=$datos["stock"]-$datos["cantidad"];
        $sentencia->bindParam(":stock",$stockFinal);
        $sentencia->bindParam(":ID",$datos["ID"]);
        $sentencia->bindParam(":id",$datos["id"]);
        $sentencia->execute();
        //borra la reserva
        $borrar=$conexion->prepare("DELETE FROM clientes WHERE id=:id");
        $borrar->bindParam(":id",$txtID);
        $borrar->execute();
        header("Location:reservas.php");
    }
?>