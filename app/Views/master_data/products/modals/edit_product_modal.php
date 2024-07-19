<div class="modal fade" id="edit_product_modal" tabindex="-1" aria-labelledby="edit_product_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edit_product_modal_label">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit_product_form">
                <input type="hidden" name="_method" value="PUT">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_product_item_name_product" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="edit_product_item_name_product" class="form-label">Qty</label>
                        <input type="number" min=0 class="form-control" id="edit_product_item_qty_product" name="qty">
                    </div>

                    <div class="mb-3">
                        <label for="edit_product_item_warehouse_name_product" class="form-label">Warehouse</label>
                        <select class="form-select" id="edit_product_item_warehouse_name_product" name="warehouse_uid"></select>
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