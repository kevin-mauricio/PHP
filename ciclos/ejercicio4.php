<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>
<body>
    <button><a href="index.php">Inicio</a></button>
    <h1>Tienda: Registro de ventas</h1>
    <?php 
        $clienteMonto = [];
        $contadorClientes = 1;
            echo '<form action="" method="post">
                <h2>Cliente '.$contadorClientes.'</h2>
                <label for="monto">Monto total compra</label>
                <input type="number" id="monto" name="monto" step="0.1">
                <input type="submit" value="Siguiente" name="btn_siguiente">
                <br>
                <p>Finalizar día solo si no hay más clinetes por registrar</p>
                <input type="submit" value="Finalizar dia" name="btn_finDia">
            </form>';
            if (isset($_REQUEST['btn_siguiente'])) {
                $contadorClientes++;
                
            }
    ?>

    
</body>
</html>