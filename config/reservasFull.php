<?php
    //sentencias para obtener todos las reservas
    $querySelect=$conexion->prepare("SELECT reservas.id,libros.ID,nom_cliente,apell_cliente,email,
    telefono,direccion,cantidad,nombre,stock FROM reservas,libros WHERE libros.ID=id_libro");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
?>