<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_mantenimiento.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
	</header>

    <div class="contenedor">
    
        <h1>AGREGAR MANTENIMIENTO</h1>

        <div class="cont2">

            <table>
                <tr>
                    <td>
                        <h2>Concepto</h2>
                        <select>
                        <option value="gasoil">Gasoil</option>
                        <option value="electricista">Electricista</option>
                        <option value="cambio_aceite">Cambio aceite</option>
                        <option value="alineacion_balanceo">Alineacion y balanceo</option>
                        <option value="cambio_cubierta">Cambio de cubierta</option>
                        <option value="gomeria">Gomeria</option>
                        <option value="cambio_correa">Cambio de correa</option>
                        <option value="frenos">Frenos</option>
                        <option value="embrague">Embrague</option>
                        <option value="chapista">Chapista</option>
                        <option value="otros">Otros</option>
                    </select>
                    </td>
                    <td>
                        <h2>Descripcion</h2>
                        <input type="text"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Fecha</h2>
                        <input type="text"></input>
                    </td>
                    <td>
                        <h2>Importe</h2>
                        <input type="text"></input>
                    </td>
                </tr>
            </table>
            
        </div>

        <button onclick="window.location.href='emp_dtro_mantenimiento.php';">ATRAS</button>    
        <button onclick="window.location.href='emp_dtro_mantenimiento.php';">GUARDAR</button>    
    
        
    </div>
    <br><br><br><br><br>
        <div class="footer">
            
        </div>
</body>
</html>