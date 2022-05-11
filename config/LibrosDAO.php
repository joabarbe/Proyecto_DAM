<?php
    require 'conexion.php';
    switch($accion){
        case "Agregar": //insertar libro
            $sentencia=$conexion->prepare("INSERT INTO libros(nombre, autor, precio, stock, imagen, descripcion) 
                VALUES(:nombre, :autor, :precio, :stock, :imagen, :descripcion)");
            $sentencia->bindParam(":nombre",$txtNombre);
            $sentencia->bindParam(":autor",$txtAutor);
            $sentencia->bindParam(":precio",$txtPrecio);
            $sentencia->bindParam(":stock",$numStock);
            //guardar imágenes en la carpeta img
            $fecha=new DateTime();
            if($txtImagen!=""){
                $nombreArchivo=$fecha->getTimestamp()."_".$_FILES['txtImagen']['name'];
            }else{
                $nombreArchivo="noImagen.jpg";
            }
            $tmpImagen=$_FILES['txtImagen']['tmp_name'];
            if($tmpImagen!=""){
                move_uploaded_file($tmpImagen,"../assets/img/".$nombreArchivo);
            }
            $sentencia->bindParam(":imagen",$nombreArchivo);
            $sentencia->bindParam(":descripcion",$txtDescripcion);
            $sentencia->execute();
            header("Location:libros.php");
            break;
        case "Modificar":
            $sentencia=$conexion->prepare("UPDATE libros SET nombre=:nombre, autor=:autor,
            precio=:precio, stock=:stock, descripcion=:descripcion WHERE ID=:id");
            $sentencia->bindParam(":nombre",$txtNombre);
            $sentencia->bindParam(":autor",$txtAutor);
            $sentencia->bindParam(":precio",$txtPrecio);
            $sentencia->bindParam(":stock",$numStock);
            $sentencia->bindParam(":descripcion",$txtDescripcion);
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            header("Location:libros.php");
            //modificar imagen
            //establecer nombre de la imagen nueva
            if($txtImagen!=""){
                $fecha=new DateTime();
                if($txtImagen!=""){
                    $nombreArchivo=$fecha->getTimestamp()."_".$_FILES['txtImagen']['name'];
                }else{
                    $nombreArchivo="noImagen.jpg";
                }
                $tmpImagen=$_FILES['txtImagen']['tmp_name'];
                //meter la imagen en la carpeta de imagenes
                move_uploaded_file($tmpImagen,"../assets/img/".$nombreArchivo);
                //borrar imagen anterior
                $sentencia=$conexion->prepare("SELECT imagen FROM libros WHERE ID=:id");
                $sentencia->bindParam(":id",$txtID);
                $sentencia->execute();
                $datosLibro=$sentencia->fetch(PDO::FETCH_LAZY);
                if(isset($datosLibro["imagen"]) && ($datosLibro["imagen"]!="noImagen.jpg") ){
                    if(file_exists("../assets/img/".$datosLibro["imagen"])){
                        unlink("../assets/img/".$datosLibro["imagen"]); //borra imagen
                    }
                }
                $sentencia=$conexion->prepare("UPDATE libros SET imagen=:imagen WHERE ID=:id");
                $sentencia->bindParam(":imagen",$nombreArchivo);
                $sentencia->bindParam(":id",$txtID);
                $sentencia->execute();
                header("Location:libros.php");
            }
            break;
        case "Cancelar":
            header("Location:libros.php");
            break;
        case "Seleccionar":
            $sentencia=$conexion->prepare("SELECT * FROM libros WHERE ID=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            $datosLibro=$sentencia->fetch(PDO::FETCH_LAZY);
            $txtNombre=$datosLibro['nombre'];
            $txtAutor=$datosLibro['autor'];
            $txtPrecio=$datosLibro['precio'];
            $numStock=$datosLibro['stock'];
            $txtDescripcion=$datosLibro['descripcion'];
            $txtImagen=$datosLibro['imagen'];
            break;
        case "Borrar":
            //borrar imagen
            $sentencia=$conexion->prepare("SELECT imagen FROM libros WHERE ID=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            $datosLibro=$sentencia->fetch(PDO::FETCH_LAZY);
            if(isset($datosLibro["imagen"]) && ($datosLibro["imagen"]!="noImagen.jpg") ){
                if(file_exists("../assets/img/".$datosLibro["imagen"])){
                    unlink("../assets/img/".$datosLibro["imagen"]); //borra imagen
                }
            }

            $sentencia=$conexion->prepare("DELETE FROM libros WHERE ID=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            header("Location:libros.php");
            break;
    }
    //Sentencia para obtener los libros
    $querySelect=$conexion->prepare("SELECT * FROM libros");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);

?>