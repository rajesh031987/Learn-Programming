<?php 
         session_start();
		 include 'db_cls_connect.php';
		if(isset($_POST['password_update'])) {
		     $id = trim($_SESSION['userid']);
		    $cpassword = trim($_POST['cpassword']);
			$npassword = trim($_POST['npassword']);
		    $sql = "SELECT * FROM tbl_student WHERE id='$id'";
			$resultset = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($resultset);
			
			if($row['password'] != $cpassword){
			    header("location:profile.php?result=3");
			    exit;
			}
			else
			{
                  $result = mysqli_query($conn,"UPDATE tbl_student SET password='$npassword' WHERE id='$id'");  
                  if($result){
        				header("location:profile.php?result=1");
        			}
        			else
        			{
        			    header("location:profile.php?result=0");
        			}
        			
			}  
		
			
			    
			
		
			
		}
		
	
