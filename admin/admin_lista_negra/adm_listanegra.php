<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_listanegra.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

<?php
    session_start();
    if (isset($_GET['usuario'])) {
        $_SESSION['nombre_usuario'] = $_GET['usuario'];
    }
    require_once '../../conexion.php';
    $usuario = $_SESSION['nombre_usuario'];
    $query = "SELECT * FROM usuario WHERE nombre_usuario = '$usuario'";
            $result = mysqli_query($conn, $query);
            $json = array();
            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    $nombre = $row['nombre'];
                    $apellido = $row['apellido'];
                    $usuario = $row['nombre_usuario'];
                    $contrasenia = $row['contrasenia'];
                    $rol = $row['rol'];
                    $telefono = $row['telefono'];
                    $ci = $row['ci'];
                }
		}
?>

<header>
<a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>

    <nav>
        <a href="../../admin.php" class="nav-link">Inicio</a>
        <a href="../admin_chofer/adm_choferes.php" class="nav-link">Choferes</a>
        <a href="../admin_viajes/adm_viajes.php" class="nav-link">Viajes</a>
        <a href="../admin_coches/adm_coches.php" class="nav-link">Coches</a>
        <a href="../admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
        <a href="../admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
        <a href="../admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
    </nav>

    <div class="dropdown" style="">
        <button><i class="fa-solid fa-list"></i></button>
        <div class="dropdown-content">
        <a class="opc" href="../../admin.php" class="nav-link">Inicio</a>
        <a class="opc" href="../admin_chofer/adm_choferes.php" class="nav-link">Choferes</a>
        <a class="opc" href="../admin_viajes/adm_viajes.php" class="nav-link">Viajes</a>
        <a class="opc" href="../admin_coches/adm_coches.php" class="nav-link">Coches</a>
        <a class="opc" href="../admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
        <a class="opc" href="../admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
        <a class="opc" href="../admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
        </div>
    </div>
    <input type="hidden" id="ci" value="<?php echo $ci; ?>">
    <div class="usuario">
        <span class="nom_usu"><?php echo $_SESSION['nombre_usuario']; ?></span>
        <button id="config" title="Configuración"><i class="fa-solid fa-gear"></i></button>
        <button id="salir1" title="Cerrar sesión"><i class="fa-solid fa-sign-out"></i></button>
    
    </div>
</header>

    <div class="contenedor">
        <h1>LISTA NEGRA</h1>

        <a class="agregar"  onclick="window.location.href='adm_agregar_listanegra.php';">
            <img src="img/agregar.png" class="boton_agregar"><img src="img/silueta.png" class="boton_agregar">
        </a>

        <div class="box">
            <table id="container_info">
                                
            </table>
            
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">

    </div>
		
    
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script src="js/script_funciones.js"></script>
    <script>
        $(document).ready(function() {
            $("#salir").click(abrirPopup);
            $("#salir1").click(abrirPopup);
            $("#config").click(function() {
                window.location.href = "../admin_empleado/adm_editar_empleado.php?ci=" + $("#ci").val();
            });
        });

        function abrirPopup() {
            var cont1 = $("<div>").css({
                "position": "fixed",
                "z-index": "2",
                "top": "0",
                "left": "0",
                "width": "100%",
                "height": "100%",
                "background-color": "rgba(0, 0, 0, 0.5)",
                "display": "flex",
                "justify-content": "center",
                "align-items": "center"
            });

            var contenido = $("<div>").addClass("contElim").css({
                "width": "40%",
                "padding": "80px",
                "height": "40%",
                "position": "fixed",
                "text-align": "center",
                "background-color": "#F5F5F5",
                "border-color": "#20A144",
                "border-style": "solid",
                "border-width": "3px",
                "border-radius": "15px",
                "font-family": "nexa",
                "font-size": "35px",
                "color": "#20A144",
                "box-shadow": "0 2px 4px rgba(0, 0, 0, 0.2)"

            });

            var div = $("<div>").css({
                "width": "100%",
                "position": "relative",
                "padding": "0",
                /* "padding-top": "60px", */
                "display": "flex",
                "justify-content": "center",
                "align-items": "center"
            });

            var botonCancelar = $("<button>").attr("id", "btnCancelar").text("CANCELAR").css({
                "width": "180px",
                "height": "60px",
                "position": "relative",
                "left": "10%",
                "text-align": "center",
                "background-color": "#9ED4AE",
                "border-color": "#20A144",
                "border-style": "solid",
                "border-width": "3px",
                "border-radius": "15px",
                "font-family": "nexa",
                "font-size": "25px",
                "color": "#20A144",
                "margin-top": "50px"

            });

            var botonAceptar = $("<button>").attr("id", "btnAceptar").text("ACEPTAR").css({
                "width": "180px",
                "height": "60px",
                "position": "relative",
                "right": "10%",
                "text-align": "center",
                "background-color": "#9ED4AE",
                "border-color": "#20A144",
                "border-style": "solid",
                "border-width": "3px",
                "border-radius": "15px",
                "font-family": "nexa",
                "font-size": "25px",
                "color": "#20A144",
                "margin-top": "50px"
            });

            div.append(botonAceptar).append(botonCancelar);
            contenido.append("<p class='parrafoElim'>¿Seguro que deseas cerrar sesión?</p>");
            contenido.append(div);

            cont1.append(contenido);

            $("body").append(cont1);

            cont1.fadeIn();

            $("#btnCancelar").click(function() {
                cont1.remove();
            });

            $("#btnAceptar").click(function() {
                $.ajax({
                    url: "../../cerrar_sesion.php",
                    method: "POST",
                    success: function(response) {
                        window.location.href = "../../index.php";
                    }
                });
            });
        }
    </script>
</html>