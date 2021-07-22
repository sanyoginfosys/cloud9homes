<?php
session_start();
if (isset($_SESSION['INFCRM_UserID'])) {
	include_once('siteconfig.php');
	include_once('base/functions.php');
	if (Check_UserPermission('Manage Property', 'user_view', $_SESSION['INFCRM_UserID'])) {
		if (isset($_POST['propertytype'], $_POST['transaction'], $_FILES)) {
			if (Check_UserPermission('Manage Property', 'user_update', $_SESSION['INFCRM_UserID'])) {
			}
		}

?>
		<!DOCTYPE html>
		<html>

		<head>
			<title>Add Property | <?php echo SITE_TITLE; ?></title>
			<?php include_once('includes/header.php'); ?>
			<link rel="stylesheet" type="text/css" href="assets/vendors/custom/vendors/flaticon2/font/flaticon2.ttf">
			<link rel="stylesheet" type="text/css" href="assets/vendors/custom/vendors/flaticon2/font/flaticon2.woff">
			<style>
				.container {
					position: relative;
				}

				.image {
					display: block;
					width: 100%;
					height: auto;
				}

				.overlay {
					position: absolute;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					height: 100%;
					width: 100%;
					opacity: 0;
					transition: .3s ease;
				}

				.container:hover .overlay {
					opacity: 1;
				}

				.icon {
					color: white;
					font-size: 50px;
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-50%, -50%);
					-ms-transform: translate(-50%, -50%);
					text-align: center;
				}

				.fa-trash:hover {
					color: red;
				}
			</style>
		</head>

		<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subhepader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

			<!-- begin:: Page -->

			<?php include_once('includes/header-mobile.php'); ?>

			<div class="kt-grid kt-grid--hor kt-grid--root">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

					<?php include_once('includes/aside.php'); ?>
				</div>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					<?php
					if (isset($_GET['error'])) {
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
					if (isset($_GET['success'])) {
						?>
						<div class="alert alert-success" role="alert">
							<div class="alert-text">Property is live now!<br /><br />View Now : <a href="<?php echo HOME_URL . 'property/' . $_GET['success']; ?>"><?php echo HOME_URL . 'property/' . $_GET['success']; ?></a></div>
						</div>
					<?php
					}
					?>
					<?php include_once('includes/subheader.php'); ?>
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
							<form class="kt-form kt-form--label-right" action="Sec_Api/add_advertise.php" method="POST" enctype="multipart/form-data">
								<div class="kt-portlet__body">
									<div class="form-group row">
										<div class="col-lg-12">
											<label>Advertise Name:</label>
											<input name="advertise_name" type="text" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2" style="text-align:left !important;">Advertise Image:</label>
										<div class="custom-file col-lg-10">
											<input class="custom-file-input" name="advertise_image[]" id="advertise_image" type="file" style="text-align:left !important;">
											<label class="custom-file-label" for="customFile" style="left:10px;right:10px;text-align:left !important;">Choose file</label>
										</div>
									</div>
								</div>
								<div class="kt-portlet__foot">
									<div class="kt-form__actions">
										<div class="row">
											<div class="col-lg-4"></div>
											<div class="col-lg-8">
												<button type="submit" class="btn btn-primary">Add</button>
												<a href="manage_advertise.php" class="btn btn-secondary">Cancel</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php include_once('includes/footer-greet.php'); ?>
					</div>
				</div>
			</div>
			<!-- end:: Page -->
			<?php include 'includes/footer.php' ?>
			<script src="//maps.google.com/maps/api/js?key=AIzaSyAPU1ttZ3TXHVdP98xt-cAcUgBQkTV8LrA" type="text/javascript"></script>
			<script src="assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
			<!-- <script src="assets/app/custom/general/crud/metronic-datatable/base/data-local.js" type="text/javascript"></script> -->
		</body>

		</html>

		<?php if (Check_UserPermission('Manage Property', 'user_view', $_SESSION['INFCRM_UserID'])) { ?>
			<script type="text/javascript">
				$(document).on('click', '.edit-cust-btn', function() {
					var uniqueid = $(this).attr('id');
					$('#uniqueid_mod').attr('value', uniqueid);
					$.ajax({
						url: "Sec_Api/view_property.php",
						method: "post",
						data: {
							uniqueid: uniqueid
						},
						success: function(data) {
							$('#edit_modal_base').html(data);
							$('#modal-4').modal('show');
						}
					});
				})
			</script>
		<?php } ?>

		<script type="text/javascript">
			$(document).on('click', '.cancelBtn', function() {
				$('#modal-4').modal('hide');
			});

			jQuery(document).ready(function() {
				LoadTable();
			});
		</script>


<?php } else {
		header('location: login.php');
	}
} else {
	header('location: login.php');
} ?>