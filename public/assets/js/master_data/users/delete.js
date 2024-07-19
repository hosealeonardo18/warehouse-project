function deleteUser(uid, name) {
  deleteUserInputName.html(`${name}`);
  $("#delete_user_modal").modal("show");
  deleteUserForm.attr("action", `/users/${uid}/delete`);
}
