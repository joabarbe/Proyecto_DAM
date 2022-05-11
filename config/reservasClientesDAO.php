<?php
    require("conexion.php");
    if($accion=="Agregar"){
        $sentencia=$conexion->prepare("INSERT INTO clientes(nom_cliente,apell_cliente,email,telefono,direccion,cantidad,libro)
            VALUES(:nom_cliente,:apell_cliente,:email,:telefono,:direccion,:cantidad,:libro)");
        $sentencia->bindParam(":nom_cliente",$txtNombre);
        $sentencia->bindParam(":apell_cliente",$txtApellidos);
        $sentencia->bindParam(":email",$txtEmail);
        $sentencia->bindParam(":telefono",$numTelefono);
        $sentencia->bindParam(":direccion",$txtDireccion);
        $sentencia->bindParam(":cantidad",$numCantidad);
        $sentencia->bindParam(":libro",$datosLibro["nombre"]);
        $sentencia->execute();
        header("Location:reservas.php?id=".$datosLibro["ID"]);
    }
?>