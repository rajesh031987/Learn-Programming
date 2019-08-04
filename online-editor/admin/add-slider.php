<?php
include('include.php');

 $title="Add slider"; 
 include('header.php'); 
    
	?>

<?php

		 if(isset($_POST['submit']))
		{
		     @extract($_POST);
			$text1 = mysqli_real_escape_string($conn,$_POST['text1']);
			$text2 = mysqli_real_escape_string($conn,$_POST['text2']);
		 $img=uniqid().$_FILES['file']['name'];
		
         move_uploaded_file($_FILES['file']['tmp_name'],"../slider/$img");
		 
		  
		  
	//	$sql=mysql_query("INSERT INTO tbl_media(type, image_name ,status,url) VALUES('$type', '$img','$status','$url')");
	 		/*$file_loc = $_FILES['file']['tmp_name'];
 				$img = $_FILES['file']['name'];
				$img = str_replace(' ', '', $img);
				$ext = pathinfo($img, PATHINFO_EXTENSION);
				
         		$image = new SimpleImage($file_loc);
 
				$img1 = uniqid()."_1349x650.".$ext;
				$th = uniqid()."_150x150.".$ext;
				 
				// Resize the image to specific width and height
				$image->resize(1349, 650);
				$image->save("media/$img1");
				 
				 
				$image->square(150);
				$image->save("media/$th");
				*/
				echo "INSERT INTO tbl_slider set text1='$text1',text2='$text2',slider='$img'";
			 mysqli_query($conn,"INSERT INTO tbl_slider set text1='$text1',text2='$text2',slider='$img'");
 		$_SESSION['message'] = 'Insert successfully';
		}
	

?>
        
        <link href="css/boostrap-datepicker.css" rel="stylesheet" type="text/css" />
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap-datepicker.js"></script>
        
		<script>

	$(document).ready(function(){

		

		$('.datepicker').datepicker({ format: 'yyyy-mm-dd', });

	});

</script>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Slider </h1>
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
                      <!--  <ul class="list-inline text-right">
						 
					<li><a href="manage-media.php"><div class="btn btn-success">Manage Media</div></a></li>
						 </ul>-->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								
							 <form role="form" action="" method="post" enctype="multipart/form-data">
							 		
									
                                
                                         <div class="form-group">
                                         
                                            <label>Text 1</label>
                                            
                                           	<input type="text" name="text1" id="text1" class="form-control" required>
                                        </div>
                                         <div class="form-group">
                                         
                                            <label>Text 2</label>
                                            
                                           	<input type="text" name="text2" id="text2" class="form-control" required>
                                        </div>
                                       <div class="form-group">
                                         
                                            <label>Please Upload Image:</label>
                                            
                                           	<input type="file" name="file" id="image" required>
                                        </div>
                                        
                                       
									
                                        
                                        <input type="submit" class="btn btn-danger add-button" name="submit" value="Submit">
										
                                      <!--  <button type="reset" class="btn btn-default">Reset Button</button>-->
                                    </form>
                                </div>
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

