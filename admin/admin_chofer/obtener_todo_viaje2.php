<?php
	require_once '../../conexion.php';
    $ci = $_POST["ci"];
    $fecha = $_POST["fecha"];
	if(ISSET($_POST['res'])){
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
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'ci' => $row['ci'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'telefono' => $row['telefono'],
                'de_la_casa' => $row['de_la_casa'],
                
                'cod_viaje' => $row['cod_viaje'],
                'nombre_viajero' => $row['nombre_viajero'],
                'apellido_viajero' => $row['apellido_viajero'],
                'telefono' => $row['telefono'],
                'origen' => $row['origen'],
                'destino' => $row['destino'],
                'hora_inicio' => $row['hora_inicio'],
                'importe' => $row['importe'],
                'fecha' => $row['fecha'],
                'tipo_fp' => $row['rol'],
                'comentario' => $row['comentario'],
            );
        	}
		}

        
	}
    
    echo json_encode($json);
?> 
