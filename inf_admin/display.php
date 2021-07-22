<?php
session_start();

if(isset($_SESSION['INFCRM_UserID'])) {
	include_once('base/functions.php');
	include_once('siteconfig.php');

	if(Check_UserPermission('Manage Lead Display', 'user_view', $_SESSION['INFCRM_UserID'])){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Manage Lead Display | <?php echo SITE_TITLE; ?></title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
							<div class="row">
								<?php echo Get_Lead_Details(); ?>
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
	$(document).on('click', '.edit-lead-l-btn', function(){
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
	$(document).on('click', '.delete-lead-l-btn', function(){
		var uniqueid = $(this).attr('id');
		$('#delete-lead-btn-i').attr('val',uniqueid);
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
<?php }} else  {
	header('location: login.php');
}