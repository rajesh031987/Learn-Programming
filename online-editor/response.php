<?php 
         session_start();
		 include 'db_cls_connect.php';
		if(isset($_POST['login-submit'])) {
			$user_email = trim($_POST['username']);
			$user_password = trim($_POST['password']);
			$sql = "SELECT * FROM tbl_student WHERE email='$user_email'";
			$resultset = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($resultset);
			if($row['status'] == 'Inactive'){
				echo "Your account is inactive. Please contact to administrator!"; // wrong details
				exit;
			}
			else if($row['status'] == 'Blocked'){
				echo "Your account is blocked. Please contact to administrator!"; // wrong details
				exit;
			}
			else if($user_password == $row['password'] && $row['status'] == 'Active'){
				echo "1";
				$_SESSION['userid'] = $row['id'];
				$query = "UPDATE tbl_student SET browser='$_SERVER[HTTP_USER_AGENT]', last_login=now(),ip='$_SERVER[REMOTE_ADDR]', count = count+1 WHERE id='$_SESSION[userid]'"; 
				$result = mysqli_query($conn,$query); // etc... 
			} else {
				echo "Ohhh ! Wrong Credential."; // wrong details
				exit;
			}
		}
		
		if(isset($_POST['signup-submit'])) {
		    $student_id = trim($_POST['student_id']);
			$first_name = trim($_POST['first_name']);
			$last_name = trim($_POST['last_name']);
			$user_name = $first_name.' '.$last_name;
			$email = trim($_POST['email']);
			$user_password = trim($_POST['password']);
			
			$sql1 = "SELECT * FROM tbl_student WHERE email='$email' or student_id='$student_id'";
			$resultset1 = mysqli_query($conn, $sql1);
			$length = mysqli_num_rows($resultset1);
			if($length > 0){
				header("location:sign-up.php?result=0");
			}
			else	
			{
				$sql = "INSERT INTO `tbl_student`(`student_id`,`first_name`,`last_name`,`user_name`, `email`, `password`, `country`, `state`, `city`, `pincode`, `address`, `university`, `phone`, `status`, `created_date`) VALUES ('$student_id','$first_name','$last_name', '$user_name','$email','$user_password','','','','','','','','active',now())";
				$resultset = mysqli_query($conn, $sql);
				// multiple recipients
$to  = 'ashishkrsharma1@gmail.com' . ', '; // note the comma
$to .= $email;

// subject
$subject = 'New Registration';

// message
$message = '
  <p>Thank you register with us.</p>
  <p>Please <a href="http://vistabath.in/online-editor">login</a> .</p>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
//$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";


// Mail it
mail($to, $subject, $message, $headers);
				header("location:sign-up.php?result=1");
			}
		}
		
	
