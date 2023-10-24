<?php
	require_once '../../conexion.php';
	$cod_cliente = $_POST['cod_cliente'];
	if(ISSET($_POST['res'])){
		$query = "SELECT  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha1, v.hora_inicio as hora_inicio, v.importe as importe1 from cliente c
		join particular p on p.cod_cliente = c.cod_cliente
		join posee_par po on po.cod_cliente = p.cod_cliente
		join cuenta_corriente cc on cc.cod_cuenta = po.cod_cuenta
		join forma_de_pago fp on fp.cod_pago = cc.cod_pago
		join tiene t on t.cod_pago = fp.cod_pago
		join viajes v on v.cod_viaje = t.cod_viaje
		WHERE c.cod_cliente = $cod_cliente and cc.saldado = 0;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'fecha1' => $row['fecha1'],
                'importe1' => $row['importe1'],
				'hora_inicio' => $row['hora_inicio']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 