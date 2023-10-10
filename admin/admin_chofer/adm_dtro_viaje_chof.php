
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_viaje_chof.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>
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
<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_choferes.php" class="btnatras">ATRAS</a>
	</header>

    <input type="hidden" id="ci_chofer" value="<?php echo $ci; ?>">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/mostrar_viajes.js"></script>

</html>