<?php 
session_start();

if(isset($_SESSION['INFCRM_UserID'])) {
    include_once('base/functions.php');

    if(Check_UserPermission('My Profile', 'user_view', $_SESSION['INFCRM_UserID'])){

    if(isset($_POST['fname']) OR isset($_POST['lname']) OR isset($_POST['pNumber']) OR isset($_FILES["mpic"]))
    {
        if($_POST['fname'] != ""){
            UPDATE_UserProfile_Fname($_POST['fname'], $_SESSION['INFCRM_UserID']);
        }
        if($_POST['lname'] != ""){
            UPDATE_UserProfile_lname($_POST['lname'], $_SESSION['INFCRM_UserID'] );
        }
        if($_POST['pNumber'] != ""){
            UPDATE_UserProfile_Pnumber($_POST['pNumber'], $_SESSION['INFCRM_UserID']);
        }
        if($_FILES['mpic']["name"] != ""){
            $db_path = User_file_Update($_FILES['mpic']);
            if($db_path == "1"){
                header('location: profile.php?error=31');
            }   elseif($db_path == "2"){
                header('location: profile.php?error=32');
            }   elseif($db_path == "3"){
                header('location: profile.php?error=33');
            }   elseif($db_path == "4"){
                header('location: profile.php?error=34');
            }   else    {
             UPDATE_UserProfile_Picture($db_path, $_SESSION['INFCRM_UserID']);
         }
     }

 }
 if(isset($_POST['npass'])){
    if($_POST['npass'] != ""){
        UPDATE_UserProfile_Password($_POST['cpass'], $_POST['npass'], $_SESSION['INFCRM_UserID']);
    } else {
        header('location: profile.php?error=21');
    }
}
?>

<!DOCTYPE html>
<?php include_once 'siteconfig.php'; ?>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Add Product | <?php echo SITE_TITLE; ?></title>
    <meta name="description" content="Wizard examples">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="assets/app/custom/wizard/wizard-v2.default.css" rel="stylesheet" type="text/css" />
    <?php include_once 'includes/header.php'; ?>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subhepader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <?php include_once('includes/header-mobile.php'); ?>

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <?php include_once ('includes/aside.php'); ?>
        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <?php include_once ('includes/subheader.php'); ?>

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    <?php if(isset($_GET['resp'])){
                        if ($_GET['resp'] == 1) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <div class="alert-text">Password Change successfully!</div>
                            </div>
                            <?php
                        }
                    }?>
                    <?php if(isset($_GET['error'])) {
                        if($_GET['error'] == 20) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-text">Your current password is incorrect!</div>
                            </div>
                            <?php
                        }   else    {
                            if($_GET['error'] == 21){?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-text">Error occured while saving your password!</div>
                                </div>

                                <?php
                            }
                        }
                    }
                    ?>
                    <?php if(isset($_GET['error'])) {
                        if($_GET['error'] == 31) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-text">File is not an image!</div>
                            </div>
                            <?php
                        }   
                        else {
                            if($_GET['error'] == 32){?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-text">Sorry, your file is too large!</div>
                                </div>
                                
                                <?php
                            } 
                            else {
                                if($_GET['error'] == 33){?>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-text">Sorry, only JPG, JPEG, PNG files are allowed!</div>
                                    </div>

                                    <?php
                                }
                                else {
                                    if($_GET['error'] == 34){?>
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-text">Sorry, there was an error uploading your image <br> Please upload less than 2MB image!</div>
                                        </div>

                                        <?php
                                    }
                                }
                            }
                        }

                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-4">

                            <!--begin::Portlet-->
                            <div class="kt-portlet">

                                <div class="kt-portlet__body">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">

                                            <center><img src="<?php echo HOME_URL.GET_UserPic($_SESSION['INFCRM_UserID']); ?>" style="height: 100px; width: 100px; border-radius: 50px; ";></center>
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label" style="width: 100%">
                                        <h3 class="kt-portlet__head-title" style="width: 100%; text-align: center;">

                                            <?php echo GET_UserName($_SESSION['INFCRM_UserID']); ?>

                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                    <p><b>Email Address</b></p>
                                    <?php echo GET_UserEmail($_SESSION['INFCRM_UserID']) ?>
                                </div>
                                <div class="kt-portlet__body">
                                    <p><b>Phone Number</b></p>
                                    <?php echo GET_UserPhone($_SESSION['INFCRM_UserID']) ?>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>

                        <div class="col-lg-8">

                            <div class="kt-portlet kt-portlet--tabs">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-toolbar">
                                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-line-2x" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                                    <i class="la la-cog"></i> Settings
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content" role="tab" aria-selected="false">
                                                    <i class="la la-briefcase"></i> Change Password
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                                            <form class="kt-form" action="profile.php" method="POST" enctype="multipart/form-data">
                                                <div class="kt-portlet__body">
                                                    <div class="kt-section kt-section--first">
                                                        <div class="form-group">
                                                            <label>First Name:</label>
                                                            <input type="text" class="form-control" name ="fname" id="fname" placeholder="Enter first name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name:</label>
                                                            <input type="text" name = "lname" id="lname" class="form-control" placeholder="Enter last name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number:</label>
                                                            <input type="Number" name="pNumber" id="pNumber" class="form-control" placeholder="Enter phone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Change Profile Picture</label>
                                                            <div></div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="mpic" id="mpic">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
                                           <form class="kt-form" action="profile.php" method="POST">
                                            <div class="kt-portlet__body">
                                                <div class="kt-section kt-section--first">
                                                    <div class="form-group">
                                                        <label>Enter Current Passowrd:</label>
                                                        <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Enter current password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Enter New Password:</label>
                                                        <input type="password" name="npass" id="npass" class="form-control" placeholder="Enter new password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <?php include_once ('includes/footer-greet.php'); ?>
        </div>
    </div>
</div>


<!-- end:: Page -->
<?php include_once ('includes/footer.php'); ?>
</body>
<!-- end::Body -->
</html>

<?php }} else   {
    header('location: login.php');
} ?>