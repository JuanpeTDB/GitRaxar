<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_editar_empleado.css">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $ci = $_GET['ci'];
        $query = "SELECT * FROM usuario WHERE ci = '$ci'";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $usuario = $row['nombre_usuario'];
                $contrasenia = $row['contrasenia'];
                $rol = $row['rol'];
                $telefono = $row['telefono'];
                $ci = $row['ci'];
        	}
		}
    ?>

    <header>
    <div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
	</header>

<form id="edicion" action="editarEmpleado.php" method="POST">
    <div class="contenedor">
    
        <h1>EDITAR EMPLEADO</h1>

        <div class="cont2">
        
        <input type="hidden" name="ci" value="<?php echo $ci; ?>">
            <table class="div-dek">
                <tr>
                    <td>
                        <h2>Nombre</h2>
                        <input name="nombre" type="text" value="<?php echo $nombre ?>"></input>
                    </td>
                    <td>
                        <h2>Apellido</h2>
                        <input name="apellido" type="text" value="<?php echo $apellido ?>"></input>
                    </td>
                    <td>
                        <h2>Nombre de usuario</h2>
                        <input name="usuario" type="text" value="<?php echo $usuario ?>"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Contraseña</h2>
                        <input name="contrasenia" type="text" value="<?php echo $contrasenia ?>"></input>
                    </td>
                    <td>
                        <h2>Telefono</h2>
                        <input type="text" name="telefono" value="<?php echo $telefono ?>"></input>
                    </td>
                    <td>
                        <h2>Rol</h2>
                        <select name="rol">
                            <option value="administrador">Administrador</option>
                            <option value="administrativo">Administrativo</option>
                        </select>
                    </td>
                </tr>
            </table>

            
        
            
        </div>
</form>
        <button id="btnAtras">ATRAS</button>    
        <button id="btnGuardar">GUARDAR</button> 
            
        </div>
    </div>

    <br><br><br>
    <div class="footer">

</body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#btnAtras").click(function() {
            window.history.back();
        });
        $("#btnGuardar").click(function() {
            $("#edicion").submit();
        });
</script>
</html>