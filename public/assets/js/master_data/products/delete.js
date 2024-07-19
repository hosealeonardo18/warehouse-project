function deleteProduct(uid, name) {
  deleteProductItemName.html(`${name}`);
  $("#delete_product_modal").modal("show");
  deleteProductForm.attr("action", `/products/${uid}/delete`);
}
