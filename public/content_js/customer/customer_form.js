console.log('custumer_form.js');

$(document).on("click", "#back", function () {
    window.location.href = `${ADMIN_URL}customer`;
});


const action = (id = null, mode = null) => {
    let frmData = new FormData($("#frmData")[0]);
    let data = null;

    if (id != null) {
        if (mode === "edit") {
            data = { mode: "edit", id };
        }
        if (mode === "update") {
            data = new FormData();
            data.append('mode', 'update');
            data.append('id', id);

            frmData.forEach((value, key) => {
                data.append(key, value);
            });
        }
        if (mode === "delete") {
            data = { mode: "delete", id };
        }
    } else {
        data = frmData;
        data.append('mode', 'insert');
    }
    $.ajax({
        type: "post",
        url: `${ADMIN_URL}customer/action`,
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $.busyLoadFull("show");
        },
        complete: function () {
            $.busyLoadFull("hide");
        },
        success: function (response) {
            console.log(`response`, response);
            if (response !== false) {
                if (mode == "edit") {
                } else {
                    Toast.fire({
                        icon: "success",
                        title: "สำเร็จแล้ว",
                    });
                    window.location.href = `${ADMIN_URL}customer`;
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
