<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/emp_agendar_viaje.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
	</header>

    <div class="contenedor">

        <h1>AGENDAR VIAJE</h1>

        <table>
            <tr>
                <td>
                    <h2>Forma de pago</h2>
                    <select id="metodoPago" style="width: 50%">
                        <option value="efectivo">Efectivo</option>
                        <option value="transferencia">Transferencia</option>
                        <option value="cta_corriente">Cta. Corriente</option>
                        <option value="tarjeta">Tarjeta</option>
                    </select>
                </td>
            </tr>

        </table>
        
        <div id="opcionesTarjeta" style="display: none;">
            <label class="opcs"><input type="radio" name="tipoTarjeta" value="debito"> Débito</label>
            <label class="opcs"><input type="radio" name="tipoTarjeta" value="credito"> Crédito</label>
        </div>

        <br>
        <br>

        <div>
            <button onclick="window.location.href='emp_agendar_viaje.php';">ATRAS</button>
            <button id="btnContinuar">CONTINUAR</button>
        </div>
    
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/forma_de_pago.js"></script>
</body>
</html>