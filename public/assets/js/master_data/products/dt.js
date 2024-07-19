$(document).ready(function () {
  tableListProduct.DataTable({
    ajax: {
      url: "/datatables/products",
      type: "GET",
    },
    processing: true,
    serverSide: true,
    pageLength: 5,
    lengthMenu: [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, 100, "All"],
    ],
    columns: [
      {
        title: "Name",
        data: "name",
        sortable: true,
        render: function (data, type, row) {
          return `<span class="text-uppercase">${data}</span>`;
        },
      },
      {
        title: "QTY",
        data: "qty",
        sortable: true,
        render: function (data, type, row) {
          let badge = "";

          if (data > 0 && data <= 5) {
            badge = "bg-success";
          } else if (data > 5) {
            badge = "bg-primary";
          } else {
            badge = "bg-danger";
          }

          return `<span class="badge ${badge} text-uppercase">${data}</span>`;
        },
      },
      {
        title: "Location",
        data: "warehouse_name",
        sortable: true,
        render: function (data, type, row) {
          return `<span class="text-uppercase">${data}</span>`;
        },
      },
      {
        title: "Action",
        data: "uid",
        sortable: false,
        class: "text-nowrap",
        render: function (data, type, row) {
          let buttons = "";

          const obj = encodeURIComponent(JSON.stringify(row));
          buttons += `
                    <button type="button" class="btn btn-icon btn-transparent" onclick="editProduct('${data}', '${obj}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                      <i class="bx menu-icon tf-icons bx bxs-edit-alt bx-xs"></i>
                    </button>
                  `;

          buttons += `
                    <button type="button" class="btn btn-icon btn-transparent" onclick="deleteProduct('${data}', '${row.name}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                      <i class="bx menu-icon tf-icons bx bxs-trash bx-xs"></i>
                    </button>
                  `;

          return buttons;
        },
      },
    ],
    drawCallback: function () {
      // Initialize tooltips
      $('[data-bs-toggle="tooltip"]').tooltip();
    },
  });
});
