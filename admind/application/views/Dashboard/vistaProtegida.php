<?php include('includes/header.php') ?>
<?php $alerta = $this->session->flashdata('alerta'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row py-3">
            <?php if (isset($alerta)) { ?>
                <div class="alert alert-<?php echo $alerta['color'] ?>" role="alert">
                    <?php echo $alerta['mensaje']; ?>
                </div>
                <?php $this->session->set_flashdata('alerta', null); ?>
            <?php } ?>
        </div>
        <div class="row">
            <img class="mx-auto w-50 border" src="<?php echo base_url() ?>/assets/dist/img/sin-permisos.gif"
                alt="sin-permisos.gif">
        </div>
    </section>
</div>
<?php include('includes/footer.php') ?>