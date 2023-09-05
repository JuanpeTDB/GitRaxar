<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_emp_dentro_coche.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="emp_coches.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>Toyota Corolla SRE 8537</h1>

        <div class="acciones">
            <button style="margin-left: 20px" onclick="window.location.href='emp_viajes_coche.php';">
                <img src="img/historial.png" class="imgboton">
            </button>
        </div>

        <div class="cont2">
            <table class="info">
                <tr>
                    <td>
                        <h3>Marca</h3>
                        <h4>Toyota</h4>
                    </td>
                    <td>
                        <h3>Modelo</h3>
                        <h4>Corolla</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Matricula</h3>
                        <h4>SRE 8537</h4>
                    </td>
                    <td>
                        <h3>Año</h3>
                        <h4>2017</h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_coche.js"></script>
</body>
</html>