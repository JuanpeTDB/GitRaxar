<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agendar_viaje.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

<?php
        require_once '../../conexion.php';
        $cod_viaje = $_GET['cod_viaje'];
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
        where v.cod_viaje = $cod_viaje;
        ";

		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $ci = $row['ci'];
                $nombre_chof = $row['nombre'];
                $apellido_chof = $row['apellido'];
                $telefono = $row['telefono'];
                $de_la_casa = $row['de_la_casa'];
                $cod_viaje = $row['cod_viaje'];
                $nombre_viajero = $row['nombre_viajero'];
                $apellido_viajero = $row['apellido_viajero'];
                $telefono = $row['telefono'];
                $origen = $row['origen'];
                $destino = $row['destino'];
                $hora_inicio = $row['hora_inicio'];
                $importe = $row['importe'];
                $fecha = $row['fecha'];
                $comentario = $row['comentario'];
                $tipo_fp = $row['rol'];
        	}
		}
        
        $queryChoferes = "SELECT ci, nombre, apellido, de_la_casa FROM chofer where activo = 1";
        $resultChoferes = mysqli_query($conn, $queryChoferes);
        $jsonChoferes = array();

        if (mysqli_num_rows($resultChoferes) > 0) {
        while ($rowChofer = mysqli_fetch_assoc($resultChoferes)) {
            $ciChofer = $rowChofer['ci'];
            $de_la_casa = $rowChofer['de_la_casa'];
            $nombreChofer = $rowChofer['nombre'] . ' ' . $rowChofer['apellido'];
            $jsonChoferes[] = array('ci' => $ciChofer, 'nombre' => $nombreChofer, 'de_la_casa' => $de_la_casa);
        } 
}

        
    ?>
    <header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
	</header>

    <div class="contenedor">

        <h1>EDITAR VIAJE</h1>
        <form id="edicion" action="editarViaje.php" method="POST">
        <input type="hidden" name="cod_viaje" value="<?php echo $cod_viaje; ?>">
        <table>
            <tr>
                <td>
                    <h2>Origen</h2>
                    <input type="text" name="origen" value="<?php echo $origen ?>"></input>
                </td>
                <td>
                    <h2>Destino</h2>
                    <input type="text" name="destino" value="<?php echo $destino?>"></input>
                </td>
                <td>
                    <h2>Nombre Cliente</h2>
                    <input type="text" name="nombre_viajero" value="<?php echo $nombre_viajero?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Apellido Cliente</h2>
                    <input type="text" name="apellido_viajero" value="<?php echo $apellido_viajero?>"></input>
                </td>
                <td>
                    <h2>Hora Inicio</h2>
                    <input type="time" name="hora_inicio" value="<?php echo $hora_inicio?>"></input>
                </td>
                <td>
                    <h2>Fecha</h2>
                    <input type="date" name="fecha" value="<?php echo $fecha?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Importe</h2>
                    <input type="text" name="importe" value="<?php echo $importe?>"></input>
                </td>
                <td>
                    <h2>Comentario</h2>
                    <input type="text" name="comentario" value="<?php echo $comentario?>"></input>
                </td>
                <td>
                    <h2>Chofer</h2>
                    <select id="chof" name="ciChofer">
                    <?php
                        if (empty($jsonChoferes)) {
                            echo "<option value='' disabled selected>No hay choferes disponibles</option>";
                        } else {
                            echo "<option value='' disabled selected>Seleccione un chofer</option>";
                            foreach ($jsonChoferes as $chofer) {
                                $nombreChofer = $chofer['nombre'];
                                if ($chofer['de_la_casa'] == true) {
                                    echo "<option value='{$chofer['ci']}'>$nombreChofer 🏠</option>";
                                } else {
                                    echo "<option value='{$chofer['ci']}'>$nombreChofer </option>";
                                }
                                
                            }
                        }
                    ?>
                    </select>
                </td>
            </tr>

        </table>
        </form>
        <br>
        <br>
            <button id="btnAtras">ATRAS</button>    
            <button id="btnGuardar">GUARDAR</button>   
    
    
    </div>
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#btnAtras").click(function() {
            window.history.back();
        });
        $("#btnGuardar").click(function() {
    var selectedChofer = $("select[name='ciChofer']").val();
    if (!selectedChofer) {
        alert("Por favor, seleccione un chofer.");
    } else {
        $("#edicion").submit();
    }
});
</script>
</body>
</html>