<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT e.rut, MAX(C.cod_cliente) as cod_cliente, MAX(e.nombre_empresa) as nombre_empresa
		FROM empresa AS e
		JOIN cliente AS C ON e.cod_cliente = C.cod_cliente
		JOIN posee_emp pe ON pe.rut = e.rut
		JOIN cuenta_corriente AS CC ON pe.cod_cuenta = CC.cod_cuenta
		GROUP BY e.rut
		LIMIT 0, 10000;
		
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
