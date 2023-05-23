<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comisiones</title>
</head>
<body>
    <a href="index.php"><input type="button" value="INICIO"></a>
    <form action="" method = "post">
        <h1>Comisiones por ventas</h1>
        <input placeholder= "Valor de la venta" type="number" name= "valor">
        <select name="precios" id="">
            <option value="precioUno">Precio 1</option>  <!--  -->
            <option value="precioDos">Precio 2</option>
        </select>
        <input type="submit" value= "Calcular" name= "submit">
    </form>
</body>
</html>

<?php

    if (isset($_REQUEST['submit'])) {

        $valor = $_REQUEST['valor'];
        $precio = $_REQUEST['precios'];

        if ($valor >= 10000000 && $precio == 'precioDos') {
            $comision = $valor * 0.1; 
        } else if ($valor >= 10000000 && $precio == 'precioUno') { 
            $comision = $valor * 0.04;
        } else if ($valor < 10000000 && $precio == 'precioDos') { 
            $comision = $valor * 0.02;
        } else if ($valor < 10000000 && $precio == 'precioUno') { 
            $comision = $valor * 0.01;
        } else {
            $comision = 0;
        }
    
        echo "La comision es de: ",$comision;
    }

?>
