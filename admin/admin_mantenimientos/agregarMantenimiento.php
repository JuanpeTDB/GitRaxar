<?php
require_once '../../conexion.php';

$matricula = $_POST['matricula'];
$costo = $_POST['costo'];
$fecha = $_POST['fecha'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];

// Primero, inserta en la tabla `mantenimiento`
$queryMantenimiento = "INSERT INTO `mantenimiento` (descripcion, tipo) VALUES ('$descripcion', '$tipo')";
$resultMantenimiento = mysqli_query($conn, $queryMantenimiento);

if ($resultMantenimiento) {
    // Obtiene el valor de `cod_mantenimiento` generado durante la inserción
    $cod_mantenimiento = mysqli_insert_id($conn);

    // Luego, inserta en la tabla `requiere` usando el valor de `cod_mantenimiento`
    $queryRequiere = "INSERT INTO `requiere` (costo, matricula, fecha, cod_mantenimiento) VALUES ('$costo', '$matricula', '$fecha', '$cod_mantenimiento')";
    $resultRequiere = mysqli_query($conn, $queryRequiere);

    if ($resultRequiere) {
        header("Location: adm_dtro_mantenimiento.php?matricula=$matricula");
    } else {
        echo "Error en la consulta de requiere: " . mysqli_error($conn);
    }
} else {
    echo "Error en la consulta de mantenimiento: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
