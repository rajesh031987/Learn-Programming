<?php
include('include.php');

 $title="Edit Category"; 
 include('header.php');


 ?>
<?php
			
if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$type = $_POST['type'];
	$category = $_POST['category'];

		$status = $_POST['status'];
		
mysqli_query($conn,"update tbl_category set type='$type',category='$category',status='$status' where id='$id'");		
$_SESSION['message'] = "Category updated successfully";
	$redirect ='category-list.php';
		$main->redirect($redirect);
		exit();
}


?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
					 <?php if($_SESSION['message']!=''){?>
			<div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                 <?php echo $_SESSION['message'];?> <a class="alert-link" href="#"></a>.
                            </div>
							  <?php 
							  unset($_SESSION['message']);
							  } ?>
							  
                    <div class="panel panel-default">
               
							 
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
						<?php
														$where = "where id = $_GET[id]";
                                       $fetch = $main->get_single_record(tbl_category,$where);
						?>
							 <form role="form" action="" method="post" enctype="multipart/form-data">
							
									
                                          <div id="tabs-1">
								    <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type" id="type" required >
											<option value="">Select type</option>
											<?php
											$list = $main->get_list_record(tbl_type,"where status='Active'");
											foreach($list as $type){
											?>
											
											<option value="<?=$type['id'];?>" <?php if($fetch['type']==$type['id']){ echo "selected"; } ?>><?=$type['type'];?></option>
											<?php } ?>
                                           </select>
                                        </div>  
										<div class="form-group">
                                            <label>Category Name</label>
                                            <input required class="form-control" name="category" id="category" value="<?php echo $fetch['category']; ?>">
                                           
                                        </div>
									
										
                                      
                                    <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status" required  >
											<option value="Active" <?php if($fetch['status']=='Active'){ echo "selected"; } ?>>Active</option>
											<option value="Inactive" <?php if($fetch['status']=='Inactive'){ echo "selected"; } ?>>Inactive</option>
                                           </select>
                                        </div>  

                                        
                                        
                                        
                                        
                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/>
                                        <input type="submit" class="btn btn-danger add-button" name="submit" value="Update">
                                      <!--  <button type="reset" class="btn btn-default">Reset Button</button>-->
                                    </form>
                              
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
					
						
                        <!-- /.panel-body -->
                    </div>
					</div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
	
   <?php include('footer.php'); ?>
<script>
$(document).ready(function() {
$('.add-button').click(function() {
		if ($("#categoryname").val()=="") { alert ("Please enter category name !"); return false }
		
});
});
</script>
</body>

</html>

