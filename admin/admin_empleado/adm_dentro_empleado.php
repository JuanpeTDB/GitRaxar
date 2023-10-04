<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dentro_empleado.css">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $ci = $_GET['ci'];
        $newCi = $ci;
        $query = "SELECT * FROM usuario WHERE ci = '$ci'";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $nombre_usuario = $row['nombre_usuario'];
                $contrasenia = $row['contrasenia'];
                $rol = $row['rol'];
                $telefono = $row['telefono'];
            
        	}
		}
    ?>

    <header>
        <div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_empleados.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1><?php echo $nombre ?> <?php echo $apellido ?></h1>

        <div class="cont2">
            <table class="info div-dek">
                <tr>
                    <td>
                        <h2>Nombre</h2>
                        <h3><?php echo $nombre ?></h3>
                    </td>
                    <td>
                        <h2>Apellido</h2>
                        <h3><?php echo $apellido ?></h3>
                    </td>
                    <td>
                        <h2>Cedula</h2>
                        <h3><?php echo $ci ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Telefono</h2>
                        <h3><?php echo $telefono ?></h3>
                    </td>
                    <td>
                        <h2>Rol</h2>
                        <h3><?php echo $rol ?></h3>
                    </td>
                    <td>
                        <h2>Nombre de usuario</h2>
                        <h3><?php echo $nombre_usuario ?></h3>
                    </td>
                </tr>
            </table>
        </div>

        <div class="div-mobile">
                <div class="fila">
                    <div class="columna">
                        <div class="head">
                            <h2>Nombre</h2>
                        </div>
                        <div class="cont">
                            <h3><?php echo $nombre ?></h3>
                        </div>
                    </div>
                    <div class="columna">
                        <div class="head">
                            <h2>Apellido</h2>
                        </div>
                        <div class="cont">
                        <h3><?php echo $apellido ?></h3>
                        </div>
                    </div>
                    <div class="columna">
                        <div class="head">
                            <h2>Rol</h2>
                        </div>
                        <div class="cont">
                        <h3><?php echo $rol ?></h3>
                        </div>
                    </div>
                    <div class="columna">
                        <div class="head">
                            <h2>Nombre de usuario</h2>
                        </div>
                        <div class="cont">
                        <h3><?php echo $nombre_usuario ?></h3>
                        </div>
                    </div>
                    <div class="columna">
                        <div class="head">
                            <h2>Cedula</h2>
                        </div>
                        <div class="cont">
                        <h3><?php echo $ci ?></h3>
                        </div>
                    </div>
                    <div class="columna">
                        <div class="head">
                            <h2>Telefono</h2>
                        </div>
                        <div class="cont">
                        <h3><?php echo $telefono ?></h3>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_empleado.js"></script>
</body>
</html>