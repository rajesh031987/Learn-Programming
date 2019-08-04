<?php 
         session_start();
		 include 'db_cls_connect.php';
		if(isset($_POST['profile_update'])) {
		     $id = trim($_POST['id']);
		    $student_id = trim($_POST['student_id']);
			$first_name = trim($_POST['first_name']);
			$last_name = trim($_POST['last_name']);
			$user_name = $first_name.' '.$last_name;
			$email = trim($_POST['email']);
			$phone = trim($_POST['phone']);
			$university = trim($_POST['university']);
			$pincode = trim($_POST['pincode']);
			$course = trim($_POST['course']);
			$country = trim($_POST['country']);
			$city = trim($_POST['city']);
			$address = trim($_POST['address']);
			
                  $result = mysqli_query($conn,"UPDATE tbl_student SET student_id='$student_id', first_name='$first_name', last_name='$last_name',user_name='$user_name',email='$email',country='$country',city='$city',address='$address',university='$university',phone='$phone',course='$course' WHERE id='$id'");  
                  if($result){
        				header("location:profile.php?result=1");
        			}
        			else
        			{
        			    header("location:profile.php?result=0");
        			}
                }
               
			
			
			    
			
		
	
	
