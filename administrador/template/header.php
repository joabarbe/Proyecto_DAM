<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Libros</title>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS PROPIO-->
    <link rel="stylesheet" href="../../assets/css/style.css"/>
</head>
<body>
    <!-- para no poder acceder directamente poniendo el enlace  -->
    <?php
        session_start();
        require '../config/conexion.php';
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: login.php');
        }
    ?>
    <?php $url="http://".$_SERVER['HTTP_HOST']."/Proyecto_Final_DAM"; ?>
    <nav class="navbar navbar-expand navbar-light" style="background-color: #e3f2fd">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="libros.php">Libros <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"]!="administrador"){echo("disabled");} ?>" href="usuarios.php">Usuarios</a>
            <a class="nav-item nav-link" href="reservas.php">Reservas</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ir a la web</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/config/cerrar_sesion.php"><?php echo $_SESSION["usuario_id"]; ?>(Cerrar sesión)</a>
        </div>
    </nav>
    <div class="container">
</br>
        <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"]!="administrador"){ ?>
            <div class="alert alert-warning" role="alert">
                <?php echo "Al no ser administrador el menu Usuarios esta deshabilitado."; ?>
            </div>
        <?php } ?>
            <div class="row">
