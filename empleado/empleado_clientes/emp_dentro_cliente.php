<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_emp_dentro_cliente.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="emp_clientes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>Juan Fripp</h1>

        <div class="acciones">
            <button style="margin-left: 20px" onclick="window.location.href='emp_editar_cliente.php';">
                <img src="img/editar.png" class="imgboton">
            </button>
        </div>

        <div class="cont2">
            <table class="info">
                <tr>
                    <td>
                        <h3>Nombre</h3>
                        <h4>Juan</h4>
                    </td>
                    <td>
                        <h3>Apellido</h3>
                        <h4>Fripp</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Numero de telefono</h3>
                        <h4>+598 091 290 332</h4>
                    </td>
                    <td>
                        <h3>Cedula de identidad</h3>
                        <h4>4.323.147-0</h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_cliente.js"></script>
</body>
</html>