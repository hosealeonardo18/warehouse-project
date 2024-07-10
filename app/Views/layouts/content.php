<?= $this->extend('layouts/main'); ?>
<?= $this->section('body'); ?>

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?= $this->include('partials/sidebar'); ?>

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <?= $this->include('partials/topbar'); ?>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <?= $this->renderSection('content'); ?>
            </div>

            <?= $this->include('partials/footer'); ?>

            <div class="content-backdrop fade"></div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</div>


<?= $this->endSection(); ?>