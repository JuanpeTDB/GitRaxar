<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_ver_viajes.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<?php
$filtro = $_GET['filtro'];
?>

<body>
    <header>
        <a style="text-decoration: none;" href="../../empleado.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_viajes.php" class="btnatras">ATRAS</a>
    </header>

    <div class="contenedor">
        <h1>VIAJES</h1>
        <div class="dropdown">
            <button><i class="boton_agregar fa-solid fa-arrow-down-wide-short"></i></button>

            <div class="dropdown-content">
                <a class="opc" href = "adm_ver_viajes.php?filtro=0" class="nav-link">Todos</a>
                <a class="opc" href = "adm_ver_viajes.php?filtro=1" class="nav-link">A realizar</a>
                <a class="opc" href = "adm_ver_viajes.php?filtro=2" class="nav-link">Realizados</a>
                <a class="opc" href = "adm_ver_viajes.php?filtro=3" class="nav-link">Mayor Importe</a>
                <a class="opc" href = "adm_ver_viajes.php?filtro=4" class="nav-link">Menor Importe</a>
                <a class="opc" href = "adm_ver_viajes.php?filtro=5" class="nav-link">Para hoy</a>
            </div>
        </div>

        <input type="hidden" id="filtro" value="<?php echo $filtro ?>>


        <div class=" box">
        <table id="container_info">


        </table>

    </div>
    </div>

    <br><br><br><br><br>
    <div class="footer">

    </div>
</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script_funciones.js"></script>

</html >