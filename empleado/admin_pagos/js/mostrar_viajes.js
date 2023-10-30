$(document).ready(function() {

    var cod_cliente = $('#cod_cliente').val();

    getAll(cod_cliente);

    function getAll(cod_cliente) {
        $.ajax({
            url: 'obtener_todo_viajes.php',
            type: 'POST',
            data: {
                cod_cliente: cod_cliente,
                res: 1,
            },
            success: function(response) {
                let choferes = JSON.parse(response);
                let ret = '';
                let deuda = 0;
                let inpt = '';
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    ret += `
						<tr>
							<td><h4>${res.fecha1}</h4></td> <td><h4>${res.hora_inicio}</h4></td> <td><h4>$${res.importe1}</h4></td>

						</tr>
					`
                    deuda += parseInt(res.importe1);
                    $('#container_info').html(ret);
                    $('#deuda').html("$ " + deuda);
                    inpt = '<input type="hidden" id="deuda2" value="' + deuda + '">';
                    $('#cod_cliente').html(inpt);



                });

            }
        })
    }

    $('#wpp_cli').click(function() {
        var nombre_cli = $('#nombre_cli').val();
        var deuda = $('#deuda2').val();
        var msg = "Hola " + nombre_cli + "!" + "\n" +
            "Me comunico con usted desde Remises Pocitos para recordarle que cuenta con una deuda actual de: $" + deuda + "." + "\n" +
            "Desearía abonarlo de alguna manera en especial?" + "\n" +
            "Muchas gracias! Estamos a las ordenes.";
        var tel = "+598" + $("#telefono").val();
        console.log(tel);

        var url = "whatsapp://send?text=" + encodeURIComponent(msg) + "&phone=" + encodeURIComponent(tel);

        window.open(url);
    });
});