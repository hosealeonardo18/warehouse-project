function deleteUser(uid, name) {
  deleteUserInputName.html(`${name}`);
  $("#delete_user_modal").modal("show");
  deleteUserForm.attr("action", `/users/${uid}/delete`);
}

// deleteUserForm.on("submit", function (event) {
//   event.preventDefault();

//   const formData = new FormData(this);
//   const method = formData.get("_method");
//   const actionUrl = deleteUserForm.attr("action");

//   $.ajax({
//     url: actionUrl,
//     type: method,
//     data: formData,
//     processData: true,
//     contentType: true,
//     success: function (response) {
//       console.log(response);
//       if (response.status === "success") {
//         // Handle success, misalnya refresh halaman atau update UI
//       } else {
//         // Handle error
//       }
//     },
//     error: function (xhr, status, error) {
//       console.error("Failed to delete user:", error);
//     },
//   });

//   deleteUserModal.hide();
// });
