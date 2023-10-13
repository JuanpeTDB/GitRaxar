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
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    ret += `
						<tr>
							<td><h4>${res.fecha1}</h4></td> <td><h4>$${res.importe1}</h4></td>

						</tr>
					`
                    deuda += parseInt(res.importe1);
                    $('#container_info').html(ret);
                    $('#deuda').html("$ " + deuda);

                });

            }
        })
    }
});