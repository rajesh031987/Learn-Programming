<?php
include('include.php');

 $title="Add Category"; 
?>

<?php

if(isset($_POST['submit'])){

	   
	     $category = mysqli_real_escape_string($conn,$_POST['category']);
		 $parent_cat = mysqli_real_escape_string($conn,$_POST['parent_cat']);
		
		
		$found = $main->get_count_record(tbl_category,"where category='$category'");
		if($found==0){
		
		
	$sql = mysqli_query($conn,"insert into tbl_category  SET category='$category',parent_cat='$parent_cat'");
	$_SESSION['message']='Category inserted Successfully';
     $main->redirect("add-category.php");
       exit();
		}
			if($found > 0){

	$_SESSION['message']='Category already exist in database.';
     $main->redirect("add-category.php");
       exit();
		}

	}
	if(isset($_POST['update'])){

	
	    $category = mysqli_real_escape_string($conn,$_POST['category']);
		$parent_cat = mysqli_real_escape_string($conn,$_POST['parent_cat']);
	     $id = $_POST['id'];
		  $logo1 = $_POST['logo1'];
		
			
		
	$sql = mysqli_query($conn,"update tbl_category  SET category='$category',parent_cat='$parent_cat' where id=$id");
	$_SESSION['message']='Category updated Successfully';
     $main->redirect("category-list.php");
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
                    <h1 class="page-header">Category</h1>
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
						 
					<li><a href="category-list.php"><div class="btn btn-success">Manage Category</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<?php
                 $fetch = $main->get_single_record(tbl_category,"where id=$_GET[id]");

								?>
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
									
                             
                                        <div class="form-group">
                                           
                                         
                                            <label>Parent:</label>
                                            
                                           <select id="parent_cat" name="parent_cat" class="form-control"> 
										   <option value="0">Select parent category</option>
										   <?php 
										  $f_cat =  $main->get_list_record(tbl_category,"where parent_cat=0 ORDER BY category ASC");
										  foreach($f_cat as $parent_category){
										   ?>
										   <option value="<?=$parent_category['id'];?>" <?php if($parent_category['id']==$fetch['parent_cat']){ echo "selected"; } ?>><?=$parent_category['category'];?></option>
										  <?php } ?>
										   </select>
                                        </div>
                                        
                                        <div class="form-group">
                                           
                                         
                                            <label>Category:</label>
                                            
                                           
                                           <input type="text" name="category" id="category" class="form-control" value="<?=$fetch[category];?>" required/>
                                        </div>
									
										       <input type="hidden" name="type" value="<?=$_GET['type'];?>">
                                   
                                       <?php if($_GET['id']==''){ ?>
                                        <input type="submit" class="btn btn-danger add-button" name="submit" value="Add">
									   <?php } ?>
									    <?php if($_GET['id']!=''){ ?>
										<input type="hidden" name="id" value="<?=$_GET['id'];?>">
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="Update">
									   <?php } ?>
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
$('.add-button11').click(function() {
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


