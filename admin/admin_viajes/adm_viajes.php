<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_viajes.css">
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
			<a href="../admin_coches/adm_coches.php" class="nav-link">Coches</a>
			<a href="../admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
			<a href="../admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
			<a href="../admin_lista_negra/adm_listanegra.php" class="nav-link">Lista Negra</a>
			<a href="../admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
		</nav>
	</header>

    <div class="contenedor">

        <h1>VIAJES</h1>

        <table class="tbtn">
            <tr>
                <td class="btns" onclick="window.location.href='adm_ver_viajes.php';">
                    <img class="logos" src="img/viaje.png">
                    <h2>Ver viajes</h2>
                </td>
                <td class="btns" onclick="window.location.href='adm_agendar_viaje.php';">
                    <img class="logos" src="img/agendar_viaje.png">
                    <h2>Agendar viaje</h2>
                </td>
            </tr>
        </table>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
    </div>
</body>
</html>
