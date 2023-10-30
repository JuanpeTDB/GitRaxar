<?php
	require_once '../../conexion.php';
	$rut = $_POST['rut'];
	if(ISSET($_POST['res'])){
		$query = "SELECT v.*,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha, DATE_FORMAT(v.hora_inicio, '%h:%i') as hora_inicio, e.* from cliente c
		join empresa e on e.cod_cliente = c.cod_cliente
		join posee_emp po on po.rut = e.rut
		join cuenta_corriente cc on cc.cod_cuenta = po.cod_cuenta
		join forma_de_pago fp on fp.cod_pago = cc.cod_pago
		join tiene t on t.cod_pago = fp.cod_pago
		join viajes v on v.cod_viaje = t.cod_viaje
		WHERE e.rut = $rut and cc.saldado = 0; ;
	";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'hora_inicio' => $row['hora_inicio'],
                'fecha' => $row['fecha'],
                'importe' => $row['importe'],
				'nombre_viajero' => $row['nombre_viajero'],
				'apellido_viajero' => $row['apellido_viajero']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
