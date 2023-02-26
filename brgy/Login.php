<?php
require_once('Auth.php');
require_once('MainClass.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = json_decode($class->login());
    if($login->status == 'success'){
        echo "<script>location.replace('Login_verification.php');</script>";
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
    <title>Barangay 35 | Login</title>
</head>
<body class="image">
    <main class = "main">
		<br>
		<br>
		<br>
        <div class = "col-lg-4 col-md-8 col-sm-12">
            <div class="card shadow rounded-3">
                <br>
                <div class="card-title text-center">
                    <h5><b>Barangay 35, Zone 3, District 1, Tondo Manila</b></h5>
                    <h5><b>Inhabitants Management System</b></h5>
                    <img src = "img/brgylogo.png" height="30%" width="30%">
                </div>
                <p class="text-start"><b>Login to the Barangay</b></p>
				<div class="card-body py-0">
					<div class="container-fluid">
						<form action="./Login.php" method="POST">
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
								<input size="40" type="email" name="email" id="email" placeholder="Email" class="form-control rounded-0" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" autofocus required>
							</div>
							<br>
							<div class="form-group">
								<input size="40" type="password" name="password" id="password" placeholder="Password" class="form-control rounded-0" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
							</div>
							<br>
							<div class="form-group text-start1">
								<input type="checkbox" onclick="myFunction()"> Show Password
							</div>
							<br>
							<div class="form-group">
								<button class="btn btn-primary bg-gradient rounded-0">LOGIN</button>
							</div>     
							<br>
							<div class="form-group">
								<p class="Inline">Not Registered in our Barangay Yet?</p>
								<a href="Registration.php" class="Inline">Register Here</a>
							</div>
					</div>
				</div>
            </div>
        </div>
    </main>
<script>
	function myFunction() {
		var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
	}
</script>
</body>
</html>