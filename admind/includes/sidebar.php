<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>index.php/Dashboard/index" class=" brand-link">
        <img src="<?php echo base_url() ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema ADSO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex row text-center">
            <div class="col-12 image">
                <img src="<?php echo base_url() ?>/assets/dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2 w-25" alt="User Image">
            </div>
            <div class="col-12 info">
                <?php
                $usuario = $this->session->userdata('usuario');
                if (!empty($usuario)) {
                    $nombre_usuario = $usuario->nombre;
                    ?>
                    <a href="<?php echo base_url('perfil')?>">
                        <h4>
                            <?php echo strtoupper($nombre_usuario); ?>
                        </h4>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url('consultar-usuario') ?>" class="nav-link">
                        <i class="fa-solid fa-swatchbook nav-icon"></i>
                        <p>
                            Consultar
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <?php
                    $usuario = $this->session->userdata('usuario');
                    if ($usuario->rol == 'admin') {
                        $ruta = '/crear_usuario';
                    } else {
                        $ruta = '/vistaProtegida';
                    }
                    ?>

                    <a href="<?php echo base_url('crear-usuario') ?>" class="nav-link">
                        <i class="fa-solid fa-plus nav-icon"></i>
                        <p>
                            Registrar
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>