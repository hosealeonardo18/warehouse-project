<div class="modal fade" id="delete_role_modal" tabindex="-1" aria-labelledby="delete_role_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" id="delete_role_form">
            <input type="hidden" id="_method" name="_method" value="DELETE">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Delete Role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <span>Are you sure you want to delete <strong id="delete_role_item_name" class="text-danger"></strong>?</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>