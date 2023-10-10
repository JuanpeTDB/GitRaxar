<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_coches.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>
<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>

		<nav>
			<a href="../../admin.php" class="nav-link">Inicio</a>
			<a href="../admin_chofer/adm_choferes.php" class="nav-link">Choferes</a>
			<a href="../admin_viajes/adm_viajes.php" class="nav-link">Viajes</a>
			<a href="../admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
			<a href="../admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
			<a href="../admin_lista_negra/adm_listanegra.php" class="nav-link">Lista Negra</a>
			<a href="../admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
		</nav>
	</header>

    <div class="contenedor">
        <h1>COCHES</h1>

        <a class="agregar"  onclick="window.location.href='agregar_coche.php';">
            <img src="img/agregar.png" class="boton_agregar"><img src="img/coche.png" class="boton_agregar">
        </a>

        <div class="box">
            <table id="container_info"  >
             <!--   <tr><td>HOLA</td></tr>  -->
            </table>
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
</body>

    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script src="js/script_funciones.js"></script>
    <script src="js/script_eliminar_coche.js"></script>
    
</html>