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
                <h1>Info Product</h1>
            </div>
        </div>
        <!-- form -->
        <div class="row">
            <?php echo form_open(''); ?>
            <div class="col-8 mx-auto">
                <div class="form-group">
                    <?php
                    echo form_label('Name', 'name');

                    $data = [
                        'id' => 'name',
                        'name' => 'name',
                        'value' => $name,
                        'disabled' => true,
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Description', 'description');

                    $data = [
                        'id' => 'description',
                        'name' => 'description',
                        'value' => $description,
                        'disabled' => true,
                        'required' => true,                
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Cost', 'cost');

                    $data = [
                        'id' => 'cost',
                        'name' => 'cost',
                        'value' => $cost,
                        'disabled' => true,
                        'required' => true,
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Price', 'price');

                    $data = [
                        'id' => 'price',
                        'name' => 'price',
                        'value' => $price,
                        'disabled' => true,
                        'required' => true,
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Amount', 'amount');

                    $data = [
                        'id' => 'amount',
                        'name' => 'amount',
                        'value' => $amount,
                        'disabled' => true,
                        'required' => true,
                        'class' => 'form-control input-lg',
                    ];
                    echo form_input($data);
                    ?>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
</body>

</html>