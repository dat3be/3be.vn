<script>
$(document).ready(function() {
    setTimeout(function() {
        $('#thong_bao').modal('show');
    }, 150);
});
</script>
<div class="modal fade" id="thong_bao" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Thông Báo</h2>
                <div class="btn btn-sm btn-icon btn-active-color-info" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body py-lg-3 px-lg-3">
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                    id="thong_bao_stepper">
                    <div class="flex-row-fluid py-lg-3 px-lg-12">
                        <form class="form" novalidate="novalidate" id="thong_bao_form">
                            <div class="current" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="fv-row mb-10 fs-4">
                                        Lưu Ý: Không Đổi Được Domain Nhé
                                    
                            </div>
                <div class="text-end mt-4">
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">膼贸ng</button>
    </div>
    </div>
    <script>
$(document).ready(function() {
    setTimeout(function() {
        $('#thong_bao').modal('show');
        
        const autoClose = setTimeout(function() {
            $('#thong_bao').modal('hide');
        }, 7200000); // 2 hours in milliseconds

        $('#closeAfterTwoHours').on('click', function() {
            $('#thong_bao').modal('hide');
            clearTimeout(autoClose);
        });
    }, 150);
});
</script>