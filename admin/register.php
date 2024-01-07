<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
  

    <!-- Title Page-->
    <title>Register</title>

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
                               <h1>register</h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="registerProcess.php" method="post" onsubmit="return validate()">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="au-input au-input--full" id="user" type="text" required name="user" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" id="email" type="email"   name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" id="pass" type="password" required name="password" placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="index.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include_once 'footer.php'; ?>

<script>
    function validate() {
        var user = document.getElementById('user').val()
        var email = document.getElementById('email').val()
        var pass = document.getElementById('pass').val()

        if (user.trim() == "") {
            alert("Username is Required");
            return false;
        }else if(email.trim() == "") {
            alert("Email is Required");
            return false;
        }else if (pass.trim() == "") {
            alert("Password is Required");
            return false;
        }else{
            alert("Wellcome");
            return true;
        }
    }
</script>