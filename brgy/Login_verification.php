<?php
require_once('Auth.php');
require_once('MainClass.php');
$user_data = json_decode($class->get_user_data($_SESSION['otp_verify_user_id']));
if($user_data->status){
    foreach($user_data->data as $k => $v){
        $$k = $v;
    }
}
if(isset($_GET['resend']) && $_GET['resend'] == 'true'){
    $resend = json_decode($class->resend_otp($_SESSION['otp_verify_user_id']));
    if($resend->status == 'success'){
        echo "<script>location.replace('Login_verification.php')</script>";
    }else{
        $_SESSION['flashdata']['type']='danger';
        $_SESSION['flashdata']['msg']=' Resending OTP has failed.';
        echo "<script>console.error(".$resend.")</script>";
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $verify = json_decode($class->otp_verify());
    if($verify->status == 'success'){
        echo "<script>location.replace('./');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.2.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./Font-Awesome-master/js/all.min.js"></script>
    <link rel = "icon" href = "./img/brgylogo.png">
    <title>Barangay 35 | Verification</title>
</head>
<body class="image">
    <main class = "main">
		<br>
		<br>
		<br>
        <div class="clear-fix mb-3"></div>
       <div class="col-lg-3 col-md-8 col-sm-12">
           <div class="card shadow rounded-2">
				<br>
                <div class="card-title text-center">
                <img class="Inline" src = "img/brgylogo.png" height="25%" width="25%">
                <h3 class="Inline"><b>Email Verification</b></h3>
				</div>
				<div class="card-body py-2">
					<div class="container-fluid">
						<form action="./Login_verification.php" method="POST">
							<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
							<?php 
                                if(isset($_SESSION['flashdata'])):
                            ?>
                            <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?> my-2 rounded-0">
                                <div class="d-flex align-items-center">
                                    <div class="col-11"><?php echo $_SESSION['flashdata']['msg'] ?></div>
                                    <div class="col-1 text-end">
                                        <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php unset($_SESSION['flashdata']) ?>
                            <?php endif; ?>
								<div class="form-group">
									<p class="">An OTP has been sent to your email: (<?= isset($email) ? $email : '' ?>)</p>
								</div>
								<div class="form-group">
									<label for="otp" class="label-control">Please Enter the OTP:</label>
                                <div class="clear-fix mb-2"></div>
									<input type="otp" placeholder = "One Time Password (OTP)" name="otp" id="otp" class="form-control rounded-1" value="" maxlength="6" pattern="{0-9}+" autofocus required>
								</div>
								<div class="clear-fix mb-4"></div>
								<div class="form-group text-end">
                                <a class="btn btn-secondary bg-gradient rounded-0  <?= time() < strtotime($otp_expiration) ? 'disabled' : '' ?>" data-stat="<?= time() < strtotime($otp_expiration) ? 'countdown' : '' ?>" href="./Login_verification.php?resend=true" id="resend"><?= time() < strtotime($otp_expiration) ? 'Resend in '.(strtotime($otp_expiration) - time()).'s' : 'Resend OTP' ?></a>
									<button class="btn btn-primary bg-gradient rounded-0">Confirm</button>
								</div>
								<br>
						</form>
                   </div>
               </div>
           </div>
       </div>
    </main>
</body>
<script>
    $(function(){
        var is_countdown_resend = $('#resend').attr('data-stat') == 'countdown';
        if(is_countdown_resend){
            var sec = '<?= time() < strtotime($otp_expiration) ? (strtotime($otp_expiration) - time()) : 0 ?>';
            var countdown = setInterval(() => {
                if(sec > 0){
                    sec--;
                    $('#resend').text("Resend in "+(sec)+'s')
                }else{
                    $('#resend').attr('data-stat','')
                                .removeClass('disabled').text('Resend OTP')
                    clearInterval(countdown)
                }
            }, 1000);
        }
    })
</script>
</html>