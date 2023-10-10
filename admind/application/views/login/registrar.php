<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet'
    type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/registrarse/styles.css">

<div class="testbox">
    <?php
    $alert = $this->session->flashdata('alert');
    if (!empty($alert)) {
        ?>
        <div class="alert alert-<?php echo $alert['color']; ?>" role="alert">
            <?php echo $alert['mensaje']; ?>
        </div>
        <?php
    }
    ?>
    <h1>Registrarse</h1>
    <!-- FORMULARIO DE REGISTRO -->
    <?php echo form_open("Registrar/crearUsuario") ?>
    <div class="formulario">
        <hr>
        <div class="accounttype">
            <input type="radio" value="None" id="radioOne" name="account" checked />
            <label for="radioOne" class="radio" chec>Personal</label>
            <input type="radio" value="None" id="radioTwo" name="account" />
            <label for="radioTwo" class="radio">Empresa</label>
        </div>
        <hr>
        <!-- Email input -->
        <?php
        $attributes = array(
            'id' => 'icon',
        );
        echo form_label('<i class="icon-envelope "></i>', 'email', $attributes);
        $data = [
            'name' => 'email',
            'id' => 'email',
            'required' => true,
            'type' => 'email',
            'placeholder' => 'Email',
            'class' => 'estilos-input'
        ];
        echo form_input($data);
        ?>
        <!-- Name input -->
        <?php
        $attributes = array(
            'id' => 'icon',
        );
        echo form_label('<i class="icon-user"></i>', 'name', $attributes);
        $data = [
            'name' => 'name',
            'id' => 'name',
            'required' => true,
            'type' => 'text',
            'placeholder' => 'Nombre',
            'class' => 'estilos-input'
        ];
        echo form_input($data);
        ?>
        <!-- Password input -->
        <?php
        $attributes = array(
            'id' => 'icon',
        );
        echo form_label('<i class="icon-shield"></i>', 'pass', $attributes);
        $data = [
            'name' => 'pass',
            'id' => 'pass',
            'required' => true,
            'type' => 'password',
            'placeholder' => 'Contraseña',
            'class' => 'estilos-input'
        ];
        echo form_input($data);
        ?>
        <div class="gender">
            <input type="radio" value="None" id="male" name="gender" checked />
            <label for="male" class="radio" chec>Male</label>
            <input type="radio" value="None" id="female" name="gender" />
            <label for="female" class="radio">Female</label>
        </div>
        <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>

        <?php
        $attributes = array(
            'class' => 'button',
        );
        echo form_submit('mysubmit', 'Registrarse', $attributes);
        ?>
    </div>
    <?php echo form_close() ?>
</div>