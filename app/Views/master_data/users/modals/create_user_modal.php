<div class="modal fade" id="create_new_user_modal" tabindex="-1" aria-labelledby="create_new_user_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create_new_user_modal_label">Create User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/users') ?>" method="post" id="create_user_form">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Fullname <span style="color: red;">*</span></label>
                        <input type="text" class="form-control required" id="name" name="name" placeholder="Enter your Fullname">
                        <div class="invalid-feedback">
                            Fullname is required..
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control required" id="email" name="email" placeholder="Enter your valid Email">
                        <div class="invalid-feedback">
                            Email is required.
                        </div>
                    </div>

                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password <span style="color: red;">*</span></label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control required" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        <div class="invalid-feedback">
                            Password is required.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role <span style="color: red;">*</span></label>
                        <select type="email" class="form-control  required" placeholder="-- Select Role --" id="select_all_role" name="role"></select>
                        <div class="invalid-feedback">
                            Role is required.
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
<script src="<?= base_url('assets/js/master_data/users/create_user.js'); ?>"></script>