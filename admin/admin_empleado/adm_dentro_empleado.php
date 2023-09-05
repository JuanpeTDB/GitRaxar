<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dentro_empleado.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="adm_empleados.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>JUAN FRIPP</h1>

        <div class="acciones">
            <button id="btneliminar">
                <img src="img/eliminar.png" class="imgboton">
            </button>
            <button style="margin-left: 40px" onclick="window.location.href='adm_editar_empleado.php';">
                <img src="img/editar.png" class="imgboton">
            </button>
        </div>

        <div class="cont2">
            <table class="info">
                <tr>
                    <td>
                        <h3>Nombre</h3>
                        <h4>Juan Fripp</h4>
                    </td>
                    <td>
                        <h3>Cedula</h3>
                        <h4>5.432.029-1</h4>
                    </td>
                </tr>
                <tr>
                <td>
                        <h3>Telefono</h3>
                        <h4>+598 99 121 023</h4>
                    </td>
                    <td>
                        <h3>Rol</h3>
                        <h4>Administrativo</h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_empleado.js"></script>
</body>
</html>