<?php

include 'php/conexion_be.php';


$dom = $_SERVER['HTTP_HOST']; //recuperamos el dominio
$rest = $_SERVER['REQUEST_URI']; //recuperamos el resto
$url_completa = "http://" . $dom . $rest; //armamos la url
$code = basename($url_completa);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./../assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./../assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="./../assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('./../assets/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="./../php/prueba.php" method="POST"  class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Write your new password
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="contrasena" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

                    <input type="hidden" placeholder="Nueva contraseña" name="code" value="<?php echo"$code"; ?>"/>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">

						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Send password
							</button>
						</div>
					</div>

                    <div class="flex-col-c p-t-30">
						<span class="txt1 p-b-17">
							Or Sign In Using
						</span>

						<a href="./../index.php" class="txt2">
							Sign In
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="./../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="./../vendor/bootstrap/js/popper.js"></script>
	<script src="./../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./../vendor/daterangepicker/moment.min.js"></script>
	<script src="./../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="./../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="./../assets/js/main.js"></script>

</body>
</html>
