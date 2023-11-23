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
// the tool is working, but action doesn't have aja
    $.ajax({
        type: "post",
        url: `${ADMIN_URL}user/action`,
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
                    window.location.href = `${ADMIN_URL}user`;
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

// now [name]_form.js handles all CRUD operations