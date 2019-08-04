<?php include('include.php');
?>
<?php $title="CMS"; ?>



<?php include('header.php'); ?>
<?php
	$get=mysqli_query($conn,"select * from cms where cms_id='".$_GET['id']."'");
	  $cms_details=mysqli_fetch_array($get);
	  @extract($cms_details);
	  //print_r($cms_details);
	  
				
				extract($_POST);
		
				
if(isset($_POST['update']) && $_POST['update']=='Save'){
	    $main->cms_id = $_GET['id'];

		$main->page_name = $_POST['title'];

		$main->descp = addslashes ($_POST['description']);

		$main->meta_title = $_POST['meta_title'];

		$main->meta_description = $_POST['meta_desc'];

		$main->meta_keywords = $_POST['meta_keywords'];

		$main->active = $_POST['status'];

       //$main->MysqlRealEscapeString($contents);	
	   $insert_id =$main->edit_cms();
		if($insert_id){
$_SESSION['message']='Updated Successfully';
echo "<script>document.location.href='manage-cms.php'</script>";
exit();
}else{
$_SESSION['message']='Error! Something is not right here';
echo "<script>document.location.href='manage-cms.php'</script>";
exit();
}


}

include('ckeditor/ckeditor.php');
 include('ckeditor/ckfinder/ckfinder.php');

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit CMS</h1>
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
                      <div class="panel-heading">
						 <ul class="list-inline text-right">
						 
					<li><a href="manage-cms.php"><div class="btn btn-success">Manage Cms</div></a></li>
						 </ul>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
						
							 <form role="form" action="edit-cms.php?id=<?=$_GET['id']?>" method="post">
						
									
                                        
										<div class="form-group">
                                            <label>Page Name</label>
                                            <!--<select class="form-control" name="parent" id="parent" >
											<option value="">Select Parents</option>
                                           </select>-->
										  <input type="text" name="title" id="title" value="<?=$cms_details['page_name']?>"  class="form-control">
                                        </div>
                                       <div class="form-group">
                                            <label>Description</label>
                                          <?php
				$ckeditor = new CKEditor( ) ;
				$ckeditor->basePath	= 'ckeditor/' ;
				CKFinder::SetupCKEditor($ckeditor,'ckeditor/ckfinder/' ) ; 
				$ckeditor->editor('description',stripcslashes($descp), '100%');
				?>
                                           
                                        </div>
                                             
                                 <div class="form-group">
                                            <label>Meta Title</label>
                                            <?php
				$ckeditor = new CKEditor( ) ;
				$ckeditor->basePath	= 'ckeditor/' ;
				CKFinder::SetupCKEditor($ckeditor,'ckeditor/ckfinder/' ) ; 
				$ckeditor->editor('meta_title',stripcslashes($meta_title), '100%');
				?>
                                           
                                        </div>     
										<div class="form-group">
                                            <label>Meta Keywords</label>
                                            <?php
				$ckeditor = new CKEditor( ) ;
				$ckeditor->basePath	= 'ckeditor/' ;
				CKFinder::SetupCKEditor($ckeditor,'ckeditor/ckfinder/' ) ; 
				$ckeditor->editor('meta_keywords',stripcslashes($meta_keywords), '100%');
				?>
                                           
                                        </div> 
										<div class="form-group">
                                            <label>Meta Description</label>
                                          <?php
				$ckeditor = new CKEditor( ) ;
				$ckeditor->basePath	= 'ckeditor/' ;
				CKFinder::SetupCKEditor($ckeditor,'ckeditor/ckfinder/' ) ; 
				$ckeditor->editor('meta_desc',stripcslashes($meta_description), '100%');
				?>
                                           
                                        </div> 
                                    <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status" >
											<option value="active" <?php if($status=='active'){ echo "selected"; } ?>>Active</option>
											<option value="inactive" <?php if($status=='inactive'){ echo "selected"; } ?>>Inactive</option>
                                           </select>
                                        </div>    
                                        
                                        
                                        
                                        
                                        
                                        <input type="hidden" value="<?php $_GET['id']; ?>" name="catid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="Save">
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
<script>
$(document).ready(function() {
$('.add-button').click(function() {
		if ($("#categoryname").val()=="") { alert ("Please enter category details"); return false }
});
});
</script>
</body>

</html>

