<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dentro_choferes.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>
    <header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_choferes.php" class="btnatras">ATRAS</a>
	</header>

    <?php
        require_once '../../conexion.php';
        $ci = $_GET['ci'];
        $query = "SELECT *
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        WHERE c.ci = $ci";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $ci = $row['ci'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $telefono = $row['telefono'];
                $de_la_casa = $row['de_la_casa'];
                $marca = $row['marca']; 
                $modelo = $row['modelo']; 
                $matricula = $row['matricula']; 
        	}
		}
        
    ?>
    <input type="hidden" name="ci" value="<?php echo $ci; ?>" id="ci">
    <div class="contenedor">
        <h1><?php echo $nombre; ?> <?php echo $apellido; ?></h1>

        
        <table class="info">
            <tr>
                <td><h3>Numero de teléfono</h3></td>
                <td><h3>Coche que conduce</h3></td>
                <td><h3>Tipo de chofer</h3></td>
            </tr>
            <tr>
                <td><h4><?php echo $telefono; ?></h4></td>
                <td><h4><?php echo $marca; ?> <?php echo $modelo; ?> <?php echo $matricula; ?></h4></td>
                <td><h4><?php if ($de_la_casa == 1) {
            echo 'De la casa';
        } else {
            echo 'Externo';
        }
         ?></h4></td>
            </tr>
        </table>

        <table class="tbtn">
            <tr>
                <td class="btns" onclick="window.location.href = 'adm_dtro_viaje_chof.php?ci=<?php echo $ci; ?>'">
                    <img class="logos" src="img/viaje.png">
                    <h2>Ver viajes</h2>
                </td>
                <td class="btns" onclick="window.location.href='adm_planilla_cierre_dia.php?ci=<?php echo $ci; ?>';">
                    <img class="logos" src="img/pago.png">
                    <h2>Planilla de cierre del dia</h2>
                </td>
            </tr>
        </table>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_choferes.js"></script>
</body>
</html>