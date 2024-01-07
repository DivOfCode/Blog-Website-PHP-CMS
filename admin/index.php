<?php
require_once 'conn.php';

    session_start();

     if (isset($_SESSION['username'])) {
         header('location:dashboard.php');
     }

if (isset($_POST['login'])) {

   $email = mysqli_real_escape_string($con,$_POST['email']);
   $password =  mysqli_real_escape_string($con,$_POST['password']);

   $sql = "SELECT full_name,password FROM users WHERE email = '$email' AND status = '1'";
   $check = mysqli_query($con,$sql);

   if (mysqli_num_rows($check) > 0 ) {

        $result = mysqli_fetch_assoc($check);
        $full_name = $result['full_name'];
        $dbpass = $result['password'];

       if (password_verify($password,$dbpass)) {
            $_SESSION['username'] = $full_name;
            header('location:dashboard.php');
       }
   }else{
            ?>
            <script>
                alert("Incorrect Credentials!! Or user is disabled");
                window.location='index.php';
            </script>
        <?php
       }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Login</title>
<?php include_once 'links.php';?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1>Login</h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="login">sign in</button>
                                <div class="social-login-content">
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="Register.php">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include_once 'footer.php'; ?>