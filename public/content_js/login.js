$(document).on('click', "#btn_login", function () {
    let checkValid = $('#frm_data').valid();
    if (checkValid == false) {
        return false;
    } else {
        let frmData = $("#frm_data").serialize();
        $.ajax({
            type: "post",
            url: `login/getUserLogin`,
            data: frmData,
            dataType: 'json',
            success: function (response) {
                console.log('response', response);
                if (response && !response.error) {
                    $("#email").val(response.email);
                    $("#password").val(response.password);
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.location.href = `${ADMIN_URL}user`;
                } else {
                    console.log('Error:', response.error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Error',
                    });
                }
            },
        });
        console.log('login', frmData);
    }
});

$(document).ready(function () {
    $("#frm_data").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                email: jQuery.validator.format("กรุณากรอกอีเมล์ให้ถูกต้อง"),
                required: jQuery.validator.format("กรุณาระบุอีเมล"),
            },
            password: {
                required: jQuery.validator.format("กรุณาระบุรหัสผ่าน"),
            },
        },
    });
})