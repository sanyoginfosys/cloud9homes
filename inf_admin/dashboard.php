<!DOCTYPE html>
<?php include_once 'siteconfig.php'; 
session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
include_once('base/functions.php');
?>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard | <?php echo SITE_TITLE; ?></title>
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

            <?php include_once ('includes/bheader.php'); ?>
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <?php include_once ('includes/subheader.php'); ?>

                <!-- begin:: Content -->
                    <center style="padding-top: 50px;">Page is under development.</center>

                <!-- end:: Content -->
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
<?php } else  {
    header('location: login.php');
}
