function deleteWarehouse(uid, name) {
  deleteWarehouseItemName.html(`${name}`);
  $("#delete_warehouse_modal").modal("show");
  deleteWarehouseForm.attr("action", `/warehouses/${uid}/delete`);
}
