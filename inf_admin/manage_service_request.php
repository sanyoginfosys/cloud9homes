<?php
session_start();
if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('siteconfig.php');
	include_once('base/functions.php');
if(Check_UserPermission('Manage Service Request', 'user_view', $_SESSION['INFCRM_UserID'])){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Service Request | <?php echo SITE_TITLE; ?></title>
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
			if(isset($_GET['error'])){
				if ($_GET['error'] == 10) {
					?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Oops, Error occured! No Address Found for the Property.</div>
					</div>
					<?php
				}
				if ($_GET['error'] == 22342423) {
					?>
					<div class="alert alert-danger" role="alert">
						<div class="alert-text">Please fill the details first.</div>
					</div>
					<?php
				}
			}
			if(isset($_GET['success'])){
				?>
				<div class="alert alert-success" role="alert">
					<div class="alert-text">Property is live now!<br /><br />View Now : <a href="<?php echo HOME_URL.'property/'.$_GET['success']; ?>"><?php echo HOME_URL.'property/'.$_GET['success']; ?></a></div>
				</div>
				<?php
			}
			?>
			<?php include_once ('includes/subheader.php'); ?>

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
				
				<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
					
					<div class="kt-portlet kt-portlet--mobile">
						<div class="kt-portlet__head kt-portlet__head--lg">
							<div class="kt-portlet__head-label">
								<span class="kt-portlet__head-icon">
									<i class="kt-font-brand flaticon2-phone"></i>
								</span>
								<h3 class="kt-portlet__head-title">
									Service Requests
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
											<!-- <div class="col-md-4">
												<div style="margin-left: 25px;">
													
													<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_5"><i class="flaticon2-plus"></i> Add Customer
													</button> 
												</div>
											</div> -->
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
	<script src="tables/js/manage_service_request.js" type="text/javascript"></script>
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
										Lead Property Details
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

<?php if(Check_UserPermission('Manage Service Request', 'user_view', $_SESSION['INFCRM_UserID'])){ ?>
<script type="text/javascript">	
	$(document).on('click', '.edit-cust-btn', function(){
		var uniqueid = $(this).attr('id');
		$('#uniqueid_mod').attr('value',uniqueid);
		$.ajax({
			url:"Sec_Api/view-lead-property.php",
			method:"post",
			data:{uniqueid:uniqueid},
			success:function(data){
				$('#edit_modal_base').html(data);
				$('#modal-4').modal('show');
			}
		});
	})
</script>
<?php } ?>

<script type="text/javascript">
	$(document).on('click', '.cancelBtn', function(){
		$('#modal-4').modal('hide');
	});

	jQuery(document).ready(function() {
		LoadTable();
	});
</script>


<?php } else   {
    header('location: login.php');
} } else   {
    header('location: login.php');
} ?>