console.log('address_form.js');

$(document).ready(function () {
    $('#FormAdd').modal('show');
});

$(document).on("click", "#back", function () {
    window.location.href = `${ADMIN_URL}address`;
});

const action = (id = null, mode = null) => {
    let frmData = $("#frmData").serializeToJSON();
    let data = null;

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
    }

    $.ajax({
        type: "post",
        url: `${ADMIN_URL}address/action`,
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
                } else {
                    Toast.fire({
                        icon: "success",
                        title: "สำเร็จแล้ว",
                    });
                    window.location.href = `${ADMIN_URL}address`;
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