<?= $this->extend('layouts/content'); ?>
<?= $this->section('content'); ?>
<div class="container-xxl container-p-y">
    <?= view('flashdata/index') ?>
    <div class="d-flex gap-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_new_role_modal"> <i class='bx bxs-user-detail me-2'></i> Add Role</button>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table small" id="table_list_roles"></table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= view('master_data/roles/modals/create_role_modal') ?>
<?= view('master_data/roles/modals/delete_role_modal') ?>
<?= view('master_data/roles/modals/edit_role_modal') ?>

<script src="<?= base_url('assets/js/master_data/roles/_init.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/roles/dt.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/roles/create.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/roles/delete.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/roles/edit.js'); ?>"></script>
<?= $this->endSection(); ?>