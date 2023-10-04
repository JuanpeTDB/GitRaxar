<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_empleado.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="adm_empleados.php" class="btnatras">ATRAS</a>
	</header>

    <form action="agregarEmpleado.php" method="POST">
    <div class="contenedor">
    
        <h1>AGREGAR EMPLEADO</h1>

        <div class="cont2">

            <table>
                <tr>
                    <td>
                        <h2>Nombre</h2>
                        <input type="text" name="nombre"></input>
                    </td>
                    <td>
                        <h2>Apellido</h2>
                        <input type="text" name="apellido"></input>
                    </td>
                    <td>
                        <h2>Cedula</h2>
                        <input type="text" name="ci"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Telefono</h2>
                        <input type="text" name="telefono"></input>
                    </td>
                    <td>
                        <h2>Nombre de usuario</h2>
                        <input type="text" name="nombre_usuario"></input>
                    </td>
                    <td>
                        <h2>Contraseña</h2>
                        <input type="text" name="contrasenia"></input>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <h2>Rol</h2>
                        <select name="rol">
                            <option value="" disabled selected>Seleccione un rol</option>
                            <option value="administrativo">Administrativo</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </td>
                </tr>
            </table>
            
        </div>
        
        <button action="agregarEmpleado.php">GUARDAR</button>
</form>
        
    </div>
    <br>
    <div class="footer">
        
    </div>
</body>
</html>