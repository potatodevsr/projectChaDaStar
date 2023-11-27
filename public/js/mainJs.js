// $(".table").DataTable({});
$.busyLoadSetup({
    animation: "slide",
    background: "rgb(62 60 57 / 86%)",
    spinner: "cube-grid",
    maxSize: "100px",
    minSize: "100px",
    text: "รอก่อนๆกำลังดึงข้อมูล ...",
    textPosition: "bottom",
});
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    },
});

function getFormattedBuddhistDateWithTime(date) {
    const thaiYear = date.getFullYear() + 543;
    const month = (1 + date.getMonth()).toString().padStart(2, '0');
    const day = date.getDate().toString().padStart(2, '0');
    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    const seconds = date.getSeconds().toString().padStart(2, '0');
    return `${day}/${month}/${thaiYear} ${hours}:${minutes}:${seconds}`;
}

$.validator.addMethod('customEmail', function (value, element) {
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return this.optional(element) || emailRegex.test(value);
}, 'Please enter a valid email address.');