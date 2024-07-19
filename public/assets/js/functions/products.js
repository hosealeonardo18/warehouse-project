const getProduct = (attribute, selectValue = null) => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "/helper/get/products",
      success: function (response) {
        if (response.error === 0) {
          let data = response.data;
          attribute.html("");
          attribute.append('<option value=""--Select Product</option>');

          data.forEach((elm) => {
            let newElm = `<option value="${elm.uid}" ${
              elm.uid == selectValue ? "selected" : ""
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
