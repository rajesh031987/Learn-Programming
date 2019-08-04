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
	/*echo '<pre style="padding-left:50px;">';
	print_r($_POST);
	echo '</pre>';*/
	@extract($_POST);
		$id = $_POST['uid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$username = $_POST['uname'];
		$phone = $_POST['phone'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$skype = $_POST['skype'];
		$website = $_POST['website'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$logo1 = $_POST['logo1'];
		
	
		
		if($_FILES['file']['name']!=''){
	 		 $img=uniqid().$_FILES['file']['name'];
		
              move_uploaded_file($_FILES['file']['tmp_name'],"../profileimage/$img");
		
		}
			if($_FILES['file']['name']==''){
		
		     $img = $logo1;
		 
		}
		
											
											
											
	$sql = mysqli_query($conn,"UPDATE tbl_register SET user_fullname='$name', user_email='$email', 
	user_mob='$mobile', user_gender='$gender',
	  user_country='$country',user_state='$state',user_city='$city',user_address='$address'
	   ,user_about='$about',user_img='$img' WHERE id='$id'");
	
	if($sql){
		
		$_SESSION['message']='User Updated Successfully';
		echo "<script>document.location.href='manage-users.php'</script>";
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
                    <h1 class="page-header">User Edit </h1>
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
						 
					<li><a href="manage-users.php"><div class="btn btn-success">Manage Users</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<?php if($_GET['action']=='edit'){ ?>
                                    <form role="form" action="edit-users.php?action=update&id=<?php echo $_GET[id] ?>" method="post" enctype="multipart/form-data">
									<?php }  else{
									
							?>
							 <form role="form" action="" method="post" enctype="multipart/form-data">
							 <?php } ?>		
									
                                       <?php
									   $query=mysqli_query($conn,"select * from tbl_register where id='".$_GET['id']."'");
										$fetch=mysqli_fetch_array($query);
                                       
                                       
                                       
                                       ?>
                                        
										                                  
                                        <div class="form-group">
                                           
                                         
                                            <label>Name:</label>
                                             <input class="form-control" name="name" id="name" value="<?php echo $fetch['user_fullname']; ?>">
                                           
                                        </div>
                                        
                                        
                                       <div class="form-group">
                                         
                                            <label>Email:</label>
                                             <input class="form-control" name="email" id="email" value="<?php echo $fetch['user_email']; ?>">
                                           
                                        </div>
                                        
                                  
                                        <div class="form-group">
                                           
                                         
                                            <label>Mobile:</label>
                                             <input class="form-control" name="mobile" id="mobile" value="<?php echo $fetch['user_mob']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>Gender:</label>
                                            
                                             <select id="gender" name="gender" class="form-control">
                                            <option value="Male" <?php if($fetch['user_gender']=='Male'){ echo "selected";}?>>Male</option>
                                             <option value="Female" <?php if($fetch['user_gender']=='Female'){ echo "selected";}?>>Female</option>
                                             
                                             </select>
                                           
                                        </div>
							
                                         
                                         <div class="form-group">
                                           
                                         
                                            <label>Country:</label>
                                            <?php $query1=mysqli_query($conn,"select * from countries ORDER BY name ASC");
											 ?>
                                            <select class="form-control country" name="country" id="country">

                                             <option value="">Select your country</option>

											<?php while($country=mysqli_fetch_array($query1)){?>
                    
                                            <option <?= $fetch['user_country'] == $country['id'] ? 'selected' : ''; ?> value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                    						
                                            <?php } ?>
                                            </select>
                                           
                                        </div>
 
                                       
                                       	<div class="form-group">  
                                        <label>State:</label>
                                        <?php $st = $fetch['user_state']; ?>
                                        <?php $query1=mysqli_query($conn,"select * from states where id = $st");
											$row = mysqli_fetch_array($query1);
											 ?>
                                         <select name="state" class="form-control state" id="state">
                                         <!--<option value="" selected="selected">Select your state</option>-->
                                         <option value="<?php echo $row['id'];?>" selected="selected"><?php echo $row['name'];?></option>
                                        </select>
                                        
                                       </div>
                                        
                                        
                                        	<div class="form-group">  
                                        <label>City:</label>
                                        <?php $ct = $fetch['user_city']; ?>
                                        <?php $query1=mysqli_query($conn,"select * from cities where id = $ct");
											$row1 = mysqli_fetch_array($query1);
											 ?>
                                         <select name="city" class="form-control city" id="city">
                                         <!--<option value="" selected="selected">Select your state</option>-->
                                         <option value="<?php echo $row['id'];?>" selected="selected"><?php echo $row1['name'];?></option>
                                        </select>
                                        
                                       </div>
                                       
                                         <div class="form-group">
                                           
                                         
                                            <label>Address:</label>
                                          
                                            
                                              <input class="form-control" name="address" id="address" value="<?php echo $fetch['user_address']; ?>">
                                           
                                        </div>
                                         <div class="form-group">
                                           
                                         
                                            <label>About You:</label>
                                          
                                            
                                              <input class="form-control" name="about" id="about" value="<?php echo $fetch['user_about']; ?>">
                                           
                                   

                                </div>
								   <div class="form-group">
                                         
                                            <label>Profile picture:</label>
                                            <?php if($fetch['user_img']==''){ ?>
										
                                           	<input type="file" name="file" id="image"> 
											<?php } ?>
											
											<?php if($fetch['user_img']!=''){ ?>
                                           		<input type="file" name="file" id="image"> <img src="../profileimage/<?php echo $fetch['user_img']?>" width="50"/> 
												<input type="hidden" name="logo1" value="<?=$fetch['user_img']?>">
											<?php } ?>
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

