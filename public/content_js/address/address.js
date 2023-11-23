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

const action = (id = null, mode = null) => {
    let frmData = $("#frmData").serializeToJSON();
    let data = null;
    console.log('data ->', data);
    if (id != null) {
        if (mode === "edit") {
            data = { mode: "edit", id };
        }
        if (mode === "update") {
            data = { mode: "update", data: frmData, id };
        }
        if (mode === "delete") {
            data = { mode: "delete", id };
        }
    } else {
        data = { mode: "insert", data: frmData };
        console.log('data insert ->', data);
    }
};
