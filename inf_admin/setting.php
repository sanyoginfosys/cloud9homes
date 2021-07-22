<?php 
session_start();

if(isset($_SESSION['INFCRM_UserID'])) {
    include_once('base/functions.php');
    if(isset($_POST['sname']) AND isset($_POST['urlname']) AND isset($_POST['fvname'])) 
    {
      Update_Setting($_POST['sname'],$_POST['urlname'],$_POST['fvname']);
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
                        <?php if(isset($_GET['error'])){
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
                        
                        <div class="row">
                            <div class="col-lg-0">
                                <!--begin::Portlet-->
                                <!--end::Portlet-->
                            </div>

                            <div class="col-lg-12">

                                <div class="kt-portlet kt-portlet--tabs">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-toolbar">
                                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-line-2x" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                                        <i class="la la-cog"></i> Settings
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="kt-portlet__body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                                                <form class="kt-form" action="setting.php" method="POST" enctype="multipart/form-data">
                                                    <div class="kt-portlet__body">
                                                        <div class="kt-section kt-section--first">
                                                            <div class="form-group">
                                                                <?php $Array = Fetch_Setting_Data(); ?>
                                                                <label>Site Name:</label>
                                                                <input type="text" class="form-control" name ="sname" id="sname" placeholder="Enter Site name" value="<?php echo $Array[0]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>URL:</label>
                                                                <input type="text" name = "urlname" id="urlname" class="form-control" placeholder="Enter URL name" value="<?php echo $Array[1]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Favicon:</label>
                                                                <input type="text" name="fvname" id="fvname" class="form-control" placeholder="Enter Favicon URL" value="<?php echo $Array[2]; ?>">
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
                                            <div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">
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

<?php } else   {
    header('location: login.php');
} ?>