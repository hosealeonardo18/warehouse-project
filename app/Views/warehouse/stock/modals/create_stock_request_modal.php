<div class="modal fade" id="create_new_stock_request_modal" tabindex="-1" aria-labelledby="create_new_stock_request_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create_new_stock_request_modal_label">Create Stock Request</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/stock-request') ?>" method="post" id="create_new_stock_request_form">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create_new_stock_request_list_Product" class="form-label">Product <span style="color: red;">*</span></label>
                        <select type="text" class="form-select required" id="create_new_stock_request_list_Product" name="product_uid"></select>
                        <div class="invalid-feedback">
                            Product name is required..
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="create_new_stock_request_item_qty" class="form-label">Qty <span style="color: red;">*</span></label>
                        <input type="number" class="form-control required" min=0 id="create_new_stock_request_item_qty" name="qty" placeholder="Enter value qty">
                        <div class="invalid-feedback">
                            Qty is required min value 0
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

<script src="<?= base_url('assets/js/functions/products.js'); ?>"></script>
<script src="<?= base_url('assets/js/warehouse/stocks/create.js'); ?>"></script>