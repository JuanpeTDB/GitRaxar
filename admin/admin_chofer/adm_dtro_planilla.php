<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_planilla.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<?php
        require_once '../../conexion.php';
        $ci = $_GET['ci'];
        $fecha = $_GET['fecha'];
        $query = "SELECT v.*, c.*, fp.*
        FROM viajes v
        LEFT JOIN (
            SELECT t.cod_viaje, fp.cod_pago, cod_cuenta, activo, deuda, 'cuenta corriente' as rol, null as tipo 
            FROM cuenta_corriente fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'transferencia' as rol, null as tipo 
            FROM transferencia fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'contado' as rol, null as tipo 
            FROM contado fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'tarjeta' as rol, tipo 
            FROM tarjeta fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
        ) AS fp ON v.cod_viaje = fp.cod_viaje
        join se_encarga se on se.cod_viaje = v.cod_viaje
        join chofer c on c.ci = se.ci
        where c.ci = $ci and v.fecha = '$fecha';
        ";
		$result = mysqli_query($conn, $query);
		$json = array();
        $totalContado = 0;
        $total = 0;

		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $ci = $row['ci'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $telefono = $row['telefono'];
                $de_la_casa = $row['de_la_casa'];
                $nombre_viajero = $row['nombre_viajero'];
                $apellido_viajero = $row['apellido_viajero'];
                $telefono = $row['telefono'];
                $origen = $row['origen'];
                $destino = $row['destino'];
                $hora_inicio = $row['hora_inicio'];
                $importe = $row['importe'];
                $fecha = $row['fecha'];
                $comentario = $row['comentario'];
                $total += $row['importe'];
                
                if ($row['rol'] == 'contado') {
                    $totalContado += $row['importe'];
                }
        	}
		
        }  
        $query2 = "SELECT * from requiere re
        join mantenimiento m on re.cod_mantenimiento = m.cod_mantenimiento
        join auto au on au.matricula = re.matricula
        join conduce co on co.matricula = re.matricula
        join chofer c on c.ci = co.ci
        where c.ci = $ci and re.fecha = '$fecha';";
        $result2 = mysqli_query($conn, $query2);
        $total_mant = 0;
        if($result2) {
            while($row = mysqli_fetch_assoc($result2)) {
                $costo = $row['costo'];
                $total_mant += $costo;
            }
        }  

        
    ?>

<body>
<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_choferes.php" class="btnatras">ATRAS</a>
	</header>

    <input type="hidden" id="fecha" value="<?php echo $fecha; ?>">
    <input type="hidden" id="ci" value="<?php echo $ci; ?>">

    <div class="contenedor">

        <h1><?php echo $nombre; ?> <?php echo $apellido; ?></h1><h1> - <?php echo $fecha; ?></h1>

        <br><br><br><br>

        <h2 class="ganancias">Ganancias</h2>

        <table>
            <tr>
                <td><h2 class="nombres">Cliente</h2></td>
                <td><h2 class="nombres">Forma de pago</h2></td>
                <td><h2 class="nombres">Monto</h2></td>
            </tr>
        </table>

        <table id="container_info">
            
        </table>
        <br><br>
        <table>
            <tr>
                <td><h3>Total:</h3></td>
                <td><h3>$ <?php echo $total; ?></h3></td>
            </tr>
            <tr id="totalContado">
                <td><h3>Total contado:</h3></td>
                <td><h3>$ <?php echo $totalContado; ?></h3></td>
            </tr>
        </table>
    
    
        <br><br>
        <hr>
        <br><br>

        <h2 class="ganancias">Gastos</h2>

        <table>
            <tr>
                <td><h2 class="nombres">Tipo</h2></td>
                <td><h2 class="nombres">Descripcion</h2></td>
                <td><h2 class="nombres">Monto</h2></td>
            </tr>
        </table>

        <table id="container_info2">
        
        </table>

        <br><br>

        <table>
            <tr>
                <td><h3>Total:</h3></td>
                <td><h3>$ <?php echo $total_mant; ?></h3></td>
            </tr>
        </table>
    
    
        <br><br>
        <hr>
        <br><br>

        <h2 class="ganancias">Saldo del chofer</h2>

        <br>

        <table>
            <tr>
                <td><h3>Total:</h3></td>
                <td><h3>$ <?php echo $totalContado - $total_mant; ?></h3></td>
            </tr>
        </table>

        <br><br><br><br>


    </div>
    <div class="footer">
            
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/mostrar_info_planillas.js"></script>
</html>