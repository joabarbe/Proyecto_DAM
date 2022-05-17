</div>
    </div> <!-- Fin del Div contenedor-->
    <!-- Agregamos el JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- script de JQuery para cambiar el valor de la url para el filtro de categoria-->
    <script>
        $("#filtro").change(function(){
            window.location.href="index.php?filtro="+$(this).val();
        });
    </script>
</body>
</html>