<?php
include('include.php');

 $title="Add Subcategory"; 
 include('header.php');


 ?>
<?php
			
if(isset($_POST['submit'])){
    $category = $_POST['category'];
	$subcatname = $_POST['subcatname'];

		
mysqli_query($conn,"insert into tbl_subcategory set cat_id='$category',subcatname='$subcatname'");		
$_SESSION['message'] = "Sub Category inserted successfully";
	$redirect ='add-subcategory.php';
		$main->redirect($redirect);
		exit();
}


?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Subcategory </h1>
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
								<?php if($_GET['action']=='edit'){ ?>
                                    <form role="form" action="add-category.php?action=update&catid=<?php echo $_GET[id] ?>" method="post" enctype="multipart/form-data">
									<?php }  else{
									
							?>
							 <form role="form" action="" method="post" enctype="multipart/form-data">
							 <?php } ?>		
									
                                          <div id="tabs-1">
								    <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" id="category" required >
											  
											<option value="">Select Category</option>
												<?php
											$list = $main->get_list_record(tbl_type,"where status='Active' ORDER BY type ASC ");
											foreach($list as $type){
											?>
											<optgroup label="<?=$type['type'];?>">
										
											<?php 	$list1 = $main->get_list_record(tbl_category,"where status='Active' AND type='$type[id]' ORDER BY category ASC");
											foreach($list1 as $cat){?>
											<option value="<?=$cat['id'];?>"><?=$cat['category'];?></option>
											<?php } ?>
										
											 </optgroup>
											 	<?php } ?>
                                           </select>
                                        </div>  
										<div class="form-group">
                                            <label>Subcategory</label>
                                            <input required class="form-control" name="subcatname" id="subcatname">
                                           
                                        </div>
									
										
                                      
                        
                                        
                                        
                                        
                                        
                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="catid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="submit" value="Add">
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

