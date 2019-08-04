<?php
include('include.php');

 $title="Service Category"; 
 include('header.php'); 
 $uid = $_GET['id'];
 ?>
	
<?php




?>
<?php
if(isset($_POST['update'])){
	//echo "text";
	/*echo '<pre style="padding-left:50px;">';
	print_r($_POST);
	echo '</pre>';*/
	@extract($_POST);
		$id = $_POST['uid'];
			$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
		$student_name = $first_name.' '.$last_name;
		$email = $_POST['email'];
		$address = $_POST['address'];
	    $phone = $_POST['phone'];
		$oldimage = $_POST['oldimage'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];
	    $city = $_POST['city'];
		$pincode = $_POST['pincode'];
		$course = $_POST['course'];
		$university = $_POST['university'];
	
		
		if($_FILES['file']['name']!=''){
	 		 $img=uniqid().$_FILES['file']['name'];
		
              move_uploaded_file($_FILES['file']['tmp_name'],"../profile_image/$img");
		
		}
			if($_FILES['file']['name']==''){
		
		     $img = $oldimage;
		 
		}
		
										
											
											
	$sql = mysqli_query($conn,"UPDATE tbl_student SET  image='$img',   first_name='$first_name',  last_name='$last_name',  user_name='$student_name', email='$email', 
	password='$password',address='$address',phone='$phone',country='$country',city='$city',university='$university' ,course='$course',pincode='$pincode' WHERE id='$id'");
	
	if($sql){
		
		$_SESSION['message']='Updated Successfully';
		echo "<script>document.location.href='manage-student.php'</script>";
		exit();
		}
	
	}


		
	

?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap-datepicker.js"></script>
          
		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
          
            
			<script>
			var $j = jQuery.noConflict();
			$j(document).ready(function() {
			  //$(function() {
				$j( "#datepicker" ).datepicker();
			  });
			  </script>
		
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Student </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
					 <?php if($_SESSION['message']!=''){?>
			<div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                 <?=$_SESSION['message'];?> <a class="alert-link" href="#"></a>.
                            </div>
							  <?php 
							  unset($_SESSION['message']);
							  } ?>
                    <div class="panel panel-default">
                        <ul class="list-inline text-right">
						 
					<li><a href="manage-student.php"><div class="btn btn-success">Manage Student</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
							
							 <form role="form" action="" method="post" enctype="multipart/form-data">
								
									
                                       <?php
									   $query=mysqli_query($conn,"select * from tbl_student where id='".$_GET['id']."'");
										$fetch=mysqli_fetch_array($query);
                                      
                                       ?>
                                        <div class="form-group">
                                         
                                            <label>Image:</label>
                                             <input type="file" class="form-control" name="file" id="file">
                                              <input type="hidden" class="form-control" name="oldimage" value="<?php echo $fetch['image']; ?>">
                                             <img style="width:50px;height:50px;" src="../profile_image/<?=$fetch['image'];?>">
                                           
                                        </div>
										                                  
                                        <div class="form-group">
                                           
                                         
                                            <label>First name:</label>
                                             <input type="text" class="form-control" name="first_name" id="store_name" value="<?php echo $fetch['first_name']; ?>" required>
                                           
                                        </div>
                                        
                                         <div class="form-group">
                                           
                                         
                                            <label>Last name:</label>
                                             <input type="text" class="form-control" name="last_name" id="store_name" value="<?php echo $fetch['last_name']; ?>" required>
                                           
                                        </div>
                                   
                                        
                                       <div class="form-group">
                                         
                                            <label>Email:</label>
                                             <input type="email" class="form-control" name="email" id="email" value="<?php echo $fetch['email']; ?>" readonly>
                                           
                                        </div>
                            <div class="form-group">
                                         
                                            <label>Password:</label>
                                             <input type="text" class="form-control" name="password" id="password" value="<?php echo $fetch['password']; ?>" required>
                                           
                                        </div>
								    <div class="form-group">
                                           
                                         
                                            <label>Address:</label>
                                             <input type="text" class="form-control" name="address" id="address" value="<?php echo $fetch['address']; ?>" required>
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>Zipcode:</label>
                                             <input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo $fetch['pincode']; ?>" required>
                                           
                                        </div>
										 <div class="form-group">
                                           
                                         
                                            <label>University:</label>
                                             <input type="text" class="form-control" name="university" id="university" value="<?php echo $fetch['university']; ?>" required>
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                         <label>Course:</label>
                                        <input type="text" class="form-control" name="course" placeholder="Course" value="<?php echo $fetch['course']?>">
                                    </div>
                                        
                                        <div class="form-group">
                                           
                                         
                                            <label>Contact number:</label>
                                             <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $fetch['phone']; ?>" required>
                                           
                                        </div>
                                        
                                       
                                    <div class="form-group">
                                        <label>Country:</label>
                                       <?php $query1=mysqli_query($conn,"select * from countries ORDER BY name ASC");?>
                                            <select class="form-control country" name="country">
                							    <option value="">Select your country</option>
                								<?php while($country=mysqli_fetch_array($query1)){?>
                								<option <?= $fetch['id'] == $country['id'] ? 'selected' : ''; ?> value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                                    		    <?php } ?>
                							</select>
                                    </div>
                                
                                    <div class="form-group">
                                         <label>City:</label>
                                        <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $fetch['city']?>">
                                    </div>
                                
                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="uid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="
										<?php if($_GET['action']!=''){ echo "Update"; } else{ echo "Add"; }?>">
                                      <!--  <button type="reset" class="btn btn-default">Reset Button</button>-->
                                    </form>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include('footer.php'); ?>
<script>
$(document).ready(function(){
	var uid = "<?php echo $_GET['id'];?>";
	$('.country').change(function(){
	  $('.state').find('option').remove();
	  var id = $(this).val();
	  
	  var dataString = 'id='+id +'uid='+uid;
	   
	   
	  $.ajax({
	    type: 'POST',
		url: 'get_state.php',
		data: dataString,
		success: function(html){
			$('.state').html(html);
		}
	   
	})

	});
	
	$('.state').change(function() {
		$('.city').find('option').remove();
		var cid = $(this).val();
		
		var dataString= 'cid='+ cid;
		
		$.ajax({
			
			type: 'POST',
			url: 'get_state.php',
			data: dataString,
			success: function(html){
				
				$('.city').html(html);
			}
		})
		
	});

});

</script>
</body>

</html>

