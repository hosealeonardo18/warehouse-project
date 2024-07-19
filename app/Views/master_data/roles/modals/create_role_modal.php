<div class="modal fade" id="create_new_role_modal" tabindex="-1" aria-labelledby="create_new_role_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create_new_role_modal_label">Create Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/roles') ?>" method="post" id="create_new_role_form">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control required" id="name" name="name" placeholder="Enter role name">
                        <div class="invalid-feedback">
                            Role name is required..
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='bx bx-x-circle me-2'></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-save me-2'></i>Create</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/js/functions/roles.js'); ?>"></script>