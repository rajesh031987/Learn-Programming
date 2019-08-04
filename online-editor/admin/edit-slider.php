<?php
include('include.php');

 $title="Edit slider"; 
 include('header.php'); 
    
	?>
<?php




?>
<?php

		 if(isset($_POST['submit']))
		{
		     @extract($_POST);
			$text1 = mysqli_real_escape_string($conn,$_POST['text1']);
			$text2 = mysqli_real_escape_string($conn,$_POST['text2']);
			$image = $_POST['image'];
			$id = $_POST['id'];
			if($_FILES['file']['name']!=''){
				 unlink("../slider/".$ma);
		 $img=uniqid().$_FILES['file']['name'];
		
         move_uploaded_file($_FILES['file']['tmp_name'],"../slider/$img");
			}
		   	if($_FILES['file']['name']==''){
		 $img=$image;
		
			}
		  
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
				
			 mysqli_query($conn,"update tbl_slider set text1='$text1',text2='$text2',slider='$img' where id=$id");
 		$_SESSION['message'] = 'Update successfully';
		echo "<script>document.location.href='manage-slider.php'</script>";
exit();
	
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
                    <h1 class="page-header">Edit Slider </h1>
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
										<?php
								$where = "where id = $_GET[id]";
$fetch = $main->get_single_record(tbl_slider,$where);	
								?>	
							 <form role="form" action="" method="post" enctype="multipart/form-data">
							 		
									
                                
                                         <div class="form-group">
                                         
                                            <label>Text 1</label>
                                            
                                           	<input type="text" name="text1" id="text1" class="form-control" value="<?=$fetch['text1'];?>" required>
                                        </div>
                                         <div class="form-group">
                                         
                                            <label>Text 2</label>
                                            
                                           	<input type="text" name="text2" id="text2" class="form-control" value="<?=$fetch['text2'];?>" required>
                                        </div>
									
                                       <div class="form-group">
                                         
                                            <label>Please Upload Image (Recommeded image resolution 1350*500):</label>
                                            <label></label>
                                           	<input type="file" name="file" id="image">
											<?php
											if($fetch['slider']!='')
											{
											?>
											<img src="../slider/<?=$fetch['slider'];?>" width="50" height="50">
											                                           	<input type="hidden" name="image"  class="form-control" value="<?=$fetch['slider'];?>" >

											<?php
											} 
											?>
											
                                        </div>
                                        
                                                                                  	<input type="hidden" name="id"  class="form-control" value="<?=$fetch['id'];?>" >

									
                                        
                                        <input type="submit" class="btn btn-danger add-button" name="submit" value="Save">
										
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

