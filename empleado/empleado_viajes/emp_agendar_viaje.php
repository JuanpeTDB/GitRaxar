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
        <a href="emp_viajes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1>AGENDAR VIAJE</h1>

        <table>
            <tr>
                <td>
                    <h2>Origen</h2>
                    <input type="text"></input>
                </td>
                <td>
                    <h2>Destino</h2>
                    <input type="text"></input>
                </td>
                <td>
                    <h2>Cliente</h2>
                    <input type="text"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Hora Inicio</h2>
                    <input type="text"></input>
                </td>
                <td>
                    <h2>Hora Fin</h2>
                    <input type="text"></input>
                </td>
                <td>
                    <h2>Monto</h2>
                    <input type="text"></input>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h2>Comentario</h2>
                    <input type="text"></input>
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
            <button onclick="window.location.href='../../empin.php';">ATRAS</button>
            <button onclick="window.location.href='emp_forma_de_pago';">CONTINUAR</button>
        </div>
    
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
    </div>
</body>
</html>