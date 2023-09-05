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
		<img class="logo" src="img/REMI_completo.png">
	</header>
	<script>alert("PAGINA EN DESARROLLO");</script>
<div class="contenedor">
	<table>

		<tr>
			
			<td id="chofer" onclick="window.location.href='empleado/empleado_chofer/emp_choferes.php';">
				<img class="logos" src="img/chofer.png">
				<h2>Choferes</h2>
			</td>
			<td id="viaje" onclick="window.location.href='empleado/empleado_viajes/emp_viajes.php';">
				<img class="logos" src="img/viaje.png">
				<h2>Viajes</h2>
			</td>
			<td id="coche" onclick="window.location.href='empleado/empleado_coches/emp_coches.php';">
				<img class="logos" src="img/coche.png">
				<h2>Coches</h2>
			</td>
		</tr>


		<tr>
			<!--<td id="clientes" onclick="window.location.href='empleado/empleado_clientes/emp_clientes.php';">
				<img class="logos" src="img/clientes.png">
				<h2>Clientes</h2>
			</td>-->
			<td id="pago" onclick="window.location.href='empleado/empleado_pagos/emp_pagos.php';">
				<img class="logos" src="img/pago.png">
				<h2>Pagos</h2>
			</td>
			<td id="mantenimiento" onclick="window.location.href='empleado/empleado_mantenimientos/emp_mantenimientos.php';">
				<img class="logos" src="img/mantenimiento.png">
				<h2>Manteni-
					miento</h2>
			</td>
			<td id="salir">
				<img class="logos" src="img/cerrar_sesion.png">
				<h2>Salir</h2>
			</td>
		</tr>
	</table>
</div>

<br><br><br>
<div class="footer">
	
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/script_cerrar_sesion.js"></script>

</body>
</html>