<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-3 p-5 border border-3">
    <?php include('menu.php'); ?>
    <div class="row text-center">
      <div class="col">
        <h1>Products</h1>
      </div>
    </div>
    <!-- table products -->
    <div class="row">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="col-auto">SERIAL</th>
              <th scope="col" class="col-auto">NAME</th>
              <th scope="col" class="col-auto">DESCRIPTION</th>
              <th scope="col" class="col-auto">COST</th>
              <th scope="col" class="col-auto">PRICE</th>
              <th scope="col" class="col-auto">AMOUNT</th>
              <th scope="col" class="col-auto">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $key => $product): ?>
              <tr>
                <th scope="row">
                  <?php echo $product->serial_id ?>
                </th>
                <td>
                  <?php echo $product->nombre ?>
                </td>
                <td>
                  <?php echo $product->descripcion ?>
                </td>
                <td>
                  <?php echo $product->costo ?>
                </td>
                <td>
                  <?php echo $product->precio ?>
                </td>
                <td>
                  <?php echo $product->cantidad ?>
                </td>
                <td>
                  <a href="http://127.0.0.1/actividadesphp/crud_productos/index.php/products/info/<?php echo $product->serial_id; ?>" class="btn btn-outline-info text-dark">Info</a>
                  <a href="http://127.0.0.1/actividadesphp/crud_productos/index.php/products/edit/<?php echo $product->serial_id; ?>" class="btn btn-outline-warning text-dark">Edit</a>
                  <a href="http://127.0.0.1/actividadesphp/crud_productos/index.php/products/delete/<?php echo $product->serial_id; ?>" class="btn btn-outline-danger text-dark">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- modal -->
    <?php //include("info.php") ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>