<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dentro_coche_mantenimiento.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $cod_mantenimiento = $_GET['cod_mantenimiento'];
        $query = "SELECT *, DATE_FORMAT(r.fecha, '%d-%m-%Y') AS fecha FROM auto a
        INNER JOIN requiere r on r.matricula = a.matricula
        INNER JOIN mantenimiento m on m.cod_mantenimiento = r.cod_mantenimiento
        WHERE m.cod_mantenimiento = '$cod_mantenimiento';";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $matricula = $row['matricula'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $anio = $row['anio'];
                $cod_mantenimiento = $row['cod_mantenimiento'];
                $tipo = $row['tipo']; 
                $descripcion = $row['descripcion'];
                $fecha = $row['fecha'];
                $costo = $row['costo'];
        	}
		}
        
    ?>

<header>
<a style="text-decoration: none;" href="../../empleado.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_dtro_mantenimiento.php?matricula=<?php echo $matricula; ?>" class="btnatras">ATRAS</a>
		
	</header>

    <div class="contenedor">
        <h1><?php echo $marca; ?> <?php echo $modelo; ?> <?php echo $matricula; ?></h1>

        <div class="cont2">
            <table class="info">
                <tr>
                    <td>
                        <h3>Tipo</h3>
                        <h4><?php echo $tipo; ?></h4>
                    </td>
                    <td>
                        <h3>Comentario</h3>
                        <h4><?php echo $descripcion; ?></h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Fecha</h3>
                        <h4><?php echo $fecha; ?></h4>
                    </td>
                    <td>
                        <h3>Importe</h3>
                        <h4>$<?php echo $costo; ?></h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

</body>
</html>