<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_pagos.css">
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
        <h1>EMPRESAS</h1>

        <a class="agregar"  onclick="window.location.href='agregar_pago_empr.php';">
            <img src="img/agregar.png" class="boton_agregar"><img src="img/empresa.png" class="boton_agregar">
        </a>

        <div class="box">
            <table id="container_info">
                
            </table>
        </div>
    </div>

    <br><br>

    

    <br><br>
    <div class="footer">
		
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script_funciones_emp.js"></script>
</body>
</html>