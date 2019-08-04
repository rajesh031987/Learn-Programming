<?php 
include 'db_cls_connect.php';
session_start();

		$language = mysqli_real_escape_string($conn, $_POST['language']);
		$program_name = mysqli_real_escape_string($conn, $_POST['program_name']);
		$code = mysqli_real_escape_string($conn, $_POST['code']);
		$keystroke = strlen($code);
		//$input = mysqli_real_escape_string($conn, $_POST['input']);
		$output = mysqli_real_escape_string($conn, $_POST['output']);
		$student_id = $_SESSION['userid'];
		$sql = "INSERT INTO `programs`(`student_id`, `name`, `language`, `code`, `input`, `keystroke`, `output`,`created_date`) VALUES ('$student_id','$program_name','$language','$code','','$keystroke','$output',now())";
		$query = mysqli_query($conn, $sql);
		 if ($query){ 
		      $last_id = mysqli_insert_id($conn);
		      	$sql1 = "INSERT INTO `tbl_keystroke`(`program_id`, `count_keystroke`,`created_at`) VALUES ('$last_id','$keystroke',now())";
		      	$query1 = mysqli_query($conn, $sql1);
	
          echo '1';   
          
		}
		else
		{
		  echo '0';
		}
       

?>