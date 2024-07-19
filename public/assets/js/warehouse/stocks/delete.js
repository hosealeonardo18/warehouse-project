function deleteStockRequest(uid, name) {
  deleteStockRequestItemName.html(`${name}`);
  $("#delete_stock_request_modal").modal("show");
  deleteStockRequestForm.attr("action", `/stock-request/${uid}/delete`);
}
