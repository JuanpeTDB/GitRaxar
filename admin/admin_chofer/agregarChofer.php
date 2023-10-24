<?php
require_once '../../conexion.php';

$ci = $_POST['ci'];
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$de_la_casa = $_POST['de_la_casa'];
$fecha_vnto_libreta = $_POST['fecha_vnto_libreta'];

$query1 = "INSERT INTO `chofer` (ci, nombre, apellido, telefono, de_la_casa, activo, fecha_vnto_libreta) VALUES('$ci', '$nombre', '$apellido', '$telefono', '$de_la_casa', 1, ";

if (!empty($fecha_vnto_libreta)) {
    $query1 .= "'$fecha_vnto_libreta'";
} else {
    $query1 .= "NULL";
}

$query1 .= ")";
$query2 = "INSERT INTO `conduce` (ci, matricula) VALUES('$ci', '$matricula')";

if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
    header("Location: adm_choferes.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>