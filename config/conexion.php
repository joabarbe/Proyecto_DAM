<?php
  $host = "localhost";
  $usuario = "root";
  $contraseña = "";
  $bdnombre = "libreriacaltan";

  try {
    $conexion = new PDO("mysql:host=$host;dbname=$bdnombre", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (PDOException $e) {
    echo $e->getMessage();
  }
?>
    