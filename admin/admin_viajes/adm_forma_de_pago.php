<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agendar_viaje.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

   <?php
        require_once '../../conexion.php';
        $cod_viaje = $_GET['cod_viaje'];        
    ?>

    <header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_agendar_viaje.php"  id="btnAtras" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1>AGENDAR VIAJE</h1>


        <input type="hidden" id="cod_viaje" name="cod_viaje" value="<?php echo $cod_viaje; ?>">
        <table>
            <tr>
                <td>
                    <h2>Forma de pago</h2>
                    <select name="metodoPago" id="metodoPago" style="width: 50%">
                        <option value="" disabled selected> Seleccione una forma de pago </option>
                        <option value="1">Efectivo</option>
                        <option value="2">Transferencia</option>
                        <option value="3">Cta. Corriente</option>
                        <option value="4">Tarjeta</option>
                    </select>
                </td>
            </tr>

        </table>
        
        <table class="tarjeta" style="display: none" id="opcionesTarjeta">
            <tr>
                <td>
                    <input type="radio" name="tipoTarjeta" value="debito">
                </td>
                <td>
                    <input type="radio" name="tipoTarjeta" value="credito">
                </td>
            </tr>
            <tr>
                <td class="opcs">
                    Débito
                </td>
                <td class="opcs">
                    Crédito
                </td>
            </tr>
        </table>

        <br>
        <br>

        <div>
            <button id="btnContinuar">CONTINUAR</button>
        </div>
    
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/forma_de_pago.js"></script>
</body>
</html>