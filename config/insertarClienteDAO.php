<?php
    /* archivo para insertar un cliente desde la pagina nuevo cliente 
       donde el propio cliente podra agregarse como cliente*/
    require("conexion.php");
    require("clientesFull.php");
    $mensaje="";
    $contador=0;
    if($accion=="Agregar"){
        foreach($resultados as $resultado){
            if($txtEmail==$resultado["correo"] || $numTelefono==$resultado["telef"]){
                $contador++;
            }
        }
        if($contador==0){
            $sentencia=$conexion->prepare("INSERT INTO clientes(nombre_cliente, apellidos_cliente, correo, telef, direcc, observaciones) 
                VALUES(:nombre_cliente, :apellidos_cliente, :correo, :telef, :direcc, :observaciones)");
            $sentencia->bindParam(":nombre_cliente",$txtNombre);
            $sentencia->bindParam(":apellidos_cliente",$txtApellidos);
            $sentencia->bindParam(":correo",$txtEmail);
            $sentencia->bindParam(":telef",$numTelefono);
            $sentencia->bindParam(":direcc",$txtDireccion);
            $sentencia->bindParam(":observaciones",$txtObservaciones);
            $sentencia->execute();
            header("Location:nuevoCliente.php");
        }else{
            $mensaje="Este cliente ya existe. Prueba poniendo otro correo o número de teléfono.";
        }
    }
?>