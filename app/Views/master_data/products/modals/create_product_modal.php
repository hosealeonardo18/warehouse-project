<div class="modal fade" id="create_new_product_modal" tabindex="-1" aria-labelledby="create_new_product_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create_new_product_modal_label">Create Warehouse</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/products') ?>" method="post" id="create_new_product_form">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control required" id="name" name="name" placeholder="Enter role name">
                        <div class="invalid-feedback">
                            Product name is required..
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Qty <span style="color: red;">*</span></label>
                        <input type="number" class="form-control required" min=0 id="create_new_product_item_qty" name="qty" placeholder="Enter value qty">
                        <div class="invalid-feedback">
                            Qty is required min value 0
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pj_user" class="form-label">Warehouse <span style="color: red;">*</span></label>
                        <select type="text" class="form-select required" id="create_new_product_list_warehouse" name="warehouse_uid"></select>
                        <div class="invalid-feedback">
                            Warehouse name is required..
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

<script src="<?= base_url('assets/js/functions/warehouses.js'); ?>"></script>
<script src="<?= base_url('assets/js/master_data/products/create.js'); ?>"></script>