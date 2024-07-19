<?= $this->extend('layouts/content'); ?>
<?= $this->section('content'); ?>
<div class="container-xxl container-p-y">
    <?= view('flashdata/index') ?>

    <div class="d-flex gap-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_new_stock_request_modal"><i class='bx bx-plus me-2'></i> Stock Request</button>

        <?php if (session()->get('user.role') == "Admin") : ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approval_list_modal"><i class='bx bx-check-shield me-2'></i> Need Approval</button>
        <?php endif ?>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table small" id="table_list_stock_request"></table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= view('warehouse/stock/modals/create_stock_request_modal') ?>
<?= view('warehouse/stock/modals/delete_stock_request') ?>

<script src="<?= base_url('assets/js/warehouse/stocks/_init.js'); ?>"></script>
<script src="<?= base_url('assets/js/warehouse/stocks/dt.js'); ?>"></script>
<script src="<?= base_url('assets/js/warehouse/stocks/delete.js'); ?>"></script>
<?= $this->endSection(); ?>