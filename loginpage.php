<!DOCTYPE html>
<?php
include 'DatabaseConfig.php';

if(!isset($_SESSION))
session_start();
?>


<html>
<head>
<title>Login Page</title>

    <link href="css/master.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/icon-menu.css" rel="stylesheet">

    <!-- SWITCHER -->

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="plugins/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color1.css" title="color1" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color2.css" title="color2" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color3.css" title="color3" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color4.css" title="color4" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="plugins/switcher/css/color5.css" title="color5" media="all" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div style=" opacity:0.97; width:100%; height:100%;z-index: 10;top:0;left:0; position:fixed; " id="LgDiv" class="customBgColor">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form method="post"  action="loginpage.php" >
					<span class="login100-form-title">
						Member Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" value="" id="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password" id="pass">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>


                    <div class="container-login100-form-btn">

                        <button  type="submit" class="login100-form-btn customBgColor" >
                            Login
                        </button>

                    </div>

                    <?php
                    include 'DatabaseConfig.php';
                    if(!empty($_POST)){
                        $email = $_POST['email'];
                        $password = $_POST['pass'];
                        if(!$password || !$email){
                            echo'fill the Email and password';
                        }
                        else{
                            $query = "select * from user where Email='".$email."' and Password ='".SHA1($password)."'";
                            $result = $db->query($query);
                            $row = $result->fetch_assoc();
                            if(!isset($row)){
                                echo'invalid Email/Password, try again!';
                                $_SESSION['login']= 'no';
                            }
                            else {
                                $_SESSION ['login'] = 'yes';
                                $_SESSION['email'] = $email;
                                echo '<script type="text/javascript">
                                        window.location = "index.php"
                                                                </script>';




                            }

                        }

                    }

                    $db->close();
                    ?>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="Createaccount.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script src="js/smoothscroll.min.js"></script>

<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

<script src="plugins/bxslider/jquery.bxslider.min.js"></script>

<script src="plugins/switcher/js/bootstrap-select.js"></script>
<script src="plugins/switcher/js/evol.colorpicker.min.js" type="text/javascript"></script>
<script src="plugins/switcher/js/dmss.js"></script>

<script type="text/javascript" src="plugins/isotope/jquery.isotope.min.js"></script>

<script src="js/wow.min.js"></script>
<script src="js/cssua.min.js"></script>
<script src="js/theme.js"></script>

</body>
</html>