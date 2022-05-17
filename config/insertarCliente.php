<?php
//Agregar un nuevo cliente 
$insertarCliente=$conexion->prepare("INSERT INTO cliente(nombre_cliente, apellidos_cliente,
correo, telef, direcc) VALUES (:nombre_cliente, :apellidos_cliente,
:correo, :telef, :direcc)");
$insertarCliente->bindParam(":nombre_cliente",$txtNombre);
$insertarCliente->bindParam(":apellidos_cliente",$txtApellidos);
$insertarCliente->bindParam(":correo",$txtEmail);
$insertarCliente->bindParam(":telef",$numTelefono);
$insertarCliente->bindParam(":direcc",$txtDireccion);
$sentencia->execute();
?>