function editUser(uid, obj) {
  const data = JSON.parse(decodeURIComponent(obj));

  editUserInputName.val(data?.name);
  editUserInputEmail.val(data?.email);
  getRoles(editUserInputRole, data?.role_id);

  $("#edit_user_modal").modal("show");

  editUserForm.attr("action", `/users/${uid}/update`);
}
