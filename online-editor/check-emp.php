<?php
include 'db_cls_connect.php';
if($_POST['emp-id']){
	$empid = $_POST['emp-id'];
	$sql_s = "select * from tbl_employee where emp_id = '$empid'";
	$query_s = mysqli_query($conn,$sql_s);
	$len = mysqli_num_rows($query_s);
	if($len == 0){
		echo '0';
	}else{
		echo '1';
	}
	
}