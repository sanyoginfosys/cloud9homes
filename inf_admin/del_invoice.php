<?php
include_once ('base/functions.php');

?>
<!DOCTYPE html>
<?php include_once 'siteconfig.php'; ?>

<?php if(isset($_GET['inv'])) 
{ 
    if($_GET['inv'] != "") {
        $formField = Customer_Data($_GET['inv']);
    }
}
?>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Simpleffi | Direct Debit Authorisation Form</title>
    <meta name="description" content="Wizard examples">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="<?php echo ADMIN_URL; ?>assets/app/custom/wizard/wizard-v2.default.css" rel="stylesheet" type="text/css" />
    <?php include_once 'includes/header.php'; ?>
    <link rel="shortcut icon" href="<?php echo ADMIN_URL; ?>assets/media/logos/favicon.ico" />

    <style type="text/css">
        @media (min-width: 300px) {
            .wrapper_custom { padding-right: 20px; padding-left: 20px; }
        }s
        @media (min-width: 1024px) {
            .wrapper_custom { padding-right: 40px; padding-left: 40px; }
        }
        @media (min-width: 1080px) {
            .wrapper_custom { padding-right: 80px; padding-left: 80px; }
        }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subhepader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

          
        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor wrapper_custom" id="kt_wrapper">
            
            <div style="padding-left: 50px; padding-top: 10px;">
                <img src="<?php echo ADMIN_URL; ?>Simpleffi_Logo.png" style="width: 7%;">
                <div style="display: inline-block; float: right; padding-top: 3%; padding-right: 25px;">
                    <h2>Direct Debit Authorisation Form</h2>
                </div>
            </div>

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
                        <form class="kt-form" method="POST" action="newfile.php">
                            <div class="kt-portlet__body">
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">First Name:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="cfname" id="cfname" class="form-control" placeholder="Enter first name" value="<?php echo $formField[1]; ?>" disabled>
                                        </div>
                                        <label class="col-lg-2 col-form-label">Last Name:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="clname" id="clname" class="form-control" placeholder="Enter last name" value="<?php echo $formField[2]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Business Name:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="cbname" id="cbname" class="form-control" placeholder="Enter buniess name" value="<?php echo $formField[3]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Mobile:</label>
                                        <div class="col-lg-10">
                                            <input type="Number" name="cphone" id="cphone" class="form-control" placeholder="Enter mobile number" value="<?php echo $formField[4]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Email:</label>
                                        <div class="col-lg-10">
                                            <input type="Email" name="cemail" id="cemail" class="form-control" placeholder="Enter email" value="<?php echo $formField[5]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Address:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="caddress" id="caddress" class="form-control" placeholder="Enter address" value="<?php echo $formField[6]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Suburb:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="csuburb" id="csuburb" class="form-control" placeholder="Enter suburb" value="<?php echo $formField[7]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">State:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="cstate" id="cstate" class="form-control" placeholder="Enter state" value="<?php echo $formField[8]; ?>" disabled>
                                        </div>
                                        <label class="col-lg-2 col-form-label">Post:</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="cpost" id="cpost" class="form-control" placeholder="Enter post" value="<?php echo $formField[9]; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                        <form class="kt-form" method="POST" action="newfile.php">
                            <div class="kt-portlet__body">
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Select Option:</label>
                                        <div class="col-lg-6">
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio"  name="coption" id="coption" value="Once" <?php if($formField[10] == "Once"){ echo "checked"; } else {echo "disabled"; }; ?>> Once
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input type="radio" name="coption" id="coption" value="Regular" <?php if($formField[10] == "Regular"){ echo "checked"; } else {echo "disabled"; }; ?>> Regular
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Date:</label>
                                        <div class="col-lg-4">
                                            <input type="Date" name="cdate" id="cdate" class="form-control" placeholder="Enter date" value="<?php echo $formField[12]; ?>" disabled>
                                        </div>
                                        <label class="col-lg-2 col-form-label">Amount:</label>
                                        <div class="col-lg-4">
                                            <input type="Number" name="cdamount" id="cdamount" class="form-control" value="<?php echo $formField[14]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Start Date:</label>
                                        <div class="col-lg-4">
                                            <input type="date" name="csdate" id="csdate" class="form-control" placeholder="Enter start date" value="<?php echo $formField[13]; ?>" disabled>
                                        </div>
                                        <label class="col-lg-2 col-form-label">Amount:</label>
                                        <div class="col-lg-4">
                                            <input type="Number" name="csdamount" id="csdamount" class="form-control" value="<?php echo $formField[15]; ?>" disabled>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Frequency:</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="frequency" id="frequency" class="form-control" placeholder="Enter Frequency" value="<?php echo $formField[16]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Group:</label>
                                        <div class="col-lg-6">
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio kt-radio--solid">
                                                    <input onclick="document.getElementById('cdebit').disabled = false; document.getElementById('cdebit').disabled = true;" type="radio" name="cgroup" id="cgroup" <?php if($formField[11] == "cuc") { echo "checked"; } else { echo "disabled"; }; ?>> Continue untill cancelled
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio kt-radio--solid">
                                                    <input onclick="document.getElementById('cdebit').disabled = true; document.getElementById('cdebit').disabled = false;" type="radio" name="cgroup" id="cgroup" <?php if($formField[11] != "cuc") { echo "checked"; } else { echo "disabled"; }; ?>> Untill
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Debit:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="cdebit" id="cdebit" class="form-control" placeholder="Enter debit" disabled <?php if($formField[11] != "cuc") { echo "value=\"".$formField[11]."\"";} else { }; ?>>
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


           
        </div>
    </div>


</div>

 <?php include_once ('includes/footer-greet.php'); ?>
<!-- end:: Page -->






<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/components/vendors/bootstrap-switch/init.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/components/vendors/bootstrap-markdown/init.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/components/vendors/bootstrap-notify/init.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/custom/components/vendors/sweetalert2/init.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

<script src="<?php echo ADMIN_URL; ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/app/bundle/app.bundle.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_URL; ?>assets/app/custom/general/crud/metronic-datatable/base/data-local.js" type="text/javascript"></script>

</body>
<!-- end::Body -->
</html>

<script>
    function disableButton() {
        var btn = document.getElementById('btn');
        
        btn.disabled = true;
        
    }
</script>