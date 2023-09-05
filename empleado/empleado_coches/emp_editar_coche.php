<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_emp_editar_coche.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
	</header>

    <div class="contenedor">
    
        <h1>EDITAR COCHE</h1>

        <div class="cont2">

            <table>
                <tr>
                    <td>
                        <h2>Marca</h2>
                        <input type="text" value="Toyota"></input>
                    </td>
                    <td>
                        <h2>Modelo</h2>
                        <input type="text" value="Corolla"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Matricula</h2>
                        <input type="text" value="SRE 8537"></input>
                    </td>
                    <td>
                        <h2>Año</h2>
                        <input type="text" value="2017"></input>
                    </td>
                </tr>
            </table>
            
        </div>

        <button onclick="window.location.href='adm_dentro_coche.php';">ATRAS</button>    
        <button>GUARDAR</button>    
    
        <br><br><br><br><br>
        <div class="footer">
            
        </div>
    </div>
</body>