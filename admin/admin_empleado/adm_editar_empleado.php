<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_editar_empleado.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
	</header>

    <div class="contenedor">
    
        <h1>EDITAR EMPLEADO</h1>

        <div class="cont2">

            <table>
                <tr>
                    <td>
                        <h2>Nombre</h2>
                        <input type="text" value="Juan Fripp"></input>
                    </td>
                    <td>
                        <h2>Cedula</h2>
                        <input type="text" value="5.432.029-1"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Telefono</h2>
                        <input type="text" value="+598 99 121 023"></input>
                    </td>
                    <td>
                        <h2>Rol</h2>
                        <select>
                            <option value="empleado">Empleado</option>
                            <option value="administrativo">Administrativo</option>
                        </select>
                    </td>
                </tr>
            </table>
            
        </div>

        <button onclick="window.location.href='adm_dentro_empleado.php';">ATRAS</button>    
        <button onclick="window.location.href='adm_dentro_empleado.php';">GUARDAR</button>    
    
        <br><br><br><br><br>
        <div class="footer">
            
        </div>
    </div>
</body>