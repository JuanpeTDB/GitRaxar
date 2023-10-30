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
                let choferes = JSON.parse(response);
                let ret = '';
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    let de_la_casa = '';
                    if (res.de_la_casa == 1) {
                        de_la_casa = ' 🏠';
                    }
                    ret += `
                        <tr cod="${res.ci}">
                            <td>
                                <h2 class="nombres">${res.nombre} ${res.apellido}${de_la_casa}</h2>
                                <div class="cont-botones">
                                    <button class="boton btnInfo" data-ci="${res.ci}">Info</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><hr></td>
                        </tr>
                    `;
                });
                $('#container_info').html(ret);
            }
        });
    }

    $(document).on('click', '.btnInfo', function() {
        var ci = $(this).data("ci");
        window.location.href = "adm_dentro_chofer.php?ci=" + ci;
    });

});