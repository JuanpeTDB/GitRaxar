<?php

require_once('conexion.php'); 
$loginFailed = false;
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (!empty($usuario) && !empty($contrasena)) {
        $query = "SELECT * FROM usuario WHERE nombre_usuario = '$usuario' AND contrasenia = '$contrasena'";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
            $_SESSION['rol'] = $row['rol'];

            if ($_SESSION['rol'] == 'administrador') {
                header("Location: admin.php");
            } else if ($_SESSION['rol'] == 'administrativo') {
                header("Location: empleado.php");
            }
        } else {
            $loginFailed = true;
            header("Location: login.php");
        }
    } else {
    }
} else {
}
?>
