function deleteRole(uid, name) {
  deleteRoleItemName.html(`${name}`);
  $("#delete_role_modal").modal("show");
  deleteRoleForm.attr("action", `/roles/${uid}/delete`);
}
