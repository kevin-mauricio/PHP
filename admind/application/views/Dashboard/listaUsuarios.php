<?php include('includes/header.php') ?>

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
          <!--           <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button> -->
        </div>
      </div>
      <div class="card-body">
        <!-- tabla de Usuarios -->
        <div class="container bg-white rounded-3 p-5 shadow-lg">
          <table id="example1" class="table table-bordered table-striped">
            <?php
            $usuario = $this->session->userdata('usuario');
            if ($usuario->rol == 'admin') {
              ?>
              <thead>
                <tr>
                  <th class="col-auto">Nombre</th>
                  <th class="col-auto">Password</th>
                  <th class="col-auto">Correo</th>
                  <th class="col-auto">Rol</th>
                  <th class="col-auto">Editar</th>
                  <th class="col-auto">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usuarios as $key => $usuario): ?>
                  <tr>
                    <th scope="row">
                      <?php echo $usuario->nombre ?>
                    </th>
                    <td>
                      <input type="password" name="" id="" value="<?php echo $usuario->passw ?>">
                    </td>
                    <td>
                      <?php echo $usuario->correo ?>
                    </td>
                    <td>
                      <?php echo $usuario->rol ?>
                    </td>
                    <td>
                      <a href="<?php echo base_url() ?>index.php/Dashboard/modificar_usuario/<?php echo $usuario->id_usuario ?>"
                        class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                    </td>
                    <td>
                      <a href="/crud_usuarios_login/index.php/Usuarios/borrar_usuario/<?php echo $usuario->id_usuario ?>"
                        class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
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

<?php include('includes/footer.php')?>