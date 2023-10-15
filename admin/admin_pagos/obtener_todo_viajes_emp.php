<?php
	require_once '../../conexion.php';
	$rut = $_POST['rut'];
	if(ISSET($_POST['res'])){
		$query = "SELECT
		C.*, v.*, e.*
	FROM empresa AS e
	JOIN cliente AS C ON e.cod_cliente = C.cod_cliente
	join reserva as r on r.cod_cliente = c.cod_cliente
	join viajes as v on v.cod_viaje = r.cod_viaje
	join tiene t on t.cod_viaje = v.cod_viaje
	join forma_de_pago fp on fp.cod_pago = t.cod_pago
	JOIN cuenta_corriente AS CC ON e.cod_cliente = CC.cod_pago
	where e.rut = $rut;
	";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'hora_inicio' => $row['hora_inicio'],
                'fecha' => $row['fecha'],
                'importe' => $row['importe'],
				'nombre_viajero' => $row['nombre_cli'],
				'apellido_viajero' => $row['apellido_cli']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
