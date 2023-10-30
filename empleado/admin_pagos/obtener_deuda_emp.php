<?php
	require_once '../../conexion.php';
	$rut = $_POST['rut'];
	if(ISSET($_POST['res'])){
		$query = "SELECT sum(v.importe) as deuda from viajes v
		join tiene t on t.cod_viaje = v.cod_viaje
		join forma_de_pago fp on fp.cod_pago = t.cod_pago
		join cuenta_corriente cc on cc.cod_pago = fp.cod_pago
		join posee_emp pe on pe.cod_cuenta = cc.cod_cuenta
		join empresa e on e.rut = pe.rut
		where e.rut = $rut;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'deuda' => $row['deuda']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 