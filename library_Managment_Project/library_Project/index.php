<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('images/library.jpg');
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

        .login-form h3 {
            text-align: center;
        }

        .login-form .form-group {
            margin-bottom: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            color: #333;
        }

        .login-form .btnSubmit {
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form .ForgetPwd {
            display: block;
            text-align: center;
            color: #fff;
        }

        .login-form .ForgetPwd:hover {
            text-decoration: underline;
        }

        .login-form label {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    $ademailmsg = "";
    $adpasdmsg = "";
    $emailmsg = "";
    $pasdmsg = "";
    $msg = "";

    if (!empty($_REQUEST['ademailmsg'])) {
        $ademailmsg = $_REQUEST['ademailmsg'];
    }

    if (!empty($_REQUEST['adpasdmsg'])) {
        $adpasdmsg = $_REQUEST['adpasdmsg'];
    }

    if (!empty($_REQUEST['emailmsg'])) {
        $emailmsg = $_REQUEST['emailmsg'];
    }

    if (!empty($_REQUEST['pasdmsg'])) {
        $pasdmsg = $_REQUEST['pasdmsg'];
    }

    if (!empty($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
    }
    ?>

    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form">
                <h3>Admin Login</h3>
                <form action="loginadmin_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                    </div><br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *" value="" />
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">
                        <a href="forgot_password.php" class="ForgetPwd">Forgot Password?</a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 login-form">
                <h3>Student Login</h3>
                <form action="login_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                    </div><br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *" value="" />
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">
                        <a href="forgot_password.php" class="ForgetPwd">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="" async defer></script>
</body>
</html>
