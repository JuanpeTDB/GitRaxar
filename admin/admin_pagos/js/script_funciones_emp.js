$(document).ready(function() {

    getAll();

    function getAll() {
        $.ajax({
            url: 'obtener_todo_emp.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response) {
                let choferes = JSON.parse(response);
                let ret = '';
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    ret += `
						<tr cod="${res.rut}">
							<td><h2 class="nombres">${res.nombre_empresa}</h2><div class="cont-botones"><button class="boton btnInfo" data-rut="${res.rut}">Info</button></div></td>

						</tr>
                        <tr><td><hr></td></tr>
					`
                    $('#container_info').html(ret);

                });

            }
        })
    }

    $(document).on('click', '.btnInfo', function() {
        var rut = $(this).data("rut");
        window.location.href = "adm_dentro_pago_empr.php?rut=" + rut;
    });

});