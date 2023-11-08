<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_mantenimiento.css">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $matricula = $_GET['matricula'];
        $query = "SELECT a.*, r.*, m.* FROM auto a
        INNER JOIN requiere r on r.matricula = a.matricula
        INNER JOIN mantenimiento m on m.cod_visita = r.cod_visita
        WHERE a.matricula = '$matricula';";
		$result = mysqli_query($conn, $query);
		$json = array();
        $vacio = 1;
		if(!$result) {
			while($row = mysqli_fetch_assoc($result)) {
                $matricula = $row['matricula'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $anio = $row['anio'];
                $cod_visita = $row['cod_visita'];
                $tipo = $row['tipo']; 
                $descripcion = $row['descripcion'];
                $vacio = 0;
        	}
		} else {
        $query = "SELECT * FROM auto a
        WHERE a.matricula = '$matricula';";
		$result = mysqli_query($conn, $query);
		$json = array();
        $vacio = 1;
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $matricula = $row['matricula'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $anio = $row['anio'];
                $vacio = 1;
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
        <a href="adm_mantenimientos.php" class="btnatras">ATRAS</a>
		
	</header>

    <input type="hidden" id="matricula" name="matricula" value="<?php echo $matricula; ?>">

    <div class="contenedor">
        <h1><?php echo $marca; ?> <?php echo $modelo; ?> <?php echo $matricula; ?></h1>

        <a title="Agregar chofer" class="agregar" onclick="window.location.href='adm_agregar_mantenimiento.php?matricula=<?php echo $matricula; ?>';">
            <i class="fa-solid fa-plus"></i><i class="fa-solid fa-gears"></i>
        </a>

        <div class="box">
            <table id="container_info">
                
            </table>
            
        </div>
    </div>
		
    </div>
    
    <br><br><br>
    <div class="footer">

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/mostrar_mantenimientos.js"></script>
</html>