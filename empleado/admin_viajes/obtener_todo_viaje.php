<?php
require_once '../../conexion.php';

$filtro = $_POST['filtro'];

if ($filtro == 1) {
    $query = "SELECT *,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        WHERE v.fecha > CURDATE()
        ORDER BY v.fecha DESC, v.hora_inicio ASC;";
} else if ($filtro == 2) {
    $query = "SELECT *,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        WHERE v.fecha < CURDATE()
        ORDER BY v.fecha DESC, v.hora_inicio ASC;";
} else if ($filtro == 3) {
    $query = "SELECT *,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        ORDER BY v.importe DESC;";
} else if ($filtro == 4) {
    $query = "SELECT *,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        ORDER BY v.importe ASC;";
} else if ($filtro == 5) {
    $query = "SELECT *,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        WHERE v.fecha = CURDATE()
        ORDER BY v.fecha DESC, v.hora_inicio ASC;";
} else {
    $query = "SELECT *,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        ORDER BY v.fecha DESC, v.hora_inicio ASC;";

}

$result = mysqli_query($conn, $query);
$json = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = array(
            'ci' => $row['ci'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'telefono' => $row['telefono'],
            'de_la_casa' => $row['de_la_casa'],
            'marca' => $row['marca'],
            'modelo' => $row['modelo'],
            'matricula' => $row['matricula'],
            'cod_viaje' => $row['cod_viaje'],
            'nombre_viajero' => $row['nombre_viajero'],
            'apellido_viajero' => $row['apellido_viajero'],
            'origen' => $row['origen'],
            'destino' => $row['destino'],
            'hora_inicio' => $row['hora_inicio'],
            'importe' => $row['importe'],
            'fecha' => $row['fecha'],
            'comentario' => $row['comentario']
        );
    }
}

echo json_encode($json);
?>