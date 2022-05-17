<?php
    require("conexion.php");
    require("clientesFull.php");
    $mensaje="";
    $contador=0;
    switch($accion){
        case "Agregar":
            foreach($resultados as $resultado){
                if($txtEmail==$resultado["correo"] || $numTelefono==$resultado["telef"]){
                    $id_cliente=$resultado["id"];
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
                header("Location:clientes.php");
            }else{
                $mensaje="Este cliente ya existe con el ID ".$id_cliente;
            }
            break;
        case "Modificar":
            foreach($resultados as $resultado){
                if(($txtEmail==$resultado["correo"] || $numTelefono==$resultado["telef"]) && $txtID!=$resultado["id"]){
                    $id_cliente=$resultado["id"];
                    $contador++;
                }
            }
            if($contador==0){
                $sentencia=$conexion->prepare("UPDATE clientes SET nombre_cliente=:nombre_cliente, apellidos_cliente=:apellidos_cliente,
                correo=:correo, telef=:telef, direcc=:direcc, observaciones=:observaciones WHERE id=:id");
                $sentencia->bindParam(":nombre_cliente",$txtNombre);
                $sentencia->bindParam(":apellidos_cliente",$txtApellidos);
                $sentencia->bindParam(":correo",$txtEmail);
                $sentencia->bindParam(":telef",$numTelefono);
                $sentencia->bindParam(":direcc",$txtDireccion);
                $sentencia->bindParam(":observaciones",$txtObservaciones);
                $sentencia->bindParam(":id",$txtID);
                $sentencia->execute();
                header("Location:clientes.php");
            }else{
                $mensaje="Este cliente ya existe con el ID ".$id_cliente;
            }
            break;
        case "Cancelar":
            header("Location:clientes.php");
            break;
        case "Seleccionar":
            $sentencia=$conexion->prepare("SELECT * FROM clientes WHERE id=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            $datosCliente=$sentencia->fetch(PDO::FETCH_LAZY);
            $txtNombre=$datosCliente['nombre_cliente'];
            $txtApellidos=$datosCliente['apellidos_cliente'];
            $txtEmail=$datosCliente['correo'];
            $numTelefono=$datosCliente['telef'];
            $txtDireccion=$datosCliente['direcc'];
            $txtObservaciones=$datosCliente['observaciones'];
            break;
        case "Borrar":
            $sentencia=$conexion->prepare("DELETE FROM clientes WHERE id=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            header("Location:clientes.php");
            break;
    }
?>