<?php 
         session_start();
		 include 'db_cls_connect.php';
	    if(isset($_POST['emp-submit'])) {
			$empid = trim($_POST['empid']);
			$fname = trim($_POST['fname']);
			$lname = trim($_POST['lname']);
			$email = trim($_POST['email']);
			$mobile = trim($_POST['mobile']);
			$address = trim($_POST['address']);
			$store_id = $_SESSION['userid'];
			$fullname= $fname.' '.$lname;
			$sql1 = "SELECT * FROM tbl_employee WHERE emp_id='$empid'";
			$resultset1 = mysqli_query($conn, $sql1);
			$length = mysqli_num_rows($resultset1);
			if($length > 0){
				header("location:add-employee.php?result=0");
			}
			else	
			{
				$sql = "INSERT INTO `tbl_employee`(`store_id`, `emp_id`, `email`, `fullname`, `address`, `contactnumber`, `status`, `created_date`) VALUES ('$store_id','$empid','$email','$fullname','$address','$mobile','active',now())";
				$resultset = mysqli_query($conn, $sql);
				header("location:add-employee.php?result=1");
			}
		}
		
	
