<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');


if (isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {
    require_once('conexion.php'); 

    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];

    $query = "SELECT * FROM usuario WHERE nombre_usuario = '$usuario' AND contrasenia = '$contrasenia'";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        $_SESSION['rol'] = $row['rol'];

        if ($_SESSION['rol'] == 'administrador') {
            echo "success";
        } else if ($_SESSION['rol'] == 'administrativo') {
            echo "success2";
        }
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>