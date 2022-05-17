<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
    <style>
        td, th{
            border: solid 1px;
            background-color: beige;
        }
    </style>
</head>
<body>
<?php
    require("../../config/conexion.php");
    require("../../config/clientesFull.php");
    $salida="";
    $salida.="<table>";
    $salida.="<thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Observaciones</th>
    </tr>
</thead>";
    foreach($resultados as $resultado){
        $salida.="<tr>
            <td>".$resultado['id']."</td>
            <td>".$resultado['nombre_cliente']."</td>
            <td>".$resultado['apellidos_cliente']."</td>
            <td>".$resultado['correo']."</td>
            <td>".$resultado['telef']."</td>
            <td>".$resultado['direcc']."</td>
            <td>".$resultado['observaciones']."</td>
            </tr>";
    }
    $salida.="</table>";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=clientes.xls");
    echo $salida;
?>    
</body>
</html>