<?php
include_once ('base/db_conn.php');
if(isset($_GET['user_role_id_1']))
{	
	$roleid = $_GET['user_role_id_1'];
	if($roleid!='')
	{
		$conn = create_conn();
		$sql = "SELECT b.user_role_pr_name,b.user_role_pr_id, c.user_create, c.user_update, c.user_delete, c.user_view FROM user_role a, user_role_permission b, user_role_permission_t c WHERE a.user_role_id=c.user_role_id AND b.user_role_pr_id=c.user_role_pr_id AND c.user_role_id =".$roleid;
		$result = $conn->query($sql);
		$cnt = 0;
		while ($row = $result->fetch_assoc()) 
		{
			$urpi = $row['user_role_pr_id'];		
			echo "<tr data-row='".$cnt."' class='kt-datatable__row' style='left: 0px;'>";
			echo "<td data-field='UserPermission' class='kt-datatable__cell'>".$row['user_role_pr_name']."</td>";
			if ($row['user_create']!=1) {
				$task = "user_create";
				echo "<td data-field='Create' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_create']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_create'></td>";
			}
			else{
				$task = "user_create";
				echo "<td data-field='Create' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_create']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_create' checked></td>";	
			}
			if ($row['user_update']!=1) {
				$task = "user_update";
				echo "<td data-field='Update' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_update']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_update'></td>";
			}
			else{
				$task = "user_update";
				echo "<td data-field='Update' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_update']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_update' checked></td>";	
			}
			if ($row['user_delete']!=1) {
				$task = "user_delete";
				echo "<td data-field='Delete' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_delete']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_delete'></td>";
			}
			else{
				$task = "user_delete";
				echo "<td data-field='Delete' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_delete']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_delete' checked></td>";	
			}

			if ($row['user_view']!=1) {
				$task = "user_view";
				echo "<td data-field='View' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_view']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_view'></td>";
			}
			else{
				$task = "user_view";
				echo "<td data-field='View' class='kt-datatable__cell'><input type='checkbox' class='permission_change_btn' id='ck-field' name='".$row['user_role_pr_name']."' value='".$row['user_view']."' permission='".$row['user_role_pr_id']."' onchange=update_per(".$roleid.",".$urpi.",'".$task."') task='user_view' checked></td>";	
			}
			echo "</tr>";
			$cnt++;
		}
	}
}
if (isset($_GET['task'])) {
	$uri = $_GET['user_role_id_2'];
	$urpi = $_GET['user_role_pr_id'];
	$task = $_GET['task'];
	$conn = create_conn();
	$sql = "UPDATE  user_role_permission_t SET ".$task." = CASE WHEN ".$task." = 1 THEN 0 ELSE 1 END WHERE user_role_pr_id = ".$urpi." AND user_role_id = ".$uri;
	$conn->query($sql);
}
?>