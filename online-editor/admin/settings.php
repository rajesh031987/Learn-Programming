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
		$contact_email = $_POST['contact_email'];
		
		/*
		if($_FILES['file']['name']!=''){
	 		 $img=uniqid().$_FILES['file']['name'];
		
              move_uploaded_file($_FILES['file']['tmp_name'],"../profileimage/$img");
		
		}
			if($_FILES['file']['name']==''){
		
		     $img = $logo1;
		 
		}
		
		*/									
											
											
	$sql = mysqli_query($conn,"UPDATE tbl_settings SET contact_email='$contact_email'");
	
	if($sql){
		
		$_SESSION['message']='Updated Successfully';
		echo "<script>document.location.href='settings.php'</script>";
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
                    <h1 class="page-header">Settings</h1>
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
						 
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
							
							 <form role="form" action="" method="post" enctype="multipart/form-data">
								
									
                                       <?php
									   $query=mysqli_query($conn,"select * from tbl_settings where id='1'");
										$fetch=mysqli_fetch_array($query);
                                      
                                       ?>
                                        
										                                  
                                        
										 <div class="form-group">
                                           
                                         
                                            <label>Contact email:</label>
                                             <input type="email" class="form-control" name="contact_email" id="contact_email" value="<?php echo $fetch['contact_email']; ?>" required>
                                           
                                        </div>
                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="uid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="Save">
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

</body>

</html>

