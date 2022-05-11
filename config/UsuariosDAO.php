<?php
    require("conexion.php");
    switch($accion){
        case "Agregar":
            $sentencia=$conexion->prepare("INSERT INTO usuarios(usuario, contrasenia, rol) 
                VALUES(:usuario, :contrasenia, :rol)");
            $sentencia->bindParam(":usuario",$txtUsuario);
            $pass=password_hash($txtContrasenia, PASSWORD_BCRYPT);
            $txtContrasenia=$pass;
            $sentencia->bindParam(":contrasenia",$txtContrasenia);
            $sentencia->bindParam(":rol",$txtRol);
            $sentencia->execute();
            header("Location:usuarios.php");
            break;
        case "Modificar":
            $sentencia=$conexion->prepare("UPDATE usuarios SET usuario=:usuario, contrasenia=:contrasenia,
            rol=:rol WHERE id=:id");
            $sentencia->bindParam(":usuario",$txtUsuario);
            $pass=password_hash($txtContrasenia, PASSWORD_BCRYPT);
            $txtContrasenia=$pass;
            $sentencia->bindParam(":contrasenia",$txtContrasenia);
            $sentencia->bindParam(":rol",$txtRol);
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            header("Location:usuarios.php");
            break;
        case "Cancelar":
            header("Location:usuarios.php");
            break;
        case "Seleccionar":
            $sentencia=$conexion->prepare("SELECT * FROM usuarios WHERE id=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            $datosUsuario=$sentencia->fetch(PDO::FETCH_LAZY);
            $txtUsuario=$datosUsuario['usuario'];
            $txtContrasenia=$datosUsuario['contrasenia'];
            $txtRol=$datosUsuario['rol'];
            break;
        case "Borrar":
            $sentencia=$conexion->prepare("DELETE FROM usuarios WHERE id=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            header("Location:usuarios.php");
            break;
    }
    //sentencia para obtener todos los usuarios
    $querySelect=$conexion->prepare("SELECT * FROM usuarios");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
?>