<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPP</title>

</head>

<body>
    <input type="text" id="mensaje" placeholder="Mensaje">
    <input type="text" id="number" placeholder="Numero">
    <button id="btnContinuar">Enviar</button>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    var fecha = "fecha";
    var hora = "hora";
    var origen = "origen";
    var destino = "destino";
    var nombre_viajero = "nombre_viajero";
    var apellido_viajero = "apellido_viajero";
    var MP = "MP";
    var importe = "importe";


    var msg = "Viaje: " + fecha + " Hora: " + hora + " hs\n" +
        "Origen: " + origen + "\n" +
        "Destino: " + destino + "\n" +
        "Cliente: " + nombre_viajero + " " + apellido_viajero + "\n" +
        "Forma de pago: " + MP + "\n" +
        "Importe: " + importe;

    if (wpp == true) {
        $(document).ready(function () {
            $('#btnContinuar').click(function () {
                var message = msg;
                var number = $('#number').val();

                var url = "whatsapp://send?text=" + encodeURIComponent(message) + "&phone=" + encodeURIComponent(number);

                window.open(url);
            });
        });
    }
</script>

</html>