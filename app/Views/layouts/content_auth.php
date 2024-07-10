<?= $this->extend('layouts/main'); ?>

<?= $this->section('body_auth'); ?>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <?= $this->renderSection('content_auth'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>