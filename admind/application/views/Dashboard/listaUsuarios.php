<?php include('includes/header.php') ?>
<?php $alerta = $this->session->flashdata('alerta'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Listado</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <div class="container bg-white rounded-3 p-5 shadow-lg">
          <?php if (isset($alerta)) { ?>
            <div class="alert alert-<?php echo $alerta['color'] ?>" role="alert">
              <?php echo $alerta['mensaje']; ?>
            </div>
            <?php $this->session->set_flashdata('alerta', null); ?>
          <?php } ?>
          <?php
          $usuario = $this->session->userdata('usuario');
          if ($usuario->rol == 'admin') {
            ?>
            <!-- boton modal -->
            <div class="col d-flex justify-content-end my-1">
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                <i class="fa-solid fa-plus nav-icon"></i>
              </button>
            </div>
            <!-- boton modal -->
            <!-- /.modal -->
            <div class="modal fade" id="modal-secondary">
              <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                  <div class="modal-header">
                    <h4 class="modal-title">Agregar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container rounded-3 p-5 shadow-lg">
                      <!-- CONTENIDO -->
                      <div class="row justify-content-center">
                        <?php echo form_open(base_url('crear-usuario')); ?>
                        <div class="form-group">
                          <?php
                          echo form_label('Nombre', 'nombre');
                          $data = [
                            'name' => 'nombre',
                            'required' => true,
                            'type' => 'text',
                            'value' => '',
                            'min' => '0',
                            'class' => 'form-control',
                            'style' => 'width: 50vh'
                          ];
                          echo form_input($data);
                          ?>
                        </div>
                        <div class="form-group mt-3">
                          <?php
                          $select_option = [
                            'default' => 'rol',
                            'admin' => 'admin',
                            'cajero' => 'cajero'
                          ];
                          $data = [
                            'name' => 'rol',
                            'class' => 'bg-light border',
                            'style' => 'width: 50vh; height: 5vh'
                          ];
                          $selected_option = 'default'; // Valor que deseas seleccionar por defecto
                          echo form_dropdown('rol', $select_option, $selected_option, $data);
                          ?>
                        </div>
                        <div class="form-group">
                          <?php
                          echo form_label('Email', 'email');
                          $data = [
                            'name' => 'email',
                            'required' => true,
                            'type' => 'email',
                            'value' => '',
                            'class' => 'form-control input-lg',
                          ];
                          echo form_input($data);
                          ?>
                        </div>
                        <div class="form-group">
                          <?php
                          echo form_label('Password', 'passw');
                          $data = [
                            'name' => 'passw',
                            'required' => true,
                            'type' => 'password',
                            'value' => '',
                            'class' => 'form-control input-lg',
                          ];
                          echo form_input($data);
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <div class="d-grid gap-2 text-center">
                      <?php
                      $data_sumbit = [
                        'class' => 'btn btn-outline-light'
                      ];
                      echo form_submit('mysubmit', 'Registrar', $data_sumbit);
                      ?>
                    </div>
                  </div>
                </div>
                <?php echo form_close(); ?>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          <?php } ?>
          <!-- tabla de Usuarios -->
          <table id="example1" class="table table-bordered table-striped">
            <?php
            $usuario = $this->session->userdata('usuario');
            if ($usuario->rol == 'admin') {
              ?>
              <thead>
                <tr>
                  <th class="col-auto">Nombre</th>
                  <!-- <th class="col-auto">Password</th> -->
                  <th class="col-auto">Correo</th>
                  <th class="col-auto">Rol</th>
                  <th class="col-auto">Estado</th>
                  <th class="col-auto">Editar</th>
                  <th class="col-auto">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usuarios as $key => $usuario): ?>
                  <?php
                  $correo_login = $this->session->userdata('correo');
                  $correo_usuario = $usuario->correo;
                  if ($correo_login != $correo_usuario) {
                    ?>
                    <tr>
                      <th scope="row">
                        <?php echo $usuario->nombre ?>
                      </th>
                      <td>
                        <?php echo $usuario->correo ?>
                      </td>
                      <td>
                        <?php echo $usuario->rol ?>
                      </td>
                      <td class="text-center">
                        <?php echo ($usuario->estado == 1 ? 'Activo' : 'Inactivo'); ?>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo base_url('modificar-usuario') ?>/<?php echo $usuario->id_usuario ?>"
                          class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo base_url('eliminar-usuario') ?>/<?php echo $usuario->id_usuario ?>"
                          class="btn btn-primary"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                <?php endforeach; ?>
              </tbody>
              <?php
            } else {
              ?>
              <thead>
                <tr>
                  <th class="col-auto">Nombre</th>
                  <th class="col-auto">Correo</th>
                  <th class="col-auto">Rol</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usuarios as $key => $usuario): ?>
                  <?php
                  $correo_login = $this->session->userdata('correo');
                  $correo_usuario = $usuario->correo;
                  if ($correo_login != $correo_usuario) {
                    ?>
                    <tr>
                      <th scope="row">
                        <?php echo $usuario->nombre ?>
                      </th>
                      <td>
                        <?php echo $usuario->correo ?>
                      </td>
                      <td>
                        <?php echo $usuario->rol ?>
                      </td>
                    </tr>
                  <?php } ?>
                <?php endforeach; ?>
              </tbody>
              <?php
            }

            ?>
          </table>
          <?php echo form_close(); ?>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">

      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('includes/footer.php') ?>