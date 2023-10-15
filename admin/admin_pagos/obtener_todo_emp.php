<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT
		C.*, e.*
	FROM empresa AS e
	JOIN cliente AS C ON e.cod_cliente = C.cod_cliente
	JOIN cuenta_corriente AS CC ON e.cod_cliente = CC.cod_pago;
	";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'cod_cliente' => $row['cod_cliente'],
                'nombre_empresa' => $row['nombre_empresa'],
                'rut' => $row['rut']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
