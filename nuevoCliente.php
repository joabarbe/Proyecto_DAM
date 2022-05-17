<?php include("template/header.php")?>
<?php 
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
    $txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
    $numTelefono=(isset($_POST['numTelefono']))?$_POST['numTelefono']:"";
    $txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
    $txtObservaciones=(isset($_POST['txtObservaciones']))?$_POST['txtObservaciones']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    require ("config/insertarClienteDAO.php");
?>
<div class="col-md-6">
<?php if(!empty($mensaje)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $mensaje ?>
    </div>
<?php endif; ?>
    <div class="card">
        <div class="card-header">
            Nuevo Cliente
        </div>

        <div class="card-body">
            <form method="POST">
            <div class="form-group">
            <label for="txtNombre">Nombre Cliente</label>
            <input type="text" required class="form-control formulario-input" name="txtNombre" value="<?php echo $txtNombre; ?>" id="txtNombre" placeholder="Escribe tu nombre">
            </div>
            <div class="form-group">
            <label for="txtApellidos">Apellidos Cliente</label>
            <input type="text" required class="form-control formulario-input" name="txtApellidos" value="<?php echo $txtApellidos; ?>" id="txtApellidos" placeholder="Escribe tus apellidos">
            </div>
            <div class="form-group">
            <label for="txtEmail">E-mail</label>
            <input type="email" required class="form-control formulario-input" name="txtEmail" value="<?php echo $txtEmail; ?>" id="txtEmail" placeholder="Introduce tu e-mail">
            </div>
            <div class="form-group">
            <label for="numTelefono">Teléfono</label>
            <input type="tel" required class="form-control formulario-input" name="numTelefono" value="<?php echo $numTelefono; ?>" id="numTelefono" placeholder="Escribe tu número de teléfono">
            </div>
            <div class="form-group">
            <label for="txtDireccion">Dirección</label>
            <input type="text" required class="form-control formulario-input" name="txtDireccion" value="<?php echo $txtDireccion; ?>" id="txtDireccion" placeholder="Escribe tu dirección">
            </div>
            <div class="form-group">
            <label for="txtObservaciones">Observaciones</label>
            <textarea name="txtObservaciones" class="form-control formulario-input" value="<?php echo $txtObservaciones; ?>" id="txtObservaciones" cols="38" rows="7" placeholder="¿Tienes alguna duda? Escríbelo aquí"></textarea>
            </div>
            <button type="submit" value="Agregar" name="accion" class="btn btn-success">Apúntate</button>
            </form>
        </div>
    </div>   
</div>

<div class="col-md-6">
    <h4 class="content-center">¿Quieres ser cliente de Librería Caltan?</h4>
    <p>Pues no esperes más y apúntate en el formulario de la izquierda para estar enterado de las 
        ultimas noticias sobre nosotros y para estar a la última en el mundo literario.
    </p>
    <div class="mt-5 content-center">
        <img src="assets/img/clientes.jpg"  alt="clientes" width="500">
    </div>
   
</div>

<?php include("template/footer.php")?>