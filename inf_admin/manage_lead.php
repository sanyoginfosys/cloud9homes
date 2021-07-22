<?php
session_start();

if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('base/functions.php');
	include_once('siteconfig.php');

	if(Check_UserPermission('Manage Lead', 'user_view', $_SESSION['INFCRM_UserID'])){

	if(isset($_POST['lname']) AND isset($_POST['laddress']) AND isset($_POST['llocation']) AND isset($_POST['lphone']) AND isset($_POST['lemail']) AND isset($_POST['linquiry']) AND isset($_POST['lstatus']) AND isset($_POST['ltype']))
	{


		if($_POST['lname'] != NULL AND $_POST['laddress'] != NULL AND $_POST['llocation'] != NULL AND $_POST['lphone'] != NULL AND $_POST['lemail'] != NULL AND $_POST['linquiry'] != NULL AND $_POST['lstatus'] != NULL AND $_POST['ltype'] != NULL){

			$response = Add_Leads_Details($_POST['lname'],$_POST['laddress'],$_POST['llocation'],$_POST['lphone'],$_POST['lemail'],$_POST['linquiry'],$_POST['lstatus'],$_POST['ltype'], $_SESSION['INFCRM_UserID']);

			if($response != 0){
				header('location: manage_lead.php?resp=21');
			}
			else
			{
				header('location: manage_lead.php?resp=1');
			}
		}
	}

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Manage Lead | <?php echo SITE_TITLE; ?></title>
		<?php include_once('includes/header.php'); ?>

		<link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />


	</head>
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subhepader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<?php include_once('includes/header-mobile.php'); ?>

		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<?php include_once ('includes/aside.php'); ?>
			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<?php if(isset($_GET['resp'])){
					if($_GET['resp'] == 21) {
						?>
						<div class="alert alert-success" role="alert">
							<div class="alert-text">New Lead Added Successfully!!</div>
						</div>
						<?php
					}   else    {
						if($_GET['resp'] == 1){?>
							<div class="alert alert-danger" role="alert">
								<div class="alert-text">Error!!!</div>
							</div>

							<?php
						}
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
										Manage Lead
									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-wrapper">
										<div class="kt-portlet__head-actions">
											<div class="dropdown dropdown-inline">
												<button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="la la-download"></i> Export
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<ul class="kt-nav">
														<li class="kt-nav__section kt-nav__section--first">
															<span class="kt-nav__section-text">Choose an option</span>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" aria-controls="example">
																<i class="kt-nav__link-icon la la-print" aria-controls="example"></i>
																<span class="kt-nav__link-text">Print</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-copy"></i>
																<span class="kt-nav__link-text">Copy</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-file-excel-o"></i>
																<span class="kt-nav__link-text">Excel</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-file-text-o"></i>
																<span class="kt-nav__link-text">CSV</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" class="dt-button buttons-pdf buttons-html5" aria-controls="example">
																<i class="kt-nav__link-icon la la-file-pdf-o"></i>
																<span class="kt-nav__link-text">PDF</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
											&nbsp;
											 <?php if(Check_UserPermission('Manage Lead', 'user_create', $_SESSION['INFCRM_UserID'])){ ?>
											<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_6"><i class="flaticon2-plus"></i> Add Lead
											</button> <?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body">

								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									<thead>
										<tr>
											<th>Sr No</th>
											<th>Date</th>
											<th>Name</th>
											<th>Address</th>
											<th>Location</th>
											<th>Phone No</th>
											<th>Email</th>
											<th>Inquiry For</th>
											<th>Status</th>
											<th>Type Of Lead</th>
											<th>User ID</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php Manage_Lead_Info(); ?>
									</tbody>
								</table>

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

		<script src="assets/app/custom/general/crud/datatables/basic/scrollable.js" type="text/javascript"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js" type="text/javascript"></script>
		<!-- <script src="assets/app/custom/general/crud/datatables/data-sources/html.js" type="text/javascript"></script> -->
		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

	</body>
	</html>

	<script type="text/javascript">
		$(document).on('change', '#ldstatus', function(){
			var status =  $(this).find('option:selected').val();
			var lead_no = $(this).attr('lead_no');
			var dataForm = 'status=' + status + '&lead_no=' + lead_no;
			$.ajax({
				url:"Sec_Api/edit_upload_lead_status_data.php",
				method:"post",
				data:dataForm,
				success:function(data){
					if(data == 0){
						alert("Error Occured. Please try again later.");
					}
				}
			});	
		});

		$(document).on('click', '.cancelBtn', function(){
			$('#modal-4').modal('hide');
		});

	</script>

	<script type="text/javascript">


	</script>

	<script type="text/javascript">	
		$(document).on('click', '.edit-lead-btn', function(){
			var uniqueid = $(this).attr('id');
			$('#uniqueid_mod').attr('value',uniqueid);
			$.ajax({
				url:"Sec_Api/edit-lead-detail.php",
				method:"post",
				data:{uniqueid:uniqueid},
				success:function(data){
					$('#edit_modal_base').html(data);
					$('#modal-4').modal('show');
				}
			});
		})
	</script>

	<script type="text/javascript">

		$(document).on('click', '.update-lead-btn', function(){


			var name = $('#ldname').val();
			var address = $('#ldaddress').val();
			var location = $('#ldlocation').val();
			var phone_no = $('#ldpno').val();
			var email = $('#ldemail').val();
			var inquiry_for = $( '#ldinquiry').val();
			var lead_date = $('#lddate').val();	
			var status = $('#ldstate').val();
			var type_of_lead = $( "#ldtype option:selected" ).val();

			var uniqueid_var = $('#uniqueid_mod').attr('value');

			var dataForm = 'name=' + name + '&address=' + address + '&location=' + location + '&phoneNo=' + phone_no + '&email=' + email + '&inquiry_for=' + inquiry_for + '&lead_date=' + lead_date + '&status=' + status + '&type_of_lead=' + type_of_lead + '&uniqueid=' + uniqueid_var;

			$.ajax({
				url:"Sec_Api/edit_upload_lead_data.php",
				method:"post",
				data:dataForm,
				success:function(data){

					$('#modal-4').modal('hide');
					window.location.reload();
				// ReloadTable();
			}
		});	
		});

		$(document).on('click', '.cancelBtn', function(){
			$('#modal-4').modal('hide');
		});
	</script>

	<script type="text/javascript">	
		$(document).on('click', '.delete-lead-btn', function(){
			var uniqueid = $(this).attr('id');
			$('#delete-lead-btn-i').attr('val',uniqueid);
			// $('#uniqueid_mod').attr('value',uniqueid);
			// //alert(uniqueid);
			// $.ajax({
			// 	url:"Sec_Api/delete_user_permission.php",
			// 	method:"post",
			// 	data:{uniqueid:uniqueid},
			// 	success:function(data){
			// 		$('#kt_modal_12').modal('show');
			// 	}
			// });
			$('#kt_modal_5').modal('show');

		})
	</script>

	<script type="text/javascript">
		$(document).on('click', '.delete-lead-btn-p', function(){
			//var uniqueid_var = $('#uniqueid_mod').attr('value');
			var uniqueid_var = $('#delete-lead-btn-i').attr('val');
			//alert(uniqueid_var);
			var dataForm = 'uniqueid=' + uniqueid_var;
			$.ajax({
				url:"Sec_Api/delete_manage_lead_data.php",
				method:"post",	
				data:dataForm,
				success:function(data){
					if(data == 1){
						alert("Error Occured");
						location.reload();
					}	else 	{
						location.reload();
					}
				//location.reload();
				// ReloadTable();
			}
		});	
		});

		$(document).on('click', '.cancelBtn', function(){
			$('#kt_modal_12').modal('hide');
		});

	</script>

	<div class='modal fade' id='modal-4' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog modal-lg' role='document'>
			<div class='modal-content'>
				<div class='kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor'>
					<div class='kt-content  kt-grid__item kt-grid__item--fluid' id='kt_content'>
						<div class='kt-portlet'>
							<div class='kt-portlet__head'>
								<div class='kt-portlet__head-label'>
									<div class='modal-header'>
										<h3 class='kt-portlet__head-title'>
											Lead Details
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

	<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this ?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div id="uniqueid_mod" style="display: none;"></div>
				<div class="modal-footer">
					<button type="submit" id="delete-lead-btn-i" class="delete-lead-btn-p btn btn-danger">Yes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class='modal-dialog modal-lg' role='document'>
			<div class='modal-content'>
				<div class='kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor'>
					<div class='kt-content  kt-grid__item kt-grid__item--fluid' id='kt_content'>
						<div class='kt-portlet'>
							<div class='kt-portlet__head'>
								<div class='kt-portlet__head-label'>
									<div class='modal-header'>
										<h3 class='kt-portlet__head-title'>
											Add Lead Details
										</h3>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
										</button>
									</div>	
								</div>
							</div>
							<div class='modal-body' id='updatemodal'>
								<div class='kt-portlet__body'>
									<div class='kt-form__section kt-form__section--first'>
										<form  class='kt-form' method="POST" action="manage_lead.php" name="add_leads_frm" id="add_leads_frm">
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Name</label>
												<div class='col-lg-4'>
													<input type='text' name='lname' id='lname' class='form-control' placeholder='Enter first name'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Address</label>
												<div class='col-lg-10'>
													<input type='text' name='laddress' id='laddress' class='form-control' placeholder='Enter buniess name'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Location</label>
												<div class='col-lg-10'>
													<input type='text' name='llocation' id='llocation' class='form-control' placeholder='Enter address'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Phone No</label>
												<div class='col-lg-10'>
													<input type='Number' name='lphone' id='lphone' class='form-control' placeholder='Enter mobile number'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Email</label>
												<div class='col-lg-10'>
													<input type='Email' name='lemail' id='lemail' class='form-control' placeholder='Enter email'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Inquiry For</label>
												<div class='col-lg-10'>
													<input type='text' name='linquiry' id='linquiry' class='form-control' placeholder='Enter suburb'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Status</label>
												<div class='col-lg-6'>
													<select class='form-control' id='lstatus' name="lstatus">
														<option>Select...</option>
														<option value="In Progress">In Progress</option>
														<option value="Quote">Quote</option>
														<option value="Sample">Sample</option>
														<option value="Follw Up">Follow Up</option>
														<option value="Closed">Closed</option>
													</select>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-lg-2 col-form-label'>Type Of Lead</label>
												<div class='col-lg-6'>
													<select class='form-control' id='ltype' name="ltype">
														<option>Select...</option>
														<option value="Wholeseller">Wholeseller</option>
														<option value="Retailer">Retailer</option>
														<option value="Farmer">Farmer</option>
														<option value="B2B">B2B</option>
													</select>
												</div>
											</div>
											<!--end::Form-->
										</form>
										<div class='kt-portlet__foot'>
											<div class='kt-form__actions'>
												<div class='row'>
													<div class='col-lg-9'></div>
													<div class='col-lg-3'>
														<div class='modal-footer'>
															<button type="Submit" class="btn btn-brand" form="add_leads_frm">Submit</button>
															<button type="Cancel" class="btn btn-secondary">Cancel</button>
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
			</div>
		</div>
	</div>

<?php }	else  {
	header('location: login.php');
}

} else  {
	header('location: login.php');
}