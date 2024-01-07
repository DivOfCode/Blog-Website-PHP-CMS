<?php

require_once 'conn.php';
$user = mysqli_real_escape_string($con,$_POST['user']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$pass = mysqli_real_escape_string($con,$_POST['password']);
$status = 1;
$Securedpass = password_hash($pass, PASSWORD_BCRYPT);

$sql_check_query = "SELECT email FROM users WHERE email = '$email'";
$check_email = mysqli_query($con,$sql_check_query);

if (mysqli_num_rows($check_email) > 0 ) {
	?>
	<script>
		alert("Email Already Exists!!");
		window.location='register.php';
	</script>
<?php
}else{


$sql_query = "INSERT INTO users(full_name,email,password,status) VALUES('$user','$email','$Securedpass','$status')";
$check = mysqli_query($con,$sql_query);

if ($check) {
	?>
	<script>
		alert("Sucessfully Registered!!");
		window.location='index.php';
	</script>
<?php }else { ?>
	<script>
		alert("Registeration Failed!!");
		window.location='register.php';
	</script>
<?php }

}

 ?>
