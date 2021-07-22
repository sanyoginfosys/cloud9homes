<?php

session_start();

if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('base/functions.php');
	include_once('base/db_conn.php');
include_once('siteconfig.php');

	if(Check_UserPermission('Manage Customer', 'user_view', $_SESSION['INFCRM_UserID'])){



if(isset($_POST['cfname']) AND isset($_POST['clname']) AND isset($_POST['cbname']) AND isset($_POST['cphone']) AND isset($_POST['cemail']) AND isset($_POST['caddress']) AND isset($_POST['csuburb']) AND isset($_POST['cstate']) AND isset($_POST['cpost']) AND isset($_POST['coption']) AND isset($_POST['cgroup']) AND isset($_POST['cdate'])  AND isset($_POST['csdate']) AND isset($_POST['cdamount']) AND isset($_POST['csdamount']) AND isset($_POST['frequency']))  
{
	if($_POST['cfname'] != NULL AND $_POST['clname'] != NULL AND $_POST['cbname'] != NULL AND $_POST['cphone'] != NULL AND $_POST['cemail'] != NULL AND $_POST['caddress'] != NULL AND $_POST['csuburb'] != NULL AND $_POST['cstate'] != NULL  AND $_POST['cpost'] != NULL  AND $_POST['coption'] != NULL  AND $_POST['cgroup'] != NULL AND $_POST['cdate'] != NULL  AND $_POST['csdate'] != NULL  AND $_POST['cdamount'] != NULL  AND $_POST['csdamount'] != NULL  AND $_POST['frequency'] != NULL) 
	{
		$response = Add_Customer_Details($_POST['cfname'], $_POST['clname'],$_POST['cbname'],$_POST['cphone'],$_POST['cemail'],$_POST['caddress'], $_POST['csuburb'], $_POST['cstate'], $_POST['cpost'], $_POST['coption'], $_POST['cgroup'], $_POST['cdate'], $_POST['csdate'], $_POST['cdamount'], $_POST['csdamount'], $_POST['frequency'] , $_POST['cdebit']);
		if($response != 0){
			header('location: edit_customer_details.php?resp=1&uid='.$response);
		}   else   {
			header('location: edit_customer_details.php?resp=10');
		}
	}
	else
	{
		header('location: edit_customer_details.php?resp=2');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Details | <?php echo SITE_TITLE; ?></title>
	<?php include_once('includes/header.php'); ?>
	<link rel="stylesheet" type="text/css" href="assets/vendors/custom/vendors/flaticon2/font/flaticon2.ttf">
	<link rel="stylesheet" type="text/css" href="assets/vendors/custom/vendors/flaticon2/font/flaticon2.woff">
	
</head>
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
						<div class="alert-text">Customer added successfully!<br /><br />Unique Link : <a href="invoice.php"><?php echo ADMIN_URL; echo $_GET['uid']; ?></a></div>
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
				if ($_GET['resp'] == 2) {
					?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Please fill the details first.</div>
					</div>
					<?php
				}
			}
			?>
			<?php include_once ('includes/subheader.php'); ?>

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
				
				<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
					
					<div class="kt-portlet kt-portlet--mobile">
						<div class="kt-portlet__head kt-portlet__head--lg">
							<div class="kt-portlet__head-label">
								<span class="kt-portlet__head-icon">
									<i class="kt-font-brand flaticon2-line-chart"></i>
								</span>
								<h3 class="kt-portlet__head-title">
									Customer Data
								</h3>
							</div>
						</div>
						<div class="kt-portlet__body">

							<!--begin: Search Form -->
							<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
								<div class="row align-items-center">
									<div class="col-md-12 order-2 order-xl-1">
										<div class="row align-items-center">
											<div class="col-md-6 kt-margin-b-20-tablet-and-mobile">
												<div class="kt-input-icon kt-input-icon--left">
													<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
													<span class="kt-input-icon__icon kt-input-icon__icon--left">
														<span><i class="la la-search"></i></span>
													</span>
												</div>
											</div>
											<div class="col-md-2"></div>
											<div class="col-md-4">
												<div style="margin-left: 25px;">
													<?php if(Check_UserPermission('Manage Customer', 'user_create', $_SESSION['INFCRM_UserID'])){ ?>
													<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_5"><i class="flaticon2-plus"></i> Add Customer
													</button> <?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end: Search Form -->
						</div>
						<div class="kt-portlet__body kt-portlet__body--fit">
							<!--begin: Datatable -->
							<div class="kt-datatable" id="local_data"></div>
							<!--end: Datatable -->
						</div>
					</div>
				</div>
				<?php include_once ('includes/footer-greet.php'); ?>
			</div>
		</div>
	</div>
	<!-- end:: Page -->
	<?php include 'includes/footer.php'?>
	<script src="assets/app/custom/general/crud/metronic-datatable/base/data-local.js" type="text/javascript"></script>
	<!-- <script src="assets/app/custom/general/crud/metronic-datatable/base/data-local.js" type="text/javascript"></script> -->
</body>
</html>

<div id='modal-4' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog modal-lg' role='document'>
		<div class='modal-content'>
			<div class='kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor'>
				<div class='kt-content  kt-grid__item kt-grid__item--fluid' id='kt_content'>
					<div class='kt-portlet'>
						<div class='kt-portlet__head'>
							<div class='kt-portlet__head-label'>
								<div class='modal-header'>
									<h3 class='kt-portlet__head-title'>
										Customer Details
									</h3>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
									</button>
								</div>
							</div>
						</div>
						<div id="uniqueid_mod" style="display: none;"></div>
						<div id="edit_modal_base"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(Check_UserPermission('Manage Customer', 'user_update', $_SESSION['INFCRM_UserID'])){ ?>
<script type="text/javascript">	
	$(document).on('click', '.edit-cust-btn', function(){
		var uniqueid = $(this).attr('id');
		$('#uniqueid_mod').attr('value',uniqueid);
		$.ajax({
			url:"Sec_Api/edit-customer-detail.php",
			method:"post",
			data:{uniqueid:uniqueid},
			success:function(data){
				$('#edit_modal_base').html(data);
				$('#modal-4').modal('show');
			}
		});
	})

	$(document).on('change', '#cgroup', function(){
		if ($(this).attr('value') == "cuc"){
			$('#cdebit').val('');
			$('#cdebit').prop({
				disabled: 'true'
			});
		}	else {
			$('#cdebit').prop("disabled", false);
		}
	});

</script>
<?php } ?>

<script type="text/javascript">

	$(document).on('click', '.update-customer-btn', function(){
		var first_name = $('#cfname').val();
		var last_name = $('#clname').val();
		var business_name = $('#cbname').val();
		var mobile = $('#cphone').val();
		var email = $('#cemail').val();
		var address = $('#caddress').val();
		var suburb = $('#csuburb').val();
		var state = $('#cstate').val();
		var post = $('#cpost').val();
		var dd_option = $('input[name=coption]:checked').val();
		var dd_group = $('input[name=cgroup]:checked').val();
		var dd_date = $('#cdate').val();
		var dd_start_date = $('#csdate').val();
		var dd_date_amount = $('#cdamount').val();
		var dd_start_date_amount = $('#csdamount').val();
		var frequency = $('#frequency').val();
		var c_debit = $('#cdebit').val();

		var uniqueid_var = $('#uniqueid_mod').attr('value');
		var dataForm = 'first_name=' + first_name + '&last_name=' + last_name + '&business_name=' + business_name + '&mobile=' + mobile + '&email=' + email + '&address=' + address + '&suburb=' + suburb + '&state=' + state + '&post=' + post + '&dd_option=' + dd_option + '&dd_group=' + dd_group + '&dd_date=' + dd_date + '&dd_start_date=' + dd_start_date + '&dd_date_amount=' + dd_date_amount + '&dd_start_date_amount=' + dd_start_date_amount + '&frequency=' + frequency + '&cdebit=' + c_debit + '&uniqueid=' + uniqueid_var;
		$.ajax({
			url:"Sec_Api/edit_upload_customer_data.php",
			method:"post",
			data:dataForm,
			success:function(data){
				$('#modal-4').modal('hide');
				location.reload();
				// ReloadTable();
			}
		});	
	});

	$(document).on('click', '.cancelBtn', function(){
		$('#modal-4').modal('hide');
	});


	jQuery(document).ready(function() {
		LoadTable();
	});
</script>

<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class='modal-dialog modal-lg' role='document'>
		<div class='modal-content'>
			<div class='kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor'>
				<div class='kt-content  kt-grid__item kt-grid__item--fluid' id='kt_content'>
					<div class='kt-portlet'>
						<div class='kt-portlet__head'>
							<div class='kt-portlet__head-label'>
								<div class='modal-header'>
									<h3 class='kt-portlet__head-title'>
										Customer Details
									</h3>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
									</button>
								</div>	
							</div>
						</div>
						<div class='modal-body' id='updatemodal'>
							<div class='kt-portlet__body'>
								<div class='kt-form__section kt-form__section--first'>
									<form  class='kt-form' method="POST" action="edit_customer_details.php">
										<div class='form-group row'>
											<label class='col-lg-2 col-form-label'>First Name</label>
											<div class='col-lg-4'>
												<input type='text' name='cfname' id='cfname' class='form-control' placeholder='Enter first name'>
											</div>
											<label class='col-lg-2 col-form-label'>Last Name</label>
											<div class='col-lg-4'>
												<input type='text' name='clname' id='clname' class='form-control' placeholder='Enter last name'>
											</div>
										</div>
										<div class='form-group row'>
											<label class='col-lg-2 col-form-label'>Business Name</label>
											<div class='col-lg-10'>
												<input type='text' name='cbname' id='cbname' class='form-control' placeholder='Enter buniess name'>
											</div>
										</div>
										<div class='form-group row'>
											<label class='col-lg-2 col-form-label'>Mobile</label>
											<div class='col-lg-10'>
												<input type='Number' name='cphone' id='cphone' class='form-control' placeholder='Enter mobile number'>
											</div>
										</div>
										<div class='form-group row'>
											<label class='col-lg-2 col-form-label'>Email</label>
											<div class='col-lg-10'>
												<input type='Email' name='cemail' id='cemail' class='form-control' placeholder='Enter email'>
											</div>
										</div>
										<div class='form-group row'>
											<label class='col-lg-2 col-form-label'>Address</label>
											<div class='col-lg-10'>
												<input type='text' name='caddress' id='caddress' class='form-control' placeholder='Enter address'>
											</div>
										</div>
										<div class='form-group row'>
											<label class='col-lg-2 col-form-label'>Suburb</label>
											<div class='col-lg-10'>
												<input type='text' name='csuburb' id='csuburb' class='form-control' placeholder='Enter suburb'>
											</div>
										</div>
										<div class='form-group row'>
											<label class='col-lg-2 col-form-label'>State</label>
											<div class='col-lg-4'>
												<input type='text' name='cstate' id='cstate' class='form-control' placeholder='Enter state'>
											</div>
											<label class='col-lg-2 col-form-label'>Post</label>
											<div class='col-lg-4'>
												<input type='text' name='cpost' id='cpost' class='form-control' placeholder='Enter post'>
											</div>
										</div>
									</div>
								</div>
								<!--end::Form-->
								<div class='kt-portlet'>
									<div class='kt-portlet__head'>
										<div class='kt-portlet__head-label'>
											<span class='kt-portlet__head-icon kt-hidden'>
												<i class='la la-gear'></i>
											</span>
											<h3 class='kt-portlet__head-title'>
												Direct Debit Details
											</h3>
										</div>
									</div>

									<!--begin::Form-->
									<div class='kt-portlet__body'>
										<div class='kt-form__section kt-form__section--first'>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Select Option</label>
												<div class='col-lg-6'>
													<div class='kt-radio-inline'>
														<label class='kt-radio kt-radio--solid'>
															<input type='radio'  name='coption' id='coption' checked value='Once'>Once
															<span></span>
														</label>
														<label class='kt-radio kt-radio--solid'>
															<input type='radio' name='coption' id='coption' value='Regular'>Regular
															<span></span>
														</label>
													</div>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Date</label>
												<div class='col-lg-4'>
													<input type='Date' name='cdate' id='cdate' class='form-control' placeholder='Enter date'>
												</div>
												<label class='col-lg-2 col-form-label'>Amount</label>
												<div class='col-lg-4'>
													<input type='Number' name='cdamount' id='cdamount' class='form-control'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Start Date</label>
												<div class='col-lg-4'>
													<input type='date' name='csdate' id='csdate' class='form-control' placeholder='Enter start date'>
												</div>
												<label class='col-lg-2 col-form-label'>Amount</label>
												<div class='col-lg-4'>
													<input type='Number' name='csdamount' id='csdamount' class='form-control'>
												</div>

											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Frequency</label>
												<div class='col-lg-10'>
													<input type='text' name='frequency' id='frequency' class='form-control' placeholder='Enter Frequency'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Group</label>
												<div class='col-lg-6'>
													<div class='kt-radio-inline'>
														<label class='kt-radio kt-radio--solid'>
															<input type='radio' name='cgroup' id='cgroup' value='cuc'> Continue untill cancelled
															<span></span>
														</label>
														<label class='kt-radio kt-radio--solid'>
															<input type='radio' name='cgroup' id='cgroup' value='2'> Untill
															<span></span>
														</label>
													</div>
												</div>
											</div>

											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Debit</label>
												<div class='col-lg-10'>
													<input type='text' name='cdebit' id='cdebit' class='form-control' placeholder='Enter debit'>
												</div>
											</div>
										</div>
									</div>
									<div class='kt-portlet__foot'>
										<div class='kt-form__actions'>
											<div class='row'>
												<div class='col-lg-9'></div>
												<div class='col-lg-3'>
													<div class='modal-footer'>
														<button type="Submit" class="btn btn-brand">Submit</button>
														<button type="Cancel" class="btn btn-secondary">Cancel</button>
													</div>
												</div>
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
	</div>
</div>

<?php } else   {
    header('location: login.php');
} } else   {
    header('location: login.php');
} ?>