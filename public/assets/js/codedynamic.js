console.log('%cĐược phát triển bởi: %KHANGAPI %c- https://fb.com/khangapi', 'color: #007bff; font-weight: bold; font-size: 20px;', 'color: #007bff; font-weight: bold; font-size: 20px;', 'color: #007bff; font-weight: bold; font-size: 20px;');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function swal(text, icon) {
    Swal.fire({
        heightAuto: false,
        icon: icon,
        title: `<h3>Thông báo</h3>`, // Notification
        html: `${text}`,
        confirmButtonText: "Ok, got it!",
        customClass: {
            confirmButton: icon === "success" ? 'btn btn-khangapi_success btn-success' : 'btn btn-khangapi_danger btn-danger'
        }
    });
}

const coppy = (element) => {
    const textArea = document.createElement("textarea");
    textArea.value = element;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    swal(`Sao chép thành công`, "success"); // Successfully copied
}

const toastrNotify = (text, icon) => {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "10000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr[icon](text, 'Thông báo!'); // Notification
}

const copyToClipboard = (element) => {
    const $temp = $("<input>");
    $("body").append($temp);
    $temp.val(element).select();
    document.execCommand("copy");
    $temp.remove();
    swal(`Sao chép thành công`, "success"); // Successfully copied
}

const handleCheckLevel = (levelUser) => {
    $.ajax({
        url: '/level/check',
        type: 'GET',
        data: {
            level: levelUser
        },
        dataType: 'json',
        success: function(response) {
            if (response.status == 'success') {
                Swal.fire("Thành công", response.message, "success")
            }
        }
    });
}