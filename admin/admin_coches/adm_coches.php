<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_coches.css">
</head>
<body>
<header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="../../admin.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>COCHES</h1>

        <a class="agregar"  onclick="window.location.href='agregar_coche.php';">
            <img src="img/agregar.png" class="boton_agregar"><img src="img/coche.png" class="boton_agregar">
        </a>

        <div class="box">
            <table id="container_info"  >
             <!--   <tr><td>HOLA</td></tr>  -->
            </table>
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
</body>

    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script src="js/script_funciones.js"></script>
    <script src="js/script_eliminar_coche.js"></script>
    
</html>