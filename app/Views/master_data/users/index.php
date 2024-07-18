<?= $this->extend('layouts/content'); ?>
<?= $this->section('content'); ?>
<div class="container-xxl container-p-y">
    <button class="btn btn-primary"><i class='bx bx-user-plus me-2'></i> Add User</button>

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

<script src="<?= base_url('assets/js/master_data/users/_init.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/users/dt.js'); ?>"></script>
<?= $this->endSection(); ?>