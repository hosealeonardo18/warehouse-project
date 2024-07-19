<div class="modal fade" id="edit_user_modal" tabindex="-1" aria-labelledby="edit_user_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edit_user_modal_label">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit_user_form">
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Fullname</label>
                        <input type="text" class="form-control required" id="edit_input_name" name="name" placeholder="Enter your Fullname">
                        <div class="invalid-feedback">
                            Fullname is required..
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">EmaiL</label>
                        <input type="email" class="form-control required" id="edit_input_email" name="email" placeholder="Enter your valid Email">
                        <div class="invalid-feedback">
                            Email is required.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select type="email" class="form-control  required" placeholder="-- Select Role --" id="edit_input_select_role" name="role_id"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class='bx bx-x-circle me-2'></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-save me-2'></i>Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>