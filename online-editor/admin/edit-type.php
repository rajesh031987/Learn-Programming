<?php
include('include.php');

 $title="Service Category"; 
?>
<?php


?>
<?php

if(isset($_POST['submit'])){

	 $logo1 = $_POST['logo1'];
	     $type = $_POST['type'];
		  $status = $_POST['status'];
				if($_FILES['file']['name']!=''){
					unlink("../type_image/".$logo1);
	 		 $img=uniqid().$_FILES['file']['name'];
		
              move_uploaded_file($_FILES['file']['tmp_name'],"../type_image/$img");
		
		}
			if($_FILES['file']['name']==''){
		
		     $img = $logo1;
		 
		}
	$sql = mysqli_query($conn,"update tbl_type SET status='$status',type='$type',image='$img'");
	$_SESSION['message']='Updated Successfully';
echo "<script>document.location.href='type-list.php'</script>";
exit();
	

	}
 include('header.php');
 		
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
                    <h1 class="page-header">Edit Type</h1>
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
						 
					<li><a href="type-list.php"><div class="btn btn-success">Manage type</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<?php
								$where = "where id = $_GET[id]";
$fetch = $main->get_single_record(tbl_type,$where);	
								?>
								
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
									
                             
                                    
                                        
                                        <div class="form-group">
                                           
                                         
                                            <label>Type:</label>
                                            
                                           
                                           <input type="text" name="type" id="type" class="form-control" value="<?php echo $fetch['type']; ?>" />
                                        </div>
										
										      <div class="form-group">
                                         
                                            
                                            <?php if($fetch['image']==''){ ?>
											 <label>Upload Image:</label>
                                           	<input type="file" name="file" id="image"> 
											<?php } ?>
											
											<?php if($fetch['image']!=''){ ?>
                                           		<input type="file" name="file" id="image"> <img src="../type_image/<?=$fetch['image']?>" width="50"/> 
												<input type="hidden" name="logo1" value="<?=$fetch['image']?>">
											<?php } ?>
                                        </div>
                                       <div class="form-group">  
                                        <label>Status:</label>
                                     
                                         <select name="status" class="form-control" id="status">
                                     <option value="" selected="selected">Select status</option>
                                         <option value="Active" <?php if($fetch['status']=='Active'){ echo "selected";} ?>>Active</option>
										 <option value="Inactive" <?php if($fetch['status']=='Inactive'){ echo "selected";} ?>>Inactive</option>
                                        </select>
                                        
                                       </div>
                                          <input type="hidden" name="id" value="<?=$_GET['id']?>" />
                                        <input type="submit" class="btn btn-danger add-button" name="submit" value="Update">
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
<script type="text/javascript">
$(document).ready(function() {
$('.add-button').click(function() {
if ($("#type").val()=="")
 { 
 alert ("Please enter type");
 return false;
 }
if ($("#status").val()=="")
 { 
 alert ("Please select status");
 return false;
 }
});
});
</script>

</body>

</html>


