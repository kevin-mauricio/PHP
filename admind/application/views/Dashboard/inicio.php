<?php include('includes/header.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php $alerta = $this->session->flashdata('alerta');
        if (isset($alerta)) { ?>
            <div class="alert alert-<?php echo $alerta['color'] ?>" role="alert">
                <?php echo $alerta['mensaje']; ?>
            </div>
        <?php } ?>
        <div class="row py-3">
            <div class="col text-center">
                <h2>Inicio</h2>
            </div>
        </div>
        <div class="row">
            <img class="mx-auto w-50 border" src="<?php echo base_url() ?>/assets/dist/img/sin-permisos.gif"
                alt="sin-permisos.gif">
        </div>
    </section>
</div>
<?php include('includes/footer.php') ?>