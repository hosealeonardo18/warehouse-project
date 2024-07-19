createNewRoleForm.addEventListener("submit", function (e) {
  let isValid = true;
  const requiredFields = createNewRoleForm.querySelectorAll(".required");

  requiredFields.forEach((field) => {
    if (!field.value.trim()) {
      isValid = false;
      field.classList.add("is-invalid");
    } else {
      field.classList.remove("is-invalid");
    }
  });

  if (!isValid) {
    e.preventDefault();
    e.stopPropagation();
  } else {
    // Disable the submit button and show loading text
    const submitButton = createNewRoleForm.querySelector(
      'button[type="submit"]'
    );
    submitButton.disabled = true;
    submitButton.innerHTML =
      '<div class="spinner-border text-dark spinner-border-sm me-2" role="status" aria-hidden="true"></div> <span class="visually">Loading...</span>';
  }
});
