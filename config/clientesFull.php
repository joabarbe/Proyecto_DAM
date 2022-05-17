<?php
    //Sentencia para obtener los clientes
    $querySelect=$conexion->prepare("SELECT * FROM clientes");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
?>