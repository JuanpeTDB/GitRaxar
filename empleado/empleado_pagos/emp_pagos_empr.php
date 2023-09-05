<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_emp_pagos.css">
</head>
<body>
<header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="emp_pagos.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>EMPRESAS</h1>

        <a class="agregar"  onclick="window.location.href='agregar_pago_empr.php';">
            <img src="img/agregar.png" class="boton"><img src="img/silueta.png" class="boton">
        </a>

        <div class="box">
            <table>
                <tr onclick="window.location.href='emp_dentro_pago_empr.php';">
                    <td>
                        <h2>Divino</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Mosca</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Pizzeria Trouville</h2>
                        <hr>
                    </td>
                </tr>
                
                
                </tr>
                
            <table>
            
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
</body>
</html>