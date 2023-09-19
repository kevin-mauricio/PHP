<?php include('./includes/menu.php'); ?>

<div class="container pt-3">
    <div class="row">
        <div class="col text-center">
            <h1>Create Acount</h1>
        </div>
    </div>
    <!-- form -->
    <div class="row">
        <div class="col-5 mx-auto">
            <?php
            $alert = $this->session->flashdata('alert');
            if (!empty($alert)) {
                ?>
                <div class="alert alert-<?php echo $alert['color']; ?>" role="alert">
                    <?php echo $alert['message']; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="row">
        <?php echo form_open(''); ?>
        <div class="col-5 border rounded-4 mx-auto p-5">
            <div class="form-group">
                <?php
                echo form_label('Name', 'name');

                $data = [
                    'id' => 'name',
                    'name' => 'name',
                    'required' => true,
                    'class' => 'form-control input-lg',
                ];
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Email', 'email');

                $data = [
                    'id' => 'email',
                    'name' => 'email',
                    'required' => true,
                    'type' => 'email',
                    'class' => 'form-control input-lg',
                ];
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Password', 'passw');

                $data = [
                    'id' => 'passw',
                    'name' => 'passw',
                    'required' => true,
                    'type' => 'password',
                    'class' => 'form-control input-lg',
                ];
                echo form_input($data);
                ?>
            </div>
            <div class="col text-center mt-3">
                <?php
                echo form_submit('mysubmit', 'NEXT', 'class="btn btn-dark w-100"');
                ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>