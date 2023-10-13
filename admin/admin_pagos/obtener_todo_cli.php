<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT
		C.*
	FROM particular AS P
	JOIN cliente AS C ON P.cod_cliente = C.cod_cliente
	JOIN cuenta_corriente AS CC ON P.cod_cliente = CC.cod_pago;
	";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'cod_cliente' => $row['cod_cliente'],
                'nombre_cli' => $row['nombre_cli'],
                'apellido_cli' => $row['apellido_cli']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
