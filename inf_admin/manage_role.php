<?php
session_start();

if(isset($_SESSION['INFCRM_UserID'])) {

	include_once('base/functions.php');
	include_once('base/db_conn.php');
	include_once('siteconfig.php');

	if(Check_UserPermission('Manage Role', 'user_view', $_SESSION['INFCRM_UserID'])){

	if(isset($_POST['nrole']))
	{
		Inser_User_Role_Name($_POST['nrole']);
	}
	elseif(isset($_POST['nper']))
	{
		Insert_User_Permission_Name($_POST['nper']);
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Manage Role | <?php echo SITE_TITLE; ?></title>
		<?php include_once('includes/header.php'); ?>

		<style type="text/css">
			th, td {
				text-align: center;
				max-height: 20px;
				max-width: 20px;
			}
		</style>

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
					<?php if(isset($_GET['error'])){
						if($_GET['error'] == 21) {
							?>
							<div class="alert alert-danger" role="alert">
								<div class="alert-text">Role Already Exist!!!</div>
							</div>
							<?php
						}   else    {
							if($_GET['error'] == 22){?>
								<div class="alert alert-danger" role="alert">
									<div class="alert-text">Permission Already Exist!!!</div>
								</div>

								<?php
							}
						}
					}
					?>
					<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

						<div class="kt-portlet kt-portlet--mobile">
							<div class="kt-portlet__head kt-portlet__head--lg">
								<div class="kt-portlet__head-label">
									<span class="kt-portlet__head-icon">
										<i class="kt-font-brand flaticon2-line-chart"></i>
									</span>
									<h3 class="kt-portlet__head-title">Manage Role</h3>
								</div>

								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-wrapper">
										<a href="#" class="btn btn-clean btn-icon-sm">
											<i class="la la-long-arrow-left"></i>Back
										</a>
									</div>
								</div>
							</div>

							<div class="kt-portlet__body">
								<!--begin: Search Form -->
								<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
									<div class="row align-items-center">
										<div class="col-md-12 order-2 order-xl-1">
											<div class="row align-items-center">
												<div class="col-md-8 kt-margin-b-20-tablet-and-mobile">
													<div class="kt-form__group kt-form__group--inline">
														<div class="kt-form__label">
															<label>Role:</label>
														</div>
														<div class="kt-form__control">
															<div class="dropdown dropup">
																<select class="form-control " id="kt_form_status" name="role" onchange="changeRole(this.value);">	
																	<?php Admin_Role(); ?>
																</select>

																<div class="dropdown-menu" role="combobox" x-placement="bottom-start">
																	<div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
																		<ul class="dropdown-menu inner show">
																			<li class="selected active">
																				<a role="option" class="dropdown-item selected active" aria-disabled="false" tabindex="0" aria-selected="true"><span class="text">All</span></a>
																			</li>	
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div style="margin-left: 25px;">
													<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_4"><i class="flaticon2-plus"></i> Role
													</button>
												</div>
												<div style="margin-left: 50px;">
													<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_8"><i class="flaticon2-plus"></i> Permission
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="kt-portlet__body kt-portlet__body--fit">
								<!--begin: Datatable -->
								<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="ajax_data" style>
									<table class="kt-datatable__table" style="display: block; min-height: 300px;">
										<thead class="kt-datatable__head">
											<tr class="kt-datatable__row" style="left: 0px;">
												<th data-field="UserPermission" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>User Permission</span>
												</th>
												<th data-field="Create" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>Create</span>
												</th>
												<th data-field="Update" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>Update</span>
												</th>
												<th data-field="Delete" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>Delete</span>
												</th>
												<th data-field="View" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>View</span>
												</th>
											</tr>
										</thead>
										<tbody class="kt-datatable__body" id="role_table_body">
											<div id="test">
											</div>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php include_once ('includes/footer-greet.php'); ?>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
		<?php include 'includes/footer.php'?>
	</body>
	</html>

	<script type="text/javascript">
		function changeRole(roleID){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","ajax.php?user_role_id_1="+roleID,false);
			xmlhttp.send(null);
			document.getElementById('role_table_body').innerHTML = xmlhttp.responseText;
		}
		function update_per(roleID,rolepID,task) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","ajax.php?user_role_id_2="+roleID+"&user_role_pr_id="+rolepID+"&task="+task,false);
			xmlhttp.send(null);
			document.getElementById('test').innerHTML = xmlhttp.responseText;
		}
	</script>

	<script type="text/javascript">	
		$(document).on('click', '.edit-cust-btn', function(){
			var uniqueid = $(this).attr('id');
			$('#uniqueid_mod').attr('value',uniqueid);
			// $.ajax({
			// 	url:"Sec_Api/Update_Upload_User_Role.php",
			// 	method:"post",
			// 	data:{uniqueid:uniqueid},
			// 	success:function(data){
			// 		$('#kt_modal_6').modal('show');
			// 	}
			// });
			$('#kt_modal_6').modal('show');
		})
	</script>

	<script type="text/javascript">

		$(document).on('click', '.update-customer-btn', function(){

			var user_role_name = $('#crole').val();
			var uniqueid_var = $('#uniqueid_mod').attr('value');
			var dataForm = 'user_role_name=' + user_role_name + '&uniqueid=' + uniqueid_var;

			$.ajax({
				url:"Sec_Api/Update_Upload_User_Role.php",
				method:"post",
				data:dataForm,
				success:function(data){

					$('#kt_modal_6').modal('hide');
					location.reload();
				// ReloadTable();
			}
		});	
		});

		$(document).on('click', '.cancelBtn', function(){
			$('#kt_modal_6').modal('hide');
		});


		
	</script>

	<script type="text/javascript">	
		$(document).on('click', '.delete-cust-btn', function(){
			var uniqueid = $(this).attr('id');
			$('#delete-role-btn-i').attr('val',uniqueid);
			//$('#uniqueid_mod').attr('value',uniqueid);
			//$.ajax({
			//	url:"Sec_Api/delete_user_role.php",
			//	method:"post",
			//	data:{uniqueid:uniqueid},
			//	success:function(data){
			//		
			//	}
			//});
			$('#kt_modal_7').modal('show');
		})
	</script>

	<script type="text/javascript">

		$(document).on('click', '.delete-role-btn', function(){

			var uniqueid_var = $('#delete-role-btn-i').attr('val');

			var dataForm = 'uniqueid=' + uniqueid_var;
			$.ajax({
				url:"Sec_Api/delete_user_role.php",
				method:"post",
				data:dataForm,
				success:function(data){
					//alert(data);
					if(data == 1){
						$('#kt_modal_13').modal('show');
						//alert("Error Occured");
						//location.reload();
					}	else 	{
						location.reload();
					}
				//location.reload();
				// ReloadTable();
				}
			});	
		});

		$(document).on('click', '.cancelBtn', function(){
			$('#kt_modal_7').modal('hide');
		});


	</script>

	<!-- Permission  -->


	<script type="text/javascript">	
		$(document).on('click', '.edit-per-btn', function(){
			var uniqueid = $(this).attr('id');
			$('#uniqueid_mod').attr('value',uniqueid);
			// $.ajax({
			// 	url:"Sec_Api/update_upload_user_permission.php",
			// 	method:"post",
			// 	data:{uniqueid:uniqueid},
			// 	success:function(data){
			// 		$('#kt_modal_10').modal('show');
			// 	}
			// });
			$('#kt_modal_10').modal('show');
		})
	</script>

	<script type="text/javascript">

		$(document).on('click', '.update-per-btn', function(){

			var user_role_pr_name = $('#cper').val();
			var uniqueid_var = $('#uniqueid_mod').attr('value');
			var dataForm = 'user_role_pr_name=' + user_role_pr_name + '&uniqueid=' + uniqueid_var;

			$.ajax({
				url:"Sec_Api/update_upload_user_permission.php",
				method:"post",
				data:dataForm,
				success:function(data){

					$('#kt_modal_10').modal('hide');
					location.reload();
				// ReloadTable();
			}
		});	
		});

		$(document).on('click', '.cancelBtn', function(){
			$('#kt_modal_10').modal('hide');
		});


		
	</script>

	<script type="text/javascript">	
		$(document).on('click', '.delete-user-btn', function(){
			var uniqueid = $(this).attr('id');
			$('#delete-per-btn-i').attr('val',uniqueid);
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
			$('#kt_modal_12').modal('show');

		})
	</script>

	<script type="text/javascript">
		$(document).on('click', '.delete-per-btn', function(){
			//var uniqueid_var = $('#uniqueid_mod').attr('value');
			var uniqueid_var = $('#delete-per-btn-i').attr('val');
			//alert(uniqueid_var);
			var dataForm = 'uniqueid=' + uniqueid_var;
			$.ajax({
				url:"Sec_Api/delete_user_permission.php",
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

	<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Role Info</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>

				<div class="kt-portlet__body">
					<!--begin: Search Form -->
					<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
						<div class="row align-items-center">
							<div class="col-md-12 order-2 order-xl-1">
								<div class="row align-items-center">
									<div class="col-md-6 kt-margin-b-20-tablet-and-mobile">
										<div class="kt-form__group kt-form__group--inline">
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-4">
										<div style="margin-left: 25px;">
											<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_5"><i class="flaticon2-plus"></i> Add Role
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<form method="POST" action="manage_role.php" id="croleuser">
						<div class="kt-portlet__body kt-portlet__body--fit">
							<!--begin: Datatable -->
							<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="ajax_data" style>
								<table class="kt-datatable__table" style="display: block; min-height: 300px;">
									<thead class="kt-datatable__head">
										<tr class="kt-datatable__row" style="left: 0px;">
											<th data-field="UserPermission" class="kt-datatable__cell kt-datatable__cell--sort">
												<span>User Role</span>
											</th>
											<th data-field="View" class="kt-datatable__cell kt-datatable__cell--sort">
												<span>Edit</span>
											</th>
											<th data-field="Action" class="kt-datatable__cell kt-datatable__cell--sort">
												<span>Delete</span>
											</th>
										</tr>
									</thead>
									<tbody class="kt-datatable__body" id="role_table_body">
										<?php echo User_Role_Data(); ?>
									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	
	<div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insert New Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="manage_role.php" id="addrole">
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Add Role:</label>
							<input type="text" name="nrole" id="nrole" class="form-control" id="recipient-name">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" form="addrole">Add</button>
				</div>
			</div>
		</div>
	</div>

	<div id='kt_modal_6' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div id="uniqueid_mod" style="display: none;"></div>
				<div class="modal-body">
					<form method="POST" action="manage_role.php" id="changerole">
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Role Name:</label>
							<input type="text" name="crole" id="crole" class="form-control" id="recipient-name">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a class='btn btn-success update-customer-btn' form='changerole' style='color: white;'>Submit</a>
					<a class='btn btn-secondary cancelBtn' style='color: black;'>Cancel</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="kt_modal_7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this ?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div id="uniqueid_mod" style="display: none;"></div>
				<div class="modal-footer">
					<button type="submit" id="delete-role-btn-i" class="delete-role-btn btn btn-danger">Yes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="kt_modal_13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Oops! Error Ocured. </br>There might be some users associated with this Role. </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div id="uniqueid_mod" style="display: none;"></div>
				<div class="modal-footer">
					<a class='btn btn-danger' href="manage_user.php" style='color: white;'>Check</a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="kt_modal_8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Permission Info</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>

				<div class="kt-portlet__body">
					<!--begin: Search Form -->
					<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
						<div class="row align-items-center">
							<div class="col-md-12 order-2 order-xl-1">
								<div class="row align-items-center">
									<div class="col-md-6 kt-margin-b-20-tablet-and-mobile">
										<div class="kt-form__group kt-form__group--inline">
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-4">
										<div style="margin-left: 25px;">
											<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#kt_modal_9"><i class="flaticon2-plus"></i> Add Permission
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<form method="POST" action="manage_role.php" id="createpermission">
							<div class="kt-portlet__body kt-portlet__body--fit">
								<!--begin: Datatable -->
								<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="ajax_data" style>
									<table class="kt-datatable__table" style="display: block; min-height: 300px;">
										<thead class="kt-datatable__head">
											<tr class="kt-datatable__row" style="left: 0px;">
												<th data-field="UserPermission" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>User Permission</span>
												</th>
												<th data-field="View" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>Edit</span>
												</th>
												<th data-field="Action" class="kt-datatable__cell kt-datatable__cell--sort">
													<span>Delete</span>
												</th>
											</tr>
										</thead>
										<tbody class="kt-datatable__body" id="role_table_body">
											<?php echo User_Permission(); ?>
										</tbody>
									</table>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id='kt_modal_9' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Permission</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div id="uniqueid_mod" style="display: none;"></div>
				<div class="modal-body">
					<form method="POST" action="manage_role.php" id="addpermission">
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Permission Name:</label>
							<input type="text" name="nper" id="nper" class="form-control" id="recipient-name">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" form="addpermission">Add</button>
				</div>
			</div>
		</div>
	</div>

	<div id='kt_modal_10' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Change Permission</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div id="uniqueid_mod" style="display: none;"></div>
				<div class="modal-body">
					<form method="POST" action="manage_role.php" id="changepermissionname">
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">Permission Name:</label>
							<input type="text" name="cper" id="cper" class="form-control" id="recipient-name">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a class='update-per-btn btn btn-success' form='changepermissionname' style='color: white;'>Submit</a>
					<a class='btn btn-secondary cancelBtn' style='color: black;'>Cancel</a>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="kt_modal_12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this ?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div id="uniqueid_mod" style="display: none;"></div>
				<div class="modal-footer">
					<button type="submit" id="delete-per-btn-i" class="delete-per-btn btn btn-danger">Yes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>


<?php }} else  {
	header('location: login.php');
}