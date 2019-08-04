 <?php
 session_start();
		 include 'db_cls_connect.php';
		
			$id = trim($_SESSION['userid']);
			
			$image = $_FILES["userfile1"]["name"];
			if(!empty($image))
			{
			     
			     //unlink('profile_image/'.$image);
			     
			     $target_dir = "profile_image/";
                 $target_file = $target_dir . basename($_FILES["userfile1"]["name"]);
                 $post_tmp_img = $_FILES["userfile1"]["tmp_name"];
                 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                 $post_imag = $_FILES["userfile1"]["name"];
                if(move_uploaded_file($post_tmp_img,"profile_image/$post_imag")){
					
				}
				  $result = mysqli_query($conn,"UPDATE tbl_student SET image='$post_imag' WHERE id='$id'");  
                  if($result){
        				echo 'profile_image/'.$image;
        			}
        			else
        			{
        			    header("location:profile.php?result=0");
        			}
                }