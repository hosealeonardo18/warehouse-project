<?= $this->extend('layouts/content'); ?>
<?= $this->section('content'); ?>
<div class="container-xxl container-p-y">
    <?= view('flashdata/index') ?>

    <div class="d-flex gap-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_new_warehouse_modal"> <i class='bx bxs-user-detail me-2'></i> Add Warehouse</button>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table small" id="table_list_warehouse"></table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= view('master_data/warehouse/modals/create_warehouse_modal') ?>
<?= view('master_data/warehouse/modals/delete_warehouse_modal') ?>
<?= view('master_data/warehouse/modals/edit_warehouse_modal') ?>

<script src="<?= base_url('assets/js/master_data/warehouse/_init.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/warehouse/dt.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/warehouse/delete.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/warehouse/edit.js'); ?>"></script>
<?= $this->endSection(); ?>