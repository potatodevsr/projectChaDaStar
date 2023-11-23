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
        url: `${ADMIN_URL}user/getDatatable`,
        dataType: "json",
    },
    columns: [
        { data: "no" },
        { data: "first_name" },
        { data: "last_name" },
        { data: "email" },
        { data: "status" },
        {
            data: "update_date",
            render: function (data) {
                return getFormattedBuddhistDateWithTime(new Date(data));
            }
        },
        { data: "tool" }],
    columnDefs: [
        { className: "text-center", targets: [0, 1, 2, 3, 4, 5] }
    ],
});

$(document).on("click", "#add", function () {
    window.location.href = `${ADMIN_URL}user/add`;
});

// and this only GET