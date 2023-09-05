<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_dentro_viajes.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="adm_ver_viajes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>RODRIGO AGUIRRE</h1>

        <div class="acciones">
            <button id="btneliminar">
                <img src="img/eliminar.png" class="imgboton">
            </button>
            <button style="margin-left: 40px" onclick="window.location.href='adm_editar_viaje.php';">
                <img src="img/editar.png" class="imgboton">
            </button>
        </div>

        
        <table class="info">
            <tr>
                <td>
                    <h3>Origen</h3>
                    <h4>Maldonado 2292</h4>
                </td>
                <td>
                    <h3>Destino</h3>
                    <h4>Aeropuerto de Carrasco</h4>
                </td>
                <td>
                    <h3>Cliente</h3>
                    <h4>Rodrgio Aguirre</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Hora Inicio</h3>
                    <h4>12:17</h4>
                </td>
                <td>
                    <h3>Fecha</h3>
                    <h4>27/7</h4>
                </td>
                <td>
                    <h3>Importe</h3>
                    <h4>$537</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Comentario</h3>
                    <h4>Va con 2 valijas</h4>
                </td>
                <td>
                    <h3>Forma de pago</h3>
                    <h4>Efectivo</h4>
                </td>
                <td>
                    <h3>Chofer</h3>
                    <h4>Nicolas Borges</h4>
                </td>
            </tr>
        </table>

        
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_viaje.js"></script>
</body>
</html>