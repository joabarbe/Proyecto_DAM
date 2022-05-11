<?php
    // para realizar la validación de usuarios
    session_start();

    if (isset($_SESSION['usuario_id'])) {
      header('Location: ../administrador/libros.php');
    }
    require '../config/conexion.php';
  
    if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
      $sentencia = $conexion->prepare('SELECT id, usuario, contrasenia, rol FROM usuarios WHERE usuario = :usuario');
      $sentencia->bindParam(':usuario', $_POST['usuario']);
      $sentencia->execute();
      $resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
      $mensaje = '';
  
      if (is_countable($resultados) > 0 && password_verify($_POST['contrasenia'],$resultados['contrasenia'])) {
        $_SESSION["usuario_id"] = $resultados["usuario"];
        $_SESSION["rol"] = $resultados["rol"];
        header("Location: ../administrador/libros.php");
      } else {
        $mensaje = 'Error al iniciar sesión, vuelva a intentarlo';
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS PROPIO-->
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
            </br></br></br></br>
            <?php if(!empty($mensaje)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje ?>
                </div>
            <?php endif; ?>  
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                        <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Introduce tu usuario">
                        </div>
                        <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" placeholder="Introduce tu contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>  
                        </form> 
                        <a href="../index.php">Volver</a> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>