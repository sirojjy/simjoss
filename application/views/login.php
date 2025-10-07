<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/main.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('') ?>assets/assets/images/favqai.png">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <!-- <div class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/login/css/bg-login.png'); background-size: cover"> -->
        <div class="container-login100">

            <div class="wrap-login100" style="opacity: 95%">
                <!-- <div class="login100-form-title" style="background-image: url(<?php echo base_url(); ?>/assets/assets/images/Simjos2.png);">
                    <div class="login100-form-title" style="background-color: blue">
                        <span class="login100-form-title-1">

                            <label style="color: white; margin-top: 12px;"><b> Login </b></label>
                        </span>
                        <label style="color: white; margin-top: 12px;"><b> Login</b></label>
                    </div>
                </div> -->
                <!-- <?php if (isset($error)) {
                            echo $error;
                        }; ?> -->
                <!-- <h5 align="center" class="m-t-20">JASAMARGA JOGJA SOLO</h5> -->
                <div class="w-100 d-flex justify-content-center mt-3">
                    <img src="<?php echo base_url(''); ?>/assets/assets/images/Simjos2.png" style="width: 70%; height:100%" class="light-logo" />
                </div>
                <hr>
                <p align="center" class="m-t-20">
                <h6 align="center"> <b>Login</b></h6></label></p>
                <form action="<?php echo site_url() ?>/Login/act" method="post" class="login100-form validate-form">

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                        <!-- <span class="label-input100">Username</span> -->
                        <input class="input100" type="text" name="username" placeholder="Enter Username" style="text-align: center">
                        <!-- <span class="focus-input100"></span> -->
                    </div>

                    <div class="wrap-input100 validate-input m-b-35 " data-validate="Password is required">
                        <!-- <span class="label-input100">Password</span> -->
                        <input class="input100" type="password" name="password" placeholder="Enter Password" style="text-align: center">
                        <!-- <span class="focus-input100"></span> -->
                    </div>


                    <!-- <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="<?php echo site_url(); ?>/C_forgot" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div> -->

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" style="">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>

</body>

</html>