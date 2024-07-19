const getRoles = (attribute, selectValue = null) => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "/helper/get/roles",
      success: function (response) {
        if (response.error === 0) {
          let data = response.data;
          attribute.html("");
          attribute.append('<option value=""--Select Roles</option>');

          data.forEach((elm) => {
            let newElm = `<option value="${elm.id}" ${
              elm.id === Number(selectValue) ? "selected" : ""
            }>${elm.name}</option>`;

            attribute.append(newElm);
          });
          resolve();
        } else {
          reject(alert("Something went wrong, try again later!"));
        }
      },
      error: (response) => {
        reject(alert("Something went wrong, try again later!"));
      },
    });
  });
};
