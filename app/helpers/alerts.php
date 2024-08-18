<?php

function check_toast()
{
    if(isset($_SESSION['toast_message'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let toastType = '<?php echo $_SESSION['toast_type']; ?>';
                let toastMessage = '<?php echo $_SESSION['toast_message']; ?>';

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: toastType,
                    title: toastMessage,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            });
        </script>
        <?php
        unset($_SESSION['toast_message']);
        unset($_SESSION['toast_type']);
    endif;
}

function check_sweetalert()
{
    if (isset($_SESSION['alert_message'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let alertType = '<?php echo $_SESSION['alert_type']; ?>';
                let alertMessage = '<?php echo $_SESSION['alert_message']; ?>';

                Swal.fire({
                    icon: alertType,
                    title: 'Bilgi',
                    text: alertMessage,
                    confirmButtonText: 'Tamam'
                });
            });
        </script>
        <?php
        unset($_SESSION['alert_message']);
        unset($_SESSION['alert_type']);
    endif;

}

function checkAlerts(){
    check_toast();
    check_sweetalert();
}


function darkalert($btnMain,$messageData){
     ?>
<div class="modal-dark me-1 mb-1 d-inline-block">
    <!-- Button trigger for dark modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#dark">
        <?=$btnMain?>
    </button>
    <!--Dark theme Modal -->
    <div class="modal fade text-left" id="dark" tabindex="-1" role="dialog"
         aria-labelledby="messageDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
             role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="messageDetailModalLabel">Mesaj Detayları</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6><strong>Müşteri Adı:</strong> <?=htmlspecialchars($messageData["name"])?> </h6>
                    <h6><strong>Konu:</strong> <?=htmlspecialchars($messageData["subject"])?></h6>
                    <h6><strong>Email:</strong>  <?=htmlspecialchars($messageData["email"])?>) </h6>
                    <h6><strong>Telefon:</strong> <?=htmlspecialchars($messageData["phone"])?> </h6>
                    <hr>
                    <p><?=nl2br(htmlspecialchars($messageData["message"]))?></p>
                </div>
                <div class="modal-footer">
                   <div class="text-start">
                       <p class="text-secondary text-sm text-right"><?=date("d/m/Y H:i:s", strtotime($messageData['created_at']));?></p>
                   </div>
                    <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal" id="btnClose">
                        <i class="fas fa-times"></i>
                        Kapat
                    </button>
                    <button type="button" class="btn btn-primary ms-1" id="btnConfirm" data-bs-dismiss="modal">
                        <i class="fas fa-check"></i>
                        Onayla
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>

<?php
 ; }