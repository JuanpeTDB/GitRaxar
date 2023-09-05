<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_emp_editar_cliente.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
	</header>

    <div class="contenedor">
    
        <h1>EDITAR CLIENTE</h1>

        <div class="cont2">

            <table>
                <tr>
                    <td>
                        <h2>Nombre</h2>
                        <input type="text" value="Juan"></input>
                    </td>
                    <td>
                        <h2>Apellido</h2>
                        <input type="text" value="Fripp"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Numero de telefono</h2>
                        <input type="text" value="+598 091 290 332"></input>
                    </td>
                    <td>
                        <h2>Cedula de identidad</h2>
                        <input type="text" value="4.323.147-0"></input>
                    </td>
                </tr>
            </table>
            
        </div>

        <button onclick="window.location.href='emp_dentro_cliente.php';">ATRAS</button>    
        <button>GUARDAR</button>    
    
        <br><br><br><br><br>
        <div class="footer">
            
        </div>
    </div>
</body>