<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_pago.css">
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
        <a href="adm_pagos_empr.php" class="btnatras" id="btnAtras">ATRAS</a>
	</header>
    <div class="contenedor">
    
        <h1>AGREGAR EMPRESA</h1>

        <form action="agregar_empr.php" method="POST" id="agregarForm">
        <div class="cont2">
            <table>
                <tr>
                    <td>
                        <h2>Nombre</h2>
                        <input name="nombre_empresa" type="text"></input>
                    </td>
                    <td>
                        <h2>Razon Social</h2>
                        <input name="razon_social" type="text"></input>
                    </td>
                    <td>
                        <h2>Rut</h2>
                        <input name="rut" type="number"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Nombre de Encargado</h2>
                        <input name="nombre_cli" type="text"></input>
                    </td>
                    <td>
                        <h2>Apellido de Encargado</h2>
                        <input name="apellido_cli" type="text"></input>
                    </td>
                    <td>
                        <h2>Numero de telefono</h2>
                        <input id="tel" name="telefono" type="number"></input> <button type="button" id="btnTel">+</button>
                        <input id="tel2" name="telefono2" type="number"></input> <button type="button" id="btnTel2">-</button>
                    </td>
                </tr>
            </table> 
        </div>

        <button id="btnGuardar" onclick="window.location.href='adm_pagos_cli.php';">GUARDAR</button>    
        </form>
        
    </div>
    <br><br>
        <div class="footer">
            
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script_funciones.js"></script>
    <script>
        $("#btnTel").click(function(event) {
            event.preventDefault();
            $("#tel2").css("display", "inline");
            $("#btnTel2").css("display", "inline");
        });
        $("#btnTel2").click(function(event) {
            event.preventDefault();
            $("#tel2").hide();
            $("#btnTel2").hide();
        });
        ("#btnGuardar").click(function() {
            var camposVacios = false;
            $("input[type='text'], input[type='time'], input[type='date']").each(function() {
                if ($(this).val() === "") {
                    camposVacios = true;
                    return false;
                }
            });

            if (camposVacios) {
                alert("Por favor, complete todos los campos antes de guardar");
            } else {
                $("#agendar").submit();
            }
        });
        $("#btnAtras").click(function() {
            if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
                window.history.back();
            }
        });
    </script>
</body>
</html>