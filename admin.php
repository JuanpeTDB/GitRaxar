<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <title>REMI</title>
    <link rel="stylesheet" href="css/estilo_inicio.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<?php
session_start();

if (isset($_GET['usuario'])) {
    $_SESSION['nombre_usuario'] = $_GET['usuario'];
}
require_once 'conexion.php';
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


<body>

<header>
    <div class="logo">
        <img src="img/REMI_logo.png" alt="logo remi">
        <h2 class="nombre-remi">REMI</h2>
    </div>

    <nav>
        <a href="admin/admin_chofer/adm_choferes.php" class="nav-link">Choferes</a>
        <a href="admin/admin_viajes/adm_viajes.php" class="nav-link">Viajes</a>
        <a href="admin/admin_coches/adm_coches.php" class="nav-link">Coches</a>
        <a href="admin/admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
        <a href="admin/admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
        <a href="admin/admin_lista_negra/adm_listanegra.php" class="nav-link">Lista Negra</a>
        <a href="admin/admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
    </nav>

    <div class="dropdown" style="">
        <button><i class="fa-solid fa-list"></i></button>
        <div class="dropdown-content">
        <a class="opc" href="admin/admin_chofer/adm_choferes.php" class="nav-link">Choferes</a>
        <a class="opc" href="admin/admin_viajes/adm_viajes.php" class="nav-link">Viajes</a>
        <a class="opc" href="admin/admin_coches/adm_coches.php" class="nav-link">Coches</a>
        <a class="opc" href="admin/admin_empleado/adm_empleados.php" class="nav-link">Empleados</a>
        <a class="opc" href="admin/admin_pagos/adm_pagos.php" class="nav-link">Pagos</a>
        <a class="opc" href="admin/admin_lista_negra/adm_listanegra.php" class="nav-link">Lista Negra</a>
        <a class="opc" href="admin/admin_mantenimientos/adm_mantenimientos.php" class="nav-link">Mantenimiento</a>
        </div>
    </div>
    <input type="hidden" id="ci" value="<?php echo $ci; ?>">
    <div class="usuario">
        <span class="nom_usu"><?php echo $_SESSION['nombre_usuario']; ?></span>
        <button id="config" title="Configuración"><i class="fa-solid fa-user-gear"></i></button>
        <button id="salir1" title="Cerrar sesión"><i class="fa-solid fa-sign-out"></i></button>
    
    </div>
</header>

    <h1 class="bienvenido">Bienvenido admin: <?php echo $_SESSION['nombre_usuario']; ?> </h1>
    <div class="centered-container">

        
        <div class="contenedor">

            <div class="container">
                <div class="card" id="chofer" onclick="window.location.href='admin/admin_chofer/adm_choferes.php';">
                    <div class="front">
                        <img class="logos" src="img/chofer.png">
                        <h2 class="h2-front">Choferes</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Choferes</h2>
                        <p>En esta sección podrás ver los choferes que están registrados en el sistema.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card" id="viaje" onclick="window.location.href='admin/admin_viajes/adm_viajes.php';">
                    <div class="front">
                        <img class="logos" src="img/viaje.png">
                        <h2 class="h2-front">Viajes</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Viajes</h2>
                        <p>En esta sección podrás ver los viajes que están registrados en el sistema.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card" id="coche" onclick="window.location.href='admin/admin_coches/adm_coches.php';">
                    <div class="front">
                        <img class="logos" src="img/coche.png">
                        <h2 class="h2-front">Coches</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Coches</h2>
                        <p>En esta sección podrás ver los coches que están registrados en el sistema.</p>
                    </div>
                </div>
            </div>

            <!--=============================================================================================-->

            <div class="container">
                <div class="card" id="empleado" onclick="window.location.href='admin/admin_empleado/adm_empleados.php';">
                    <div class="front">
                        <img class="logos" src="img/empleado.png">
                        <h2 class="h2-front">Empleados</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Empleados</h2>
                        <p>En esta sección podrás ver los empleados que están registrados en el sistema.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card" id="pago" onclick="window.location.href='admin/admin_pagos/adm_pagos.php';">
                    <div class="front">
                        <img class="logos" src="img/pago.png">
                        <h2 class="h2-front">Pagos</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Pagos</h2>
                        <p>En esta sección podrás ver las cuentas corrientes registradas en el sistema.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card" id="listanegra" onclick="window.location.href='admin/admin_lista_negra/adm_listanegra.php';">
                    <div class="front">
                        <img class="logos" src="img/listanegra.png">
                        <h2 class="h2-front">Lista Negra</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Lista Negra</h2>
                        <p>En esta sección podrás ver los clientes pertenecientes a la lista negra.</p>
                    </div>
                </div>
            </div>

            <!--=============================================================================================-->

            <div class="container">
                <div class="card" id="mantenimiento" onclick="window.location.href='admin/admin_mantenimientos/adm_mantenimientos.php';">
                    <div class="front">
                        <img class="logos" src="img/mantenimiento.png">
                        <h2 class="h2-front">Mantenimiento</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Mantenimiento</h2>
                        <p>En esta sección podrás ver los mantenimientos realizados a los distintos coches, incluyendo el gasto de gasoil.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card" id="salir">
                    <div class="front">
                        <img class="logos" src="img/cerrar_sesion.png">
                        <h2 class="h2-front">Salir</h2>
                    </div>

                    <div class="back">
                        <h2 class="h2-back">Salir</h2>
                        <p>Con esta opción cerrarás tu sesión.</p>
                    </div>
                </div>
            </div>



            <!--=============================================================================================-->

        </div>
    </div>
    <br><br><br>
    <div class="footer">

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_cerrar_sesion.js"></script>

</body>

</html>