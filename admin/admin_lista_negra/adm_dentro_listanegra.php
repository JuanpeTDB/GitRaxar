
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_listanegra.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

<?php
    require_once '../../conexion.php';
    $pp = $_GET['pp'];
    $query = "SELECT *
    FROM particular p
    INNER JOIN cliente c ON p.cod_cliente = c.cod_cliente
    WHERE p.cod_cliente = $pp";
    $result = mysqli_query($conn, $query);
    $json = array();
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $nombre = $row['nombre_cli'];
            $apellido = $row['apellido_cli'];
            $ci = $row['ci'];
            $estado = $row['estado'];
            $comentario = $row['comentario_chofer']; 
            $cod_cliente = $row['cod_cliente'];
            $fecha = $row['fecha_LN'];
         }
    }

?>

    <header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_listanegra.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <input type="hidden" id="cod_cliente" value="<?php echo $cod_cliente?>">
        <h1><?php echo $nombre?> <?php echo $apellido?></h1>
        

            <table>
                <tr>
                    <td><h2>Fecha</h2></td>
                </tr>
                <tr>
                    <td><h3><?php echo $fecha?></h3></td>
                </tr>
                <tr>
                    <td><h2>Motivo</h2></td>
                </tr>
                <tr>
                    <td><h3><?php echo $comentario?></h3></td>
                </tr>
            </table>

        <br><br>

        <button class="boton" id="btnEliminar"> ELIMINAR </button>
    
    
        

    </div>
    <br><br><br><br><br>
    <div class="footer">
        
    </div>


</body>

<script>
    $(document).ready(function(){
        $('#btnEliminar').click(function(){
            var cod_cliente = $('#cod_cliente').val();
            $.ajax({
                type: "POST",
                url: "eliminar.php",
                cod_cliente: cod_cliente,
                success: function(r){
                    if(r==1){
                        alert("Eliminado con exito");
                    }else{
                        alert("Fallo el server");
                    }
                }
            });
        });
    });
</script>

</html>