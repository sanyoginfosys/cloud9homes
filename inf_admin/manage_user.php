<?php
session_start();

if(isset($_SESSION['INFCRM_UserID'])) {
include_once('base/functions.php');
include_once('base/db_conn.php');
include_once('siteconfig.php');

if(Check_UserPermission('Manage User', 'user_view', $_SESSION['INFCRM_UserID'])){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage User | <?php echo SITE_TITLE; ?></title>
	<?php include_once('includes/header.php'); ?>
	
</head>
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
					
					<div class="kt-portlet kt-portlet--mobile">
						<div class="kt-portlet__head kt-portlet__head--lg">
							<div class="kt-portlet__head-label">
								<span class="kt-portlet__head-icon">
									<i class="kt-font-brand flaticon2-line-chart"></i>
								</span>
								<h3 class="kt-portlet__head-title">
									User Data
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
												<div class="col-md-12 kt-margin-b-20-tablet-and-mobile">
													<div class="kt-input-icon kt-input-icon--left">
														<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
														<span class="kt-input-icon__icon kt-input-icon__icon--left">
															<span><i class="la la-search"></i></span>
														</span>
													</div>
												</div>
											</div>
											<div class="col-md-2"></div>
											<div class="col-md-4">
												<div style="margin-left: 25px;">
													<?php if(Check_UserPermission('Manage User', 'user_update', $_SESSION['INFCRM_UserID'])){ ?>
													<button type="button" id="open_modal_5" class="btn btn-brand btn-icon-sm">Bulk Role Update
													</button><?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
	<script src="Sec_Api/manage_user.js" type="text/javascript"></script>
	<script src="assets/app/custom/general/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
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
										User Details
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

<?php if(Check_UserPermission('Manage User', 'user_update', $_SESSION['INFCRM_UserID'])){ ?>
<script type="text/javascript">	
	$(document).on('click', '.edit-user-detail-btn', function(){
		var uniqueid = $(this).attr('id');
		$('#uniqueid_mod').attr('value',uniqueid);
		$.ajax({
			url:"Sec_Api/edit-user-detail.php",
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

	function changeRole(roleID){
		$.ajax({
			url:"Sec_Api/dyn_display_new_role.php",
			method:"post",
			data:{roleID:roleID},
			success:function(data){
				$('#dyn_new_role').html(data);
			}
		});
		$('.dyn-dis-btn').css({ 'display' : ''});
	}
</script>

<script type="text/javascript">
	$(document).on('click', '.bulk-role-btn', function(){	
		
		var user_role = $( "#usrole option:selected" ).val();
		var new_user_role = $( "#newrole option:selected" ).val();
		var dataUser = 'user_role=' + user_role + '&new_user_role=' + new_user_role;
 		 $.ajax({
		 	url:"Sec_Api/update_bulk_role.php",
		 	method:"post",
		 	data:dataUser,
		 	success:function(data){
		 		$('#modal-5').modal('hide');
				location.reload();
		 	}
		 });
	});
	$(document).on('click', '.cancelBtn', function(){
		$('#modal-5').modal('hide');
	});


</script>

<script type="text/javascript">

	$(document).on('click', '#open_modal_5', function(){

		$('#kt_modal_5').modal('show');
		$('#dyn_new_role').empty();
		$('.dyn-dis-btn').css({ 'display' : 'none'});

	});



	$(document).on('click', '.update-user-btn', function(){
		var first_name = $('#cfname').val();
		var last_name = $('#clname').val();
		var phoneNo = $('#cphone').val();
		var email_id = $('#cemail').val();
		var gender = $('#cgender').val();
		var dob = $('#cdob').val();
		var user_role_id = $( "#urole option:selected" ).val();
		var uniqueid_var = $('#uniqueid_mod').attr('value');
		var dataForm = 'first_name=' + first_name + '&last_name=' + last_name + '&phoneNo=' + phoneNo + '&email_id=' + email_id + '&gender=' + gender + '&dob=' + dob + '&user_role_id=' + user_role_id + '&uniqueid=' + uniqueid_var;

		$.ajax({
			url:"Sec_Api/edit_upload_user_data.php",
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



</script>


<div id='kt_modal_5' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog modal-lg' role='document'>
		<div class='modal-content'>
			<div class='kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor'>
				<div class='kt-content  kt-grid__item kt-grid__item--fluid' id='kt_content'>
					<div class='kt-portlet'>
						<div class='kt-portlet__head'>
							<div class='kt-portlet__head-label'>
								<div class='modal-header'>
									<h3 class='kt-portlet__head-title'>
										Update Role
									</h3>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
									</button>
								</div>
							</div>
						</div>
						<div class='modal-body' id='updatemodal'>
							<div class='kt-portlet__body'>
								<div class='kt-form__section kt-form__section--first'>
									<div class='form-group row' id="dyn_new_btn_ref">
										<label class='col-lg-2 col-form-label'>Role :</label>
										<div class='col-lg-6'>
											<select class='form-control' id='usrole' onchange="changeRole(this.value);">
												<?php Admin_Bulk_Role(); ?>
											</select>
										</div>
									</div>
									<div class='form-group row' id="dyn_new_role">

									</div>
								</div>
							</div>

							<div class='kt-form__actions'>
								<div class='row'>
									<div class='col-lg-9'></div>
									<div class='col-lg-3' id="submit_btn_dyn">
										<div class='modal-footer dyn-dis-btn' style="display: none;">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="bulk-role-btn btn btn-primary" form="addrole">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }} else  {
	header('location: login.php');
}