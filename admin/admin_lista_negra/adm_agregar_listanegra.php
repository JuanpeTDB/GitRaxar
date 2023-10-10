<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agregar_listanegra.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>
<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_listanegra.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1>LISTA NEGRA</h1>
    <form action="agregar_listanegra.php" id="LN" method="POST">
        <table>
            <tr>
                <td>
                    <h2>Nombre cliente</h2>
                    <input name="nombre_cliente" type="text"></input>
                </td>
                <td>
                    <h2>Apellido cliente</h2>
                    <input name="apellido_cliente" type="text"></input>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h2>Motivo</h2>
                    <input name="comentario" type="text"></input>
                </td>
            </tr>

        </table>

        <br>
        <br>
    </form>
        <div>
            <button id="btnGuardar">GUARDAR</button>
        </div>
       
    </div>
    
    <br><br><br>
    <div class="footer">
		
    </div>
</body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#btnGuardar").click(function() {
            $("#LN").submit();
            window.history.back();
        });
</script>
</html>