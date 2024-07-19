$(document).ready(function () {
  tableListStockRequest.DataTable({
    ajax: {
      url: "/datatables/stock-request",
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
        title: "Product",
        data: "product_details.product_name",
        sortable: true,
        render: function (data) {
          return data;
        },
      },
      {
        title: "Qty",
        data: "qty",
        sortable: true,
        render: function (data) {
          return data;
        },
      },
      {
        title: "Status",
        data: "approved_at",
        sortable: true,
        render: function (data) {
          let status = "";
          let badge = "";

          if (!data) {
            status = "Waiting Approval";
            badge = "bg-warning";
          } else {
            status = "Approved";
            badge = "bg-success";
          }

          return `<span class="badge ${badge}">${status}</span>`;
        },
      },
      {
        title: "Approved / Rejected",
        data: "approved_name",
        sortable: true,
        render: function (data, type, row) {
          return data;
        },
      },
      {
        title: "Created Date",
        data: "created_at",
        sortable: true,
        render: function (data, type, row) {
          return moment(data).format("DD MMM YYYY HH:mm");
        },
      },
      {
        title: "Action",
        data: "uid",
        sortable: false,
        class: "text-nowrap",
        render: function (data, type, row) {
          let buttons = "";

          if (!row?.approved_at) {
            const obj = encodeURIComponent(JSON.stringify(row));
            buttons += `
                      <button type="button" class="btn btn-icon btn-transparent" onclick="editStockRequest('${data}', '${obj}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                        <i class="bx menu-icon tf-icons bx bxs-edit-alt bx-xs"></i>
                      </button>
                    `;

            buttons += `
                      <button type="button" class="btn btn-icon btn-transparent" onclick="deleteStockRequest('${data}', '${row?.product_details?.product_name}')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                        <i class="bx menu-icon tf-icons bx bxs-trash bx-xs"></i>
                      </button>
                    `;
          }

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
