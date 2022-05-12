<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de reservas</title>
    <style>
        td, th{
            border: solid 1px;
        }
    </style>
</head>
<body>
<?php
    require("../../config/conexion.php");
    require("../../config/reservasFull.php");
    $salida="";
    $salida.="<table>";
    $salida.="<thead>
    <tr>
        <th>ID</th>
        <th>Nombre Cliente</th>
        <th>Apellidos Cliente</th>
        <th>e-mail</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Cantidad</th>
        <th>Libro</th>
    </tr>
</thead>";
    foreach($resultados as $resultado){
        $salida.="<tr>
            <td>".$resultado['id']."</td>
            <td>".$resultado['nom_cliente']."</td>
            <td>".$resultado['apell_cliente']."</td>
            <td>".$resultado['email']."</td>
            <td>".$resultado['telefono']."</td>
            <td>".$resultado['direccion']."</td>
            <td>".$resultado['cantidad']."</td>
            <td>".$resultado['nombre']."</td>
            </tr>";
    }
    $salida.="</table>";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=reservas.xls");
    echo $salida;
?>    
</body>
</html>