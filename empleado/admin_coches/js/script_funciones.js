$(document).ready(function() {

    getAll();

    function getAll() {
        $.ajax({
            url: 'obtener_todo.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response) {
                let coches = JSON.parse(response);
                let ret = '';
                console.log(JSON.parse(response));
                coches.forEach(res => {
                    ret += `
						<tr cod="${res.matricula}">
							<td><h2 class="nombres">${res.marca} ${res.modelo} - ${res.matricula} - ${res.anio} </h2></td>

						</tr>
                        <tr><td><hr></td></tr>
					`
                    $('#container_info').html(ret);

                });

            }
        })
    }

});