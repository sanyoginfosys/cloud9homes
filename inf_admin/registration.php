<?php

session_start();
include_once ('base/functions.php');
if(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['gender']) AND isset($_POST['dob']) AND isset($_POST['phoneNo']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_FILES["pic"])) 
{
    $db_path = file_upload_pics($_FILES['pic']);
    if($_POST['firstname'] != NULL AND $_POST['lastname'] != NULL AND $_POST['gender'] != NULL AND $_POST['dob'] != NULL AND $_POST['phoneNo'] != NULL AND $_POST['email'] != NULL AND $_POST['password'] != NULL AND $_FILES['pic'] != NULL)
    {
        $response = register_client($_POST['firstname'], $_POST['lastname'],$_POST['gender'],$_POST['dob'],$_POST['phoneNo'],$_POST['email'], $_POST['password'], $_POST['cpassword'], $db_path);

        if($response == 1){
            header('location: login.php');
        }   elseif($response == 2)   {
            header('location: registration.php?error=20');
        }   elseif($response == 3)   {
            header('location: registration.php?error=21');
        }   
    }
}
?>
<!DOCTYPE html>
<?php include_once 'siteconfig.php'; ?>
<?php include_once 'base/db_conn.php' ; ?>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8" />
        <title>Register | <?php echo SITE_TITLE; ?></title>
        <meta name="description" content="Login to the portal">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="assets/app/custom/login/login-v4.default.css" rel="stylesheet" type="text/css" />
        <?php include_once 'includes/header.php'; ?>
    </head>
    <body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
        <div class="kt-grid kt-grid--ver kt-grid--root">
            <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="registration.php">
                                <img src="assets/media/logos/logo-5.png">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Register To The Portal</h3>
                            </div>
                            <?php if(isset($_GET['error'])) {
                                if($_GET['error'] == 20) {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-text">Email Id Is Already Registered !!!</div>
                                    </div>
                                    <?php
                                }   else    {
                                    if($_GET['error'] == 21){?>
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-text">Confirm Password Is Wrong !!!</div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <form class="col-lg-12" method="POST" action="registration.php" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Gender</label>
                                        <!--<input type="text" class="form-control" name="fullname" id="fullname">-->
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Birth Date</label>
                                        <input type="Date" class="form-control" name="dob" id="dob">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Phone Number</label>
                                        <input type="text" class="form-control" name="phoneNo" id="phoneNo">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Confirm Password</label>
                                        <input type="password" class="form-control" name="cpassword" id="cpassword">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label" style="color: black;">Profile pic</label>
                                        <input type="file" name="pic" id="pic">
                                    </div>
                                </div>
                                <div>
                                    <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink" required="required">
                                    <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                                </div>                        

                                <div class="col-lg-12">
                                    <button type="submit" id="submit" value="submit" class="btn btn-raised btn-primary waves-effect">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </body>
</head>
</html>
<script>
    $(document).ready(function(){
        $("button").click(function() {
            var pass = document.getElementById("password").value;
            var cpass = document.getElementById("cpass").value;
            if (pass != cpass) {
                document.location.href = 'registration.php?error=20;';
            }
        })
    })
</script>