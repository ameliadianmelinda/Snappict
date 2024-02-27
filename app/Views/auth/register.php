<!DOCTYPE html>
<html lang="en">

<head>
    <title>Snappict | Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>/images/s.svg" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/css/main.css">
    <!--===============================================================================================-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
        $session = session();
        $username = $session->getFlashdata('username');
        $password = $session->getFlashdata('password');
        $confirm = $session->getFlashdata('confirm');
        $email = $session->getFlashdata('email');
    ?>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url(); ?>/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-10 p-b-40">
                <center><img src="<?= base_url(); ?>/images/snappict.svg" style="width: 150px; height: 150px;"></center>
                <form class="login100-form validate-form" action="/valid_register" method="post">
                    <?= service('validation')->listErrors() ?>
                    <span class="login100-form-title p-b-30">
                        Create Account
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Type your email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    <?php if ($email) { ?>
						<p style="color:red"><i class="fa-solid fa-circle-exclamation"></i>&nbsp; &nbsp;<?php echo $email ?></p>
					<?php } ?>

                    <div class="wrap-input100 validate-input m-t-23" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Type your username">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    <?php if ($username) { ?>
						<p style="color:red"><i class="fa-solid fa-circle-exclamation"></i>&nbsp; &nbsp;<?php echo $username ?></p>
					<?php } ?>

                    <div class="wrap-input100 validate-input m-t-23" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <?php if ($password) { ?>
						<p style="color:red"><i class="fa-solid fa-circle-exclamation"></i>&nbsp; &nbsp;<?php echo $password ?></p>
					<?php } ?>

                    <div class="wrap-input100 validate-input m-t-23" data-validate="Password is required">
                        <span class="label-input100">Confirm password</span>
                        <input class="input100" type="password" name="confirm_password" placeholder="Confirm password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <?php if ($confirm) { ?>
						<p style="color:red"><i class="fa-solid fa-circle-exclamation"></i>&nbsp; &nbsp;<?php echo $confirm ?></p>
					<?php } ?>

                    <div class="container-login100-form-btn p-t-50">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Sign Up
                            </button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-40">
                        <p>Already have an account?</p>
                        <a href="/" class="txt2">
                            Sign In from here!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>