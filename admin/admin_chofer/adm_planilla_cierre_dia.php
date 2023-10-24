
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_planilla_cierre_dia.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $ci = $_GET['ci'];
        $query = "SELECT *
        FROM chofer c
        INNER JOIN se_encarga se ON c.ci = se.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        WHERE c.ci = $ci;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if(!$result) {
			while($row = mysqli_fetch_assoc($result)) {
                $ci = $row['ci'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $telefono = $row['telefono'];
                $de_la_casa = $row['de_la_casa'];
                $nombre_viajero = $row['nombre_viajero'];
                $apellido_viajero = $row['apellido_viajero'];
                $telefono = $row['telefono'];
                $origen = $row['origen'];
                $destino = $row['destino'];
                $hora_inicio = $row['hora_inicio'];
                $importe = $row['importe'];
                $fecha = $row['fecha'];
                $comentario = $row['comentario'];
        	}
		} else {
            $query = "SELECT *
            FROM chofer c
            WHERE c.ci = $ci;";
            $result = mysqli_query($conn, $query);
            $json = array();
            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    $ci = $row['ci'];
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                    $telefono = $row['telefono'];
                    $de_la_casa = $row['de_la_casa'];
                }
            }
        }

    ?>

<header>
<a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_dentro_chofer.php?ci=<?php echo $ci; ?>" class="btnatras">ATRAS</a>
	</header>

    <input type="hidden" name="ci" value="<?php echo $ci; ?>" id="ci">
    
    <div class="contenedor">
        <h1><?php echo $nombre; ?> <?php echo $apellido; ?></h1>

        <div class="box">
            <table id="container_info">
                
            </table>
        </div>
    
    </div>
    <br><br><br><br><br>
    <div class="footer">
        
    </div>

</body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/mostrar_planillas.js"></script>
</html>