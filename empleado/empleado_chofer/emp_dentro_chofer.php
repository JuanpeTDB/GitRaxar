<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_emp_dentro_choferes.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="emp_choferes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>JUAN PEREZ</h1>

        <div class="acciones">
            
        </div>

        
        <table class="info">
            <tr>
                <td><h3>Numero de teléfono</h3></td>
                <td><h3>Coche que conduce</h3></td>
                <td><h3>Cedula de identidad</h3></td>
            </tr>
            <tr>
                <td><h4>+598 99 665 023</h4></td>
                <td><h4>Toyota Corolla SBI 2344</h4></td>
                <td><h4>4.365.129-4</h4></td>
            </tr>
        </table>

        <table class="tbtn">
            <tr>
                <td class="btns" onclick="window.location.href='emp_dtro_viaje_chof.php';">
                    <img class="logos" src="img/viaje.png">
                    <h2>Ver viajes</h2>
                </td>
                <td class="btns" onclick="window.location.href='emp_planilla_cierre_dia.php';">
                    <img class="logos" src="img/pago.png">
                    <h2>Planilla de cierre del dia</h2>
                </td>
            </tr>
        </table>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_choferes.js"></script>
</body>
</html>