<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_viajes.css">
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
			<a href="../admin_coches/adm_coches.php" class="nav-link">Coches</a>
			<a href="../admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
			<a href="../admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
			<a href="../admin_lista_negra/adm_listanegra.php" class="nav-link">Lista Negra</a>
			<a href="../admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
		</nav>
        </header>
        <h1>VIAJES</h1>
<div class="centered-container">
    <div class="contenedor">



        <div class="container">
                <div class="card" id="chofer" onclick="window.location.href='admin/admin_chofer/adm_choferes.php';">
                    <div class="front">
                        <img class="logos" src="img/viaje.png">
                        <h2 class="h2-front">Ver viajes</h2>
                    </div>
    
                    <div class="back">
                        <h2 class="h2-back">Ver viajes</h2>
                        <p>En esta sección se encuentran las viajes registrados en el sistema.</p>
                    </div>
                </div>
            </div>
        <div class="container">
            <div class="card" id="chofer" onclick="window.location.href='admin/admin_chofer/adm_choferes.php';">
                <div class="front">
                    <img class="logos" src="img/agendar_viaje.png">
                    <h2 class="h2-front">Agendar</h2>
                </div>

                <div class="back">
                    <h2 class="h2-back">Agendar viajes</h2>
                        <p>En esta sección se pueden agendar los viajes.</p>
                </div>
            </div>
        </div>
    </div>
    
    <br><br><br>

    </div>
    <div class="footer">
		
    </div>
</div>
</body>
</html>