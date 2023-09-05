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

<div class="contenedor">
	<table>

		<tr>
			
			<td title="CHOFERES" id="chofer" onclick="window.location.href='admin/admin_chofer/adm_choferes.php';">
				<img class="logos" src="img/chofer.png">
				<h2>Choferes</h2>
			</td>
			<td title="VIAJES" id="viaje" onclick="window.location.href='admin/admin_viajes/adm_viajes.php';">
				<img class="logos" src="img/viaje.png">
				<h2>Viajes</h2>
			</td>
			<td title="COCHES" id="coche" onclick="window.location.href='admin/admin_coches/adm_coches.php';">
				<img class="logos" src="img/coche.png">
				<h2>Coches</h2>
			</td>
		</tr>


		<tr>
			<td title="EMPLEADOS" id="empleado" onclick="window.location.href='admin/admin_empleado/adm_empleados.php';">
				<img class="logos" src="img/empleado.png">
				<h2>Empleados</h2>
			</td>
			<td title="PAGOS" id="pago" onclick="window.location.href='admin/admin_pagos/adm_pagos.php';">
				<img class="logos" src="img/pago.png">
				<h2>Pagos</h2>
			</td>
			<td title="LISTA NEGRA" id="listanegra" onclick="window.location.href='admin/admin_lista_negra/adm_listanegra.php';">
				<img class="logos" src="img/listanegra.png">
				<h2>Lista Negra</h2>
			</td>
		</tr>


		<tr>
			<!--<td title="CHOFERES" id="clientes" onclick="window.location.href='admin/admin_clientes/adm_clientes.php';">
				<img class="logos" src="img/clientes.png">
				<h2>Clientes</h2>
			</td>-->
			<td title="MANTENIMIENTO" id="mantenimiento" onclick="window.location.href='admin/admin_mantenimientos/adm_mantenimientos.php';">
				<img class="logos" src="img/mantenimiento.png">
				<h2>Manteni-
					miento</h2>
			</td>
			<td title="CERRAR SESION" id="salir">
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