<?php
    //sentencias para obtener todos las reservas
    $querySelect=$conexion->prepare("SELECT clientes.id,libros.ID,nom_cliente,apell_cliente,email,
    telefono,direccion,cantidad,nombre,stock FROM clientes,libros WHERE libros.ID=id_libro");
    $querySelect->execute();
    $resultados=$querySelect->fetchAll(PDO::FETCH_ASSOC);
?>