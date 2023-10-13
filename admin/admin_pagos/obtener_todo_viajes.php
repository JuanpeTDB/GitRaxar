<?php
	require_once '../../conexion.php';
	$cod_cliente = $_POST['cod_cliente'];
	if(ISSET($_POST['res'])){
		$query = "SELECT v.fecha as fecha1, v.importe as importe1 from cuenta_corriente cc
		join forma_de_pago fp on fp.cod_pago = cc.cod_pago
		join tiene t on t.cod_pago = fp.cod_pago
		join viajes v on v.cod_viaje = t.cod_viaje
		join reserva r on r.cod_viaje = v.cod_viaje
		join cliente c on c.cod_cliente = r.cod_cliente
		join particular p on p.cod_cliente = c.cod_cliente
		WHERE c.cod_cliente = $cod_cliente;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'fecha1' => $row['fecha1'],
                'importe1' => $row['importe1']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
