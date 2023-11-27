const currentDate = new Date();
const formattedBuddhistDateWithTime = getFormattedBuddhistDateWithTime(currentDate);

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
        url: `${ADMIN_URL}customer/getDatatable`,
        dataType: "json",
    },
    columns: [
        { data: "no" },
        { data: "first_name" },
        { data: "last_name" },
        { data: "phone" },
        { data: "image" },
        {
            data: "update_date",
            render: function (data) {
                return getFormattedBuddhistDateWithTime(new Date(data));
            }
        },
        { data: "tool" }
    ],
    columnDefs: [
        { className: "text-center", targets: [0, 1, 2, 3, 4, 5, 6] },
    ],
});

$(document).on("click", "#add", function () {
    window.location.href = `${ADMIN_URL}customer/add`;
});

const action = (id = null, mode = null) => {

    let data = null;
    if (id != null) {
        if (mode === "delete") {
            data = { mode: "delete", id };
        } else {
            return false
        }
    } else {
        return false
    }
    $.ajax({
        type: "post",
        url: `${ADMIN_URL}customer/action`,
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
            if (response !== false) {
                if (mode == "edit") {
                    // Add logic for edit mode if needed
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