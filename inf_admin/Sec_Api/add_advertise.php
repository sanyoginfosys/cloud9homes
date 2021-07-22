<?php



session_start();

if(isset($_SESSION['INFCRM_UserID'])) {

	include_once('../base/functions.php');

	if(Check_UserPermission('Manage Property', 'user_view', $_SESSION['INFCRM_UserID'])){

        if(isset($_POST['advertise_name'])){

            $result = addAdvertise($_POST,$_FILES);

           // echo "<br />$result";

            if($result === 0){

                header('location: ../manage_advertise.php?success=1');
				exit();

            }

            else{

                header('location: ../manage_advertise.php?error='.$result);
				exit();

            }

        }

	}	else 	{

		header('location: '.ERROR_404);

	}

}	else 	{

	header('location: '.ERROR_404);

}



?>