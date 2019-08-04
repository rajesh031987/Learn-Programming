<?php
include('include.php');
@extract($_POST);		

$id = $_SESSION['admin_id'];	

			

$insert = mysqli_query($conn,"update admin set 

					username = '".$username."',

					password = '".$password."'



				

					where admin_id = '".$id."'

				");	

	   		echo json_encode(array('action' => 'true', 'msg' => 'Updated Successfully'));

		exit;

?>

	