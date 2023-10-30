$(document).ready(function() {

    var rut = $('#rut').val();

    getAll(rut);

    function getAll(rut) {
        $.ajax({
            url: 'obtener_todo_viajes_emp.php',
            type: 'POST',
            data: {
                rut: rut,
                res: 1
            },
            success: function(response) {
                let choferes = JSON.parse(response);
                let ret = '';
                let deuda = 0;
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    ret += `
                    <tr>
                        <td><h4>${res.fecha} </h4> <h4> ${res.hora_inicio}</h4></td> <td><h4>${res.nombre_viajero} ${res.apellido_viajero} </h4> <h4> $${res.importe}</h4></td>
                        
                    </tr>
                    <tr>
                        <td colspan="4"><hr></td>
                    </tr> 
					`
                    deuda += parseInt(res.importe);
                    $('#container_info').html(ret);
                    $('#deuda').html("$ " + deuda);
                    inpt = '<input type="hidden" id="deuda2" value="' + deuda + '">';
                    $('#rut').html(inpt);

                });

            }
        })
    }

    $('#wpp_emp').click(function() {
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