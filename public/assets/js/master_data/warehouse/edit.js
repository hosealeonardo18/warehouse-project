function editWarehouse(uid, obj) {
  const data = JSON.parse(decodeURIComponent(obj));

  editWarehouseItemName.val(data?.name);
  getUsers(editWarehouseItemSelectPjName, data?.pj_user_uid);
  $("#edit_warehouse_modal").modal("show");

  editWarehouseForm.attr("action", `/warehouses/${uid}/update`);
}
