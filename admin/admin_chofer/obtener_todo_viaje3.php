<?php
	require_once '../../conexion.php';
    $ci = $_POST["ci"];
    $fecha = $_POST["fecha"];
	if(ISSET($_POST['res'])){
        $query = "SELECT * from mantenimiento m 
        join requiere re on re.cod_visita = m.cod_visita
        join auto au on au.matricula = re.matricula
        join conduce co on co.matricula = re.matricula
        join chofer c on c.ci = co.ci
        where c.ci = $ci and re.fecha = '$fecha';";
    $totalCost = 0;
        $result = mysqli_query($conn, $query);
        $json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $costo = $row['costo'];
                $totalCost += $costo; 
                $json[] = array(
                    'costo_mant' => $row['costo'],
                    'tipo' => $row['tipo'],
                    'descripcion' => $row['descripcion'],
                );
        	}
		}

	}
    
    echo json_encode($json);
?> 
