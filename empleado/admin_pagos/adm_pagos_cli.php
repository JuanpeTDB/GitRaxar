<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_pagos.css">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/REMI_logo.png"> 
</head>
<body>
    <header>
    <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_pagos.php" class="btnatras">ATRAS</a>
	</header>

    
    <div class="contenedor">
        <h1>CLIENTES</h1>

        <a title="Agregar cliente a lista negra" class="agregar" onclick="window.location.href='agregar_pago_cli.php';">
            <i class="fa-solid fa-plus"></i><i class="fa-regular fa-user"></i>
        </a>

        <div class="box">
            <table id="container_info">
                
            </table>
        </div>
    </div>

    <br><br>

    

    <br><br><br><br><br>
    <div class="footer">
		
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script_funciones.js"></script>
</body>
</html>