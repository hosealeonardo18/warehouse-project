$(document).ready(function () {
  tableListUser.DataTable({
    ajax: {
      url: "/datatables/users",
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
        title: "Nama",
        data: "name",
        sortable: true,
        render: function (data, type, row) {
          return data;
        },
      },
      {
        title: "Posisi",
        data: "role_name",
        sortable: true,
        render: function (data, type, row) {
          return data;
        },
      },
      {
        title: "Email",
        data: "email",
        sortable: true,
        render: function (data, type, row) {
          return data;
        },
      },
      {
        title: "Aksi",
        data: "uid",
        sortable: false,
        class: "text-nowrap",
        render: function (data, type, row) {
          let buttons = "";

          buttons += `
              <button type="button" class="btn btn-icon btn-transparent" onclick="editUser('${data}', '${row.name}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                <i class="bx menu-icon tf-icons bx bxs-edit-alt bx-xs"></i>
              </button>
            `;

          buttons += `
              <button type="button" class="btn btn-icon btn-transparent" onclick="deleteUser('${data}', '${row.name}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
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