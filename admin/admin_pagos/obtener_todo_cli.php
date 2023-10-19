<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT c.nombre_cli, c.apellido_cli, c.cod_cliente from cliente c
		join particular p on p.cod_cliente = c.cod_cliente
		join posee_par pp on pp.cod_cliente = p.cod_cliente
		join cuenta_corriente cc on cc.cod_cuenta = pp.cod_cuenta
		group by c.cod_cliente;
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
