<?php
    require 'conexion.php';
    require("librosFull.php");
    $mensaje="";
    $contador=0;
    switch($accion){
        case "Agregar": //insertar libro
            foreach($resultados as $resultado){
                if($txtNombre==$resultado["nombre"]){
                    $id_libro=$resultado["ID"];
                    $contador++;
                }
            }
            if($contador==0){
                $sentencia=$conexion->prepare("INSERT INTO libros(nombre, autor, precio, stock, imagen, descripcion, categoria) 
                VALUES(:nombre, :autor, :precio, :stock, :imagen, :descripcion,:categoria)");
                $sentencia->bindParam(":nombre",$txtNombre);
                $sentencia->bindParam(":autor",$txtAutor);
                $sentencia->bindParam(":precio",$txtPrecio);
                $sentencia->bindParam(":stock",$numStock);
                //darle un nombre al archivo de la imagen
                $fecha=new DateTime();
                if($txtImagen!=""){
                    $nombreArchivo=$fecha->getTimestamp()."_".$_FILES['txtImagen']['name'];
                }else{
                    $nombreArchivo="noImagen.jpg";
                }
                //nombre temporal de la imagen donde se guarda la imagen 
                $tmpImagen=$_FILES['txtImagen']['tmp_name'];
                if($tmpImagen!=""){
                    //mover la imagen a una ubicacion
                    move_uploaded_file($tmpImagen,"../assets/img/".$nombreArchivo);
                }
                $sentencia->bindParam(":imagen",$nombreArchivo);
                $sentencia->bindParam(":descripcion",$txtDescripcion);
                $sentencia->bindParam(":categoria",$txtCategoria);
                $sentencia->execute();
                header("Location:libros.php");
            }else{
                $mensaje="El título del libro ya existe con el ID ".$id_libro;
            }
            
            break;
        case "Modificar":
            foreach($resultados as $resultado){
                if($txtNombre==$resultado["nombre"] && $txtID!=$resultado["ID"]){
                    $id_libro=$resultado["ID"];
                    $contador++;
                }
            }
            if($contador==0){
                $sentencia=$conexion->prepare("UPDATE libros SET nombre=:nombre, autor=:autor,
                precio=:precio, stock=:stock, descripcion=:descripcion, categoria=:categoria WHERE ID=:id");
                $sentencia->bindParam(":nombre",$txtNombre);
                $sentencia->bindParam(":autor",$txtAutor);
                $sentencia->bindParam(":precio",$txtPrecio);
                $sentencia->bindParam(":stock",$numStock);
                $sentencia->bindParam(":descripcion",$txtDescripcion);
                $sentencia->bindParam(":categoria",$txtCategoria);
                $sentencia->bindParam(":id",$txtID);
                $sentencia->execute();
                header("Location:libros.php");
            }else{
                $mensaje="El título del libro ya existe con el ID ".$id_libro;
            }
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
                        unlink("../assets/img/".$datosLibro["imagen"]); //borra imagen anterior
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
            $txtCategoria=$datosLibro['categoria'];
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

?>