<div class="modal fade" id="edit_warehouse_modal" tabindex="-1" aria-labelledby="edit_warehouse_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edit_warehouse_modal_label">Edit Warehouse</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit_warehouse_form">
                <input type="hidden" name="_method" value="PUT">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_warehouse_item_name_warehouse" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Penanggung Jawab</label>
                        <select class="form-select" id="edit_warehouse_item_pj_name_warehouse" name="pj_user_uid"></select>
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