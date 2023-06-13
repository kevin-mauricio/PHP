<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
</head>
<body>
    <button><a href="index.php">Inicio</a></button>
    <h1>Pizzeria ADSO</h1>
    <p>Las mejores pizzas de Pereira</p>
    <form action="" method="post">
        <h2>Pedidos</h2>
        <label for="">¿Cuántas pizzas?</label>
        <input type="number" name="cantidadPizzas" id="">
        <input type="submit" value="Siguiente" name="siguiente">
    </form>
    <?php 
    if(isset($_POST['siguiente'])) {
        $cantidadPizzas = $_POST['cantidadPizzas'];
        ?>
        <form action="" method="post">
            <h2>Elegir ingredientes</h2>
            <?php
            for ($i=1; $i <= $cantidadPizzas; $i++) { 
                ?>
                <h3>Pizza <?php echo $i; ?></h3>
                <p>Viene con salsa y carne</p>
                <select name="tamaño[]" id="">
                    <option value="">tamaño</option>
                    <option value="pequeña">pequeña</option>
                    <option value="mediana">mediana</option>
                    <option value="grande">grande</option>
                </select>
                <br>
                <input type="checkbox" name="pepinillos" value="pepinillos" id="pepinillos">
                <label for="pepinillos">pepinillos</label>
                <?php
            }
            ?> 
        </form>
        <?php
    } ?>
    
</body>
</html>