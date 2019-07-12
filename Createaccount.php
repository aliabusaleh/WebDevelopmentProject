<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ceate account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!--===============================================================================================-->
</head>

</div>

<body>
<div class="limiter">
    <div class="container-login100">
        <div>

            <form style="alignment: center" action="Createaccount.php" method="post" >
					<span class="login100-form-title" class="customColor">
					Create new Account
					</span>
                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="name" placeholder="Full Name">
                    <span class="focus-input100"></span>

                </div>
                <div class="wrap-input100 validate-input" >
                    <input style="margin-bottom: 9px" class="input100" type="text" name="PhoneNumber" placeholder="Your Phone Number">


                </div>



                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="Reemail" placeholder="Retype Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Re-Password is required">
                    <input class="input100" type="password" name="Repass" placeholder="Retype Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Create Account
                    </button>
                    <?php
                    include 'DatabaseConfig.php';
                    if(!empty($_POST)) {
                        $fullname = $_POST['name'];
                        $phonenumber = $_POST['PhoneNumber'];
                        $mail = $_POST['email'];
                        $Rmail = $_POST['Reemail'];
                        $password = $_POST['pass'];
                        $Rpassword = $_POST['Repass'];
                        if (!$fullname || !$phonenumber || !$mail || !$Rmail || !$password || !$Rpassword) {
                            echo 'Please Fill all the fields !';

                        }
                        else if($mail != $Rmail){
                            echo 'The mail is not matched';
                        }
                        else if( $password != $Rpassword){
                            echo 'Password not matched ';
                        }
                        else{
                            $query = "INSERT INTO USER  VALUES ('".$phonenumber."','".$fullname."','".$phonenumber."','".$mail."','".SHA1($password)."','f','t')";
                            $result = $db->query($query);
                            if(!$result){
                                echo'something wrong!';
                            }
                            else{
                               echo'<a href="loginpage.php" style="color: red; font-size: 20px;"> User added successfully, click here</a>';
                            }
                            $db->close();
                        }
                    }
                    ?>

            </form>
        </div>
    </div>
</div>





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

</body>
</html>