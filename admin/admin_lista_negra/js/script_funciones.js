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
                    <tr cod="${res.pp}">
                    <td><h2 class="nombres">${res.nombre_cli} ${res.apellido_cli}</h2><div class="cont-botones"><button class="boton btnInfo" data-pp="${res.pp}">Info</button></div></td>

                </tr>
                <tr><td><hr></td></tr>
					`
                    $('#container_info').html(ret);

                });

            }
        })
    }




    $(document).on('click', '.btnInfo', function() {
        var pp = $(this).data("pp");
        window.location.href = "adm_dentro_listanegra.php?pp=" + pp;
    });

});