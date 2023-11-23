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
        url: `${ADMIN_URL}gender/getDatatable`,
        dataType: "json",
    },
    columns: [{ data: "no" }, { data: "sex" }, { data: "status" }, { data: "tool" }],
    columnDefs: [
        { className: "text-center", targets: [0, 2, 3] },
        { className: "text-left", targets: [1, 2] },
    ],
});

$(document).on("click", "#add", function () {
    $("#sexVal").val("");
    $("#statusVal").val("");
    $("#btnAction").attr("onclick", "action()");
    $("#FormAdd").modal("show");
});
const action = (id = null, mode = null) => {
    let frmData = $("#frmData").serializeToJSON();
    let data = null;
    if (id != null) {
        if (mode === "edit") {
            data = { mode: "edit", id };
        }
        if (mode === "update") {
            data = { mode: "update", data: frmData, id: 99 };
        }
        if (mode === "delete") {
            data = { mode: "delete", id };
        }
    } else {
        data = { mode: "insert", data: frmData };
    }

    $.ajax({
        type: "post",
        url: `${ADMIN_URL}gender/action`,
        data: data,
        dataType: "json",
        beforeSend: function () {
            $.busyLoadFull("show");
        },
        complete: function () {
            $.busyLoadFull("hide");
        },
        success: function (response) {
            console.log(`response`, response);
            if (response != false) {
                if (mode == "edit") {
                    // console.log(`response edit`, response);
                    $("#sexVal").val(response.sex);
                    $("#statusVal").val(response.status);
                    $("#btnAction").attr("onclick", `action(${response.id},'update')`);
                    $("#FormAdd").modal("show");
                } else {
                    $("#FormAdd").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "สำเร็จแล้ว",
                    });
                    data_table.ajax.reload();
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "พบข้อผิดพลาด",
                });
            }
        },
    });
};
