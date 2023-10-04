<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_inicio.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>

		<nav>
			<a href="admin/admin_chofer/adm_choferes.php" class="nav-link">Choferes</a>
			<a href="admin/admin_viajes/adm_viajes.php" class="nav-link">Viajes</a>
			<a href="admin/admin_coches/adm_coches.php" class="nav-link">Coches</a>
			<a href="admin/admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
			<a href="admin/admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
			<a href="admin/admin_lista_negra/adm_listanegra.php" class="nav-link">Lista Negra</a>
			<a href="admin/admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
		</nav>
	</header>
<div class="centered-container">
<div class="contenedor">
	
			<div class="cards" title="CHOFERES" id="chofer" onclick="window.location.href='admin/admin_chofer/adm_choferes.php';">
				<img class="logos" src="img/chofer.png">
				<h2>Choferes</h2>
			</div>
			<div class="cards" title="VIAJES" id="viaje" onclick="window.location.href='admin/admin_viajes/adm_viajes.php';">
				<img class="logos" src="img/viaje.png">
				<h2>Viajes</h2>
			</div>
			<div class="cards" title="COCHES" id="coche" onclick="window.location.href='admin/admin_coches/adm_coches.php';">
				<img class="logos" src="img/coche.png">
				<h2>Coches</h2>
			</div>
			
			<div class="cards" title="EMPLEADOS" id="empleado" onclick="window.location.href='admin/admin_empleado/adm_empleados.php';">
				<img class="logos" src="img/empleado.png">
				<h2>Empleados</h2>
			</div>
			<div class="cards" title="PAGOS" id="pago" onclick="window.location.href='admin/admin_pagos/adm_pagos.php';">
				<img class="logos" src="img/pago.png">
				<h2>Pagos</h2>
			</div>
			<div class="cards" title="LISTA NEGRA" id="listanegra" onclick="window.location.href='admin/admin_lista_negra/adm_listanegra.php';">
				<img class="logos" src="img/listanegra.png">
				<h2>Lista Negra</h2>
			</div>
		
			
			<!--<div class="cards" title="CHOFERES" id="clientes" onclick="window.location.href='admin/admin_clientes/adm_clientes.php';">
				<img class="logos" src="img/clientes.png">
				<h2>Clientes</h2>
			</div>-->
			<div class="cards" title="MANTENIMIENTO" id="mantenimiento" onclick="window.location.href='admin/admin_mantenimientos/adm_mantenimientos.php';">
				<img class="logos" src="img/mantenimiento.png">
				<h2>Manteni-
					miento</h2>
			</div>
			<div class="cards" title="CERRAR SESION" id="salir">
				<img class="logos" src="img/cerrar_sesion.png">
				<h2>Salir</h2>
			</div>
		
			
</div>
</div>
    <br><br><br>
    <div class="footer">
		
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/script_cerrar_sesion.js"></script>

</body>
</html>