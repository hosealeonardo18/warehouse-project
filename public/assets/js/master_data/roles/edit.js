function editRole(id, obj) {
  const data = JSON.parse(decodeURIComponent(obj));

  editRoleItemName.val(data?.name);
  $("#edit_role_modal").modal("show");

  editRoleForm.attr("action", `/roles/${id}/update`);
}
