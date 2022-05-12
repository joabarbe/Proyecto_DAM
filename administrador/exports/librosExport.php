<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de libros</title>
    <style>
        td, th{
            border: solid 1px;
        }
    </style>
</head>
<body>
<?php
    require("../../config/conexion.php");
    require("../../config/librosFull.php");
    $salida="";
    $salida.="<table>";
    $salida.="<thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Autor</th>
        <th>Precio</th>
        <th>Categoria</th>
        <th>Stock</th>
    </tr>
</thead>";
    foreach($resultados as $resultado){
        $salida.="<tr>
            <td>".$resultado['ID']."</td>
            <td>".$resultado['nombre']."</td>
            <td>".$resultado['autor']."</td>
            <td>".$resultado['precio']."</td>
            <td>".$resultado['categoria']."</td>
            <td>".$resultado['stock']."</td>
            </tr>";
    }
    $salida.="</table>";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=libros.xls");
    echo $salida;
?>    
</body>
</html>
