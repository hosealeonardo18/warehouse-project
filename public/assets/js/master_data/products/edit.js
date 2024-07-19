function editProduct(uid, obj) {
  const data = JSON.parse(decodeURIComponent(obj));

  editProductItemName.val(data?.name);
  getWarehouses(editProductItemWarehouse, data?.warehouse_uid);
  editProductItemQty.val(data?.qty);

  $("#edit_product_modal").modal("show");

  editProductForm.attr("action", `/products/${uid}/update`);
}
