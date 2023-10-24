<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_empleado.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>
<header>
<a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a id="btnAtras" href="adm_empleados.php" class="btnatras">ATRAS</a>
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
                        <input type="number" name="ci"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Telefono</h2>
                        <input type="number" name="telefono"></input>
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
                            <option value="administrador">Administrador</option>
                            <option value="administrativo">Usuario</option>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#btnAtras").click(function() {
            if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
                window.history.back();
            }
        });
    </script>

</html>