<?= $this->extend('layouts/content'); ?>
<?= $this->section('content'); ?>
<div class="container-xxl container-p-y">
    <?= view('flashdata/index') ?>

    <div class="d-flex gap-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_new_purchase_request_modal"><i class='bx bx-plus me-2'></i> Purchase Request</button>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table small" id="table_list_purchase_request"></table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= view('master_data/products/modals/create_product_modal') ?>
<?= view('master_data/products/modals/delete_product_modal') ?>
<?= view('master_data/products/modals/edit_product_modal') ?>

<script src="<?= base_url('assets/js/master_data/products/_init.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/products/dt.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/products/delete.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/products/edit.js'); ?>"></script>
<?= $this->endSection(); ?>