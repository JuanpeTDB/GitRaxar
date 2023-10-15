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
                        <td><h4>${res.fecha}</h4></td> <td><h4>${res.hora_inicio}</h4></td> <td><h4>${res.nombre_viajero} ${res.apellido_viajero}</h4></td> <td><h4>$${res.importe}</h4></td>

                    </tr>
					`

                    deuda += parseInt(res.importe);
                    $('#deuda').html("$ " + deuda);
                    $('#container_info').html(ret);

                });

            }
        })
    }

    $(document).on('click', '.btnInfo', function() {
        var rut = $(this).data("rut");
        window.location.href = "adm_dentro_pago_cli.php?rut=" + rut;
    });

});