<?php
session_start();

if(isset($_SESSION['INFCRM_UserID'])) {
include_once ('base/functions.php');
include_once('base/db_conn.php');
include_once('siteconfig.php');

if(isset($_POST['cfname']) AND isset($_POST['clname']) AND isset($_POST['cbname']) AND isset($_POST['cphone']) AND isset($_POST['cemail']) AND isset($_POST['caddress']) AND isset($_POST['csuburb']) AND isset($_POST['cstate']) AND isset($_POST['cpost']) AND isset($_POST['coption']) AND isset($_POST['cgroup']) AND isset($_POST['cdate'])  AND isset($_POST['csdate']) AND isset($_POST['cdamount']) AND isset($_POST['csdamount']) AND isset($_POST['frequency']))  
{
    if($_POST['cfname'] != NULL AND $_POST['clname'] != NULL AND $_POST['cbname'] != NULL AND $_POST['cphone'] != NULL AND $_POST['cemail'] != NULL AND $_POST['caddress'] != NULL AND $_POST['csuburb'] != NULL AND $_POST['cstate'] != NULL  AND $_POST['cpost'] != NULL  AND $_POST['coption'] != NULL  AND $_POST['cgroup'] != NULL AND $_POST['cdate'] != NULL  AND $_POST['csdate'] != NULL  AND $_POST['cdamount'] != NULL  AND $_POST['csdamount'] != NULL  AND $_POST['frequency'] != NULL) 
    {
     
       $response = Customer_Details($_POST['cfname'], $_POST['clname'],$_POST['cbname'],$_POST['cphone'],$_POST['cemail'],$_POST['caddress'], $_POST['csuburb'], $_POST['cstate'], $_POST['cpost'], $_POST['coption'], $_POST['cgroup'], $_POST['cdate'], $_POST['csdate'], $_POST['cdamount'], $_POST['csdamount'], $_POST['frequency'] , $_POST['cdebit']);
       if($response == 1){
            header('location: new_customer.php?resp=1');
        }   else   {
            header('location: new_customer.php?resp=10');
        }
    }
}
?>
<!DOCTYPE html>
<?php include_once 'siteconfig.php'; ?>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>New Customer</title>
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
               <?php
                if(isset($_GET['resp'])){
                    if ($_GET['resp'] == 1) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-text">Customer added successfully!</div>
                        </div>
                        <?php
                    }
                    if ($_GET['resp'] == 10) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <div class="alert-text">Oops, Error occured! Please try again with another email id.</div>
                        </div>
                        <?php
                    }
                }
                ?>
            <?php include_once ('includes/subheader.php'); ?>

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon kt-hidden">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Customer Details
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form" method="POST" action="new_customer.php">
                            <div class="kt-portlet__body">
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">First Name:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="cfname" id="cfname" class="form-control" placeholder="Enter first name">
                                        </div>
                                        <label class="col-lg-2 col-form-label">Last Name:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="clname" id="clname" class="form-control" placeholder="Enter last name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Business Name:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="cbname" id="cbname" class="form-control" placeholder="Enter buniess name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Mobile:</label>
                                        <div class="col-lg-10">
                                            <input type="Number" name="cphone" id="cphone" class="form-control" placeholder="Enter mobile number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Email:</label>
                                        <div class="col-lg-10">
                                            <input type="Email" name="cemail" id="cemail" class="form-control" placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Address:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="caddress" id="caddress" class="form-control" placeholder="Enter address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Suburb:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="csuburb" id="csuburb" class="form-control" placeholder="Enter suburb">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">State:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="cstate" id="cstate" class="form-control" placeholder="Enter state">
                                        </div>
                                        <label class="col-lg-2 col-form-label">Post:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="cpost" id="cpost" class="form-control" placeholder="Enter post">
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!--end::Form-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon kt-hidden">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Direct Debit Details
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        
                            <div class="kt-portlet__body">
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Select Option:</label>
                                        <div class="col-lg-6">
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio"  name="coption" id="coption" checked value="Once"> Once
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="coption" id="coption" value="Regular"> Regular
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Date:</label>
                                        <div class="col-lg-4">
                                            <input type="Date" name="cdate" id="cdate" class="form-control" placeholder="Enter date">
                                        </div>
                                        <label class="col-lg-2 col-form-label">Amount:</label>
                                        <div class="col-lg-4">
                                            <input type="Number" name="cdamount" id="cdamount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Start Date:</label>
                                        <div class="col-lg-4">
                                            <input type="date" name="csdate" id="csdate" class="form-control" placeholder="Enter start date">
                                        </div>
                                        <label class="col-lg-2 col-form-label">Amount:</label>
                                        <div class="col-lg-4">
                                            <input type="Number" name="csdamount" id="csdamount" class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Frequency:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="frequency" id="frequency" class="form-control" placeholder="Enter Frequency">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Group:</label>
                                        <div class="col-lg-6">
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio kt-radio--solid">
                                                    <input onclick="document.getElementById('cdebit').disabled = false; document.getElementById('cdebit').disabled = true;" type="radio" name="cgroup" id="cgroup" value="cuc" checked> Continue untill cancelled
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input onclick="document.getElementById('cdebit').disabled = true; document.getElementById('cdebit').disabled = false;" type="radio" name="cgroup" id="cgroup" value="2" > Untill
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Debit:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="cdebit" id="cdebit" class="form-control" placeholder="Enter debit" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-9"></div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="Cancel" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon kt-hidden">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Card Details
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form">
                            <div class="kt-portlet__body">
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Card Type:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="ctype" id="ctype" class="form-control" placeholder="Enter card type">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label class="col-lg-2 col-form-label">Cardholder Name:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="cname" id="cname" class="form-control" placeholder="Enter cardholder name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Card Number:</label>
                                        <div class="col-lg-10">
                                            <input type="Number" name="cnumber" id="cnumber" class="form-control" placeholder="Enter card number">
                                        </div>                                
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Expiry:</label>
                                        <div class="col-lg-1">
                                            <input type="text" name="cexpiry1" id="cexpiry1" class="form-control">
                                        </div><span>/</span>
                                        <div class="col-lg-1">
                                            <input type="text" name="cexpiry2" id="cexpiry2" class="form-control">
                                        </div>
                                        <div class="col-lg-2"></div>
                                        <label class="col-lg-2 col-form-label">CVV:</label>
                                        <div class="col-lg-2">
                                            <input type="text" name="ccvv" id="ccvv" class="form-control" placeholder="Enter debit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon kt-hidden">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Authorisation
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form">
                            <div class="kt-portlet__body">
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">First Name:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter first name">
                                        </div>
                                        <label class="col-lg-2 col-form-label">Last Name:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Signature:</label>
                                        <div class="col-lg-4">
                                            <input type="textarea" name="signature" id="signature" class="form-control">
                                        </div>  
                                        <label class="col-lg-2 col-form-label">Date:</label>
                                        <div class="col-lg-4">
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>                              
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                       <div class="col-lg-9"></div>
                                       <div class="col-lg-3">
                                        <button type="reset" class="btn btn-brand">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

<script>
    function disableButton() {
        var btn = document.getElementById('btn');
        
        btn.disabled = true;
        
    }
</script>

<?php } else  {
    header('location: login.php');
}