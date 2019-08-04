<?php 
include 'db_cls_connect.php';
session_start();

		$barcode = json_encode($_POST['barcode'],JSON_FORCE_OBJECT);
		$empid = $_POST['emp-id'];
		$order_id = 'O_'.mt_rand(100000, 999999);
		$store_id = $_SESSION['userid'];
		$sql = "INSERT INTO `tbl_order`(`order_id`, `store_id`, `emp_id`, `barcode`, `created_date`) VALUES ('$order_id','$store_id','$empid','$barcode',now())";
		$query = mysqli_query($conn, $sql);
		 if ($query){       
          echo '1';            
		}
		else
		{
		  echo '0';
		}
       

?>