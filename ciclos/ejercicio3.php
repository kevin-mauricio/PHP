<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
<body>
    <button><a href="index.php">Inicio</a></button>
    <h1>Tabla de Multiplicar</h1>
    <?php
            $formulario = '<form action="" method="post">
                <label for="multiplicando">Ingrese el número de la tabla</label>
                <input type="number" id="multiplicando" name="multiplicando">
                <br>
                <label for="multiplicador">Ingrese hasta que número calcular la tabla</label>
                <input type="number" id="multiplicador" name="multiplicador">
                <br>
                <input type="submit" value="calcular" name="calcular">
            </form>';
        if(empty($_REQUEST)) {
            echo $formulario;
        } else if (isset($_REQUEST['multiplicando']) && isset($_REQUEST['multiplicador']) && isset($_REQUEST['calcular'])) {
            echo $formulario;
            $multiplicando = $_REQUEST['multiplicando'];
            $multiplicador = $_REQUEST['multiplicador'];
            for($i = 1; $i <= $multiplicador; $i++) {
                $producto = $multiplicando * $i;
                echo '<p>'."$multiplicando x $i = $producto".'</p>';
            }
        } else {
            
        }
    ?>

</body>
</html>