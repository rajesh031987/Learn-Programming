<?php 
include 'db_cls_connect.php';
session_start();

		
		$code = mysqli_real_escape_string($conn, $_POST['code']);
		$keystroke = strlen($code);
		$input = mysqli_real_escape_string($conn, $_POST['input']);
		$output = mysqli_real_escape_string($conn, $_POST['output']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		
		
			$query6 = "SELECT * FROM programs WHERE id='$id'";
			$resultset6 = mysqli_query($conn, $query6);
			$programs = mysqli_fetch_assoc($resultset6);
			if($programs['keystroke'] != $keystroke)
			{
		      $last_id = $id;
		      	$sql1 = "INSERT INTO `tbl_keystroke`(`program_id`, `count_keystroke`,`created_at`) VALUES ('$last_id','$keystroke',now())";
		      	$query1 = mysqli_query($conn, $sql1);
				
			}
			
			if($programs['keystroke'] == $keystroke)
			{
				echo '2';
				exit;
			}
			
			
			$result = mysqli_query($conn,"UPDATE programs SET code='$code', input='$input', output='$output',keystroke = '$keystroke', modified_at= now() WHERE id='$id'");  
          
		 if ($result){

			
         echo '1'; 
		exit;
			
		}
		else
		{
		  echo '0';
		  exit;
		}
       

?>