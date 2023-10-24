
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
    $query = "SELECT *,  DATE_FORMAT(p.fecha_LN, '%d-%m-%Y') AS fecha
    FROM particular p
    INNER JOIN cliente c ON p.cod_cliente = c.cod_cliente
    WHERE p.cod_cliente = $pp";
    $result = mysqli_query($conn, $query);
    $json = array();
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $nombre = $row['nombre_cli'];
            $apellido = $row['apellido_cli'];
            $estado = $row['estado'];
            $comentario = $row['comentario_chofer']; 
            $cod_cliente = $row['cod_cliente'];
            $fecha = $row['fecha'];
         }
    }

?>

    <header>
    <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_listanegra.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <input type="hidden" id="cod_cliente" value="<?php echo $cod_cliente?>">
        <h1><?php echo $nombre?> <?php echo $apellido?></h1>
        

            <table>
                <tr>
                    <td><h2 class="subt">Fecha</h2></td>
                </tr>
                <tr>
                    <td><h3><?php echo $fecha?></h3></td>
                </tr>
                <tr>
                    <td><h2 class="subt">Motivo</h2></td>
                </tr>
                <tr>
                    <td><h3><?php echo $comentario?></h3></td>
                </tr>
            </table>

        <br><br>
    
    
        

    </div>
    <br><br><br><br><br>
    <div class="footer">
        
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


</html>