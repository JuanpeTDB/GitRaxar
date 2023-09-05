<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agendar_viaje.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="adm_viajes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1>EDITAR VIAJE</h1>

        <table>
            <tr>
                <td>
                    <h2>Origen</h2>
                    <input type="text" value="Maldonado 2292"></input>
                </td>
                <td>
                    <h2>Destino</h2>
                    <input type="text" value="Aeropuerto de carrasco"></input>
                </td>
                <td>
                    <h2>Cliente</h2>
                    <input type="text" value="Rodrigo Aguirre"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Hora Inicio</h2>
                    <input type="text" value="12:17"></input>
                </td>
                <td>
                    <h2>Fecha</h2>
                    <input type="text" value="27/7"></input>
                </td>
                <td>
                    <h2>Importe</h2>
                    <input type="text" value="$537"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Comentario</h2>
                    <input type="text" value="Va con 2 valijas"></input>
                </td>
                <td>
                    <h2>Forma de pago</h2>
                    <input type="text" value="Efectivo"></input>
                </td>
                <td>
                    <h2>Chofer</h2>
                    <select>
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
                </td>
            </tr>

        </table>

        <br>
        <br>

        <div>
            <button onclick="window.location.href='adm_dentro_viaje.php';">ATRAS</button>
            <button onclick="window.location.href='adm_dentro_viaje.php';">GUARDAR</button>
        </div>
    
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
    </div>
</body>
</html>