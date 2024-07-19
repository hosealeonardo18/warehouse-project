<?= $this->extend('layouts/content'); ?>
<?= $this->section('content'); ?>
<div class="container-xxl container-p-y">

    <?= view('flashdata/index') ?>
    <div class="d-flex gap-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_new_user_modal"><i class='bx bx-user-plus me-2'></i> Add User</button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#create_new_role_modal"> <i class='bx bxs-user-detail me-2'></i> Add Role</button>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table small" id="table_list_users"></table>
                </div>
            </div>
        </div>

    </div>
</div>

<?= view('master_data/users/modals/create_user_modal') ?>
<?= view('master_data/users/modals/delete_user_modal') ?>
<?= view('master_data/users/modals/edit_user_modal') ?>

<script src="<?= base_url('assets/js/master_data/users/_init.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/users/dt.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/users/delete.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/users/edit.js'); ?>"></script>
<?= $this->endSection(); ?>