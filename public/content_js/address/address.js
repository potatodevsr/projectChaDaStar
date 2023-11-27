var data_table = null;
data_table = $("#data_table").DataTable({
    processing: true,
    serverSide: true,
    pageLength: 30,
    searching: false,
    ordering: false,
    order: [],
    ajax: {
        type: "get",
        url: `${ADMIN_URL}address/getDatatable`,
        dataType: "json",
    },
    columns: [{ data: "no" }, { data: "street" }, { data: "city" }, { data: "state" }, { data: "zipcode" }, { data: "county" }, { data: "tool" }],
    columnDefs: [
        { className: "text-center", targets: [0, 1, 2, 3, 4, 5, 6] },
        { className: "text-left", targets: [1, 2] },
    ],
});

$(document).on("click", "#add", function () {
    window.location.href = `${ADMIN_URL}address/add`;
});