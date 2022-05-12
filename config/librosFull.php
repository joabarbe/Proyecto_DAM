<?php
    //Sentencia para obtener los libros
    $querySelect=$conexion->prepare("SELECT * FROM libros");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
?>