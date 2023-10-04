<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_listanegra.css">
</head>
<body>
<header><script>alert("PAGINA EN DESARROLLO");</script>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>

		<nav>
			<a href="../../admin.php" class="nav-link">Inicio</a>
			<a href="../admin_chofer/adm_choferes.php" class="nav-link">Choferes</a>
			<a href="../admin_viajes/adm_viajes.php" class="nav-link">Viajes</a>
			<a href="../admin_coches/adm_coches.php" class="nav-link">Coches</a>
			<a href="../admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
			<a href="../admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
			<a href="../admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
		</nav>
	</header>

    <div class="contenedor">
        <h1>LISTA NEGRA</h1>

        <a class="agregar"  onclick="window.location.href='adm_agregar_listanegra.php';">
            <img src="img/agregar.png" class="boton"><img src="img/silueta.png" class="boton">
        </a>

        <div class="box">
            <table>
                <tr onclick="window.location.href='adm_dentro_listanegra.php';">
                    <td>
                        <h2>Federico Garcia</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Bruno Damiani</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Juan Ignacio Ramirez</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Emmanuel Giggliotti</h2>
                        <hr>
                        
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Yonatan Rodriguez</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Diego Rodriguez</h2>
                        <hr>
                    </td>
                </tr>
                
            <table>
            
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
</body>
</html>