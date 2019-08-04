<?php
include('include.php');

 $title="Service Category"; 
 include('header.php'); 
   include_once("resize.php");
 ?>
<?php




?>
<?php

		 if(isset($_POST['update']))
		{
					   $query=mysql_query("select * from tbl_media where id='".$_GET['id']."'");
										$fetch=mysql_fetch_array($query);
										@extract($fetch);
			$type = $_POST['type'];
			$status = $_POST['status'];
			$logo1 = $_POST['logo1'];
            $id = $_POST['id'];
			if($_FILES['file']['name']!=''){
	 		 $img=uniqid().$_FILES['file']['name'];
		
              move_uploaded_file($_FILES['file']['tmp_name'],"../backgroundimage/$img");
		
		}
			if($_FILES['file']['name']==''){
		
		     $img = $logo1;
		 
		}
		
				 mysql_query("update tbl_media set type='$type',image_name='$img' where id='$id'");
	
 		$_SESSION['message'] = 'Updated successfully';
			$redirect ='manage-media.php';
		$main->redirect($redirect);										
			
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
                    <h1 class="page-header">Edit Background image </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<?php
				if($_GET['del']=='delete'){
	
	
	echo "dsfdsfsdfs";

	
	}
        
		?>
		
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
                     <!--   <ul class="list-inline text-right">
						 
					<li><a href="manage-media.php"><div class="btn btn-success">Manage Media</div></a></li>
						 </ul>-->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								
							 <form role="form" action="" method="post" enctype="multipart/form-data">
							 		
									
                                       <?php
									   $query=mysql_query("select * from tbl_media where id='".$_GET['id']."'");
										$fetch=mysql_fetch_array($query);

                                       ?>
 
                                       
                                        
                                       <div class="form-group">
                                         
                                            <label>Image:</label>
                                            <?php if($fetch['image_name']==''){ ?>
											 <label>Image:</label>
                                           	<input type="file" name="file" id="image"> 
											<?php } ?>
											
											<?php if($fetch['image_name']!=''){ ?>
                                           		<input type="file" name="file" id="image"> <img src="../backgroundimage/<?=$fetch['image_name']?>" width="50"/> 
												<input type="hidden" name="logo1" value="<?=$fetch['image_name']?>">
											<?php } ?>
                                        </div>
                                        
                                        <div class="form-group">
                                           
                                         
                                            <label>Type:</label>
                                            <select id="type" name="type" class="form-control">
                                            <option value="">Please select one</option>
											 <option value="Index" <?php if($fetch['type']=='Index'){ echo "selected"; } ?>>Index</option>
                                            <option value="Login" <?php if($fetch['type']=='Login'){ echo "selected"; } ?>>Login</option>
                                        
											 <option value="Sign up restraurant" <?php if($fetch['type']=='Sign up restraurant'){ echo "selected"; } ?>>Sign up restraurant</option>
										    <option value="Sign up influencer" <?php if($fetch['type']=='Sign up influencer'){ echo "selected"; } ?>>Sign up influencer</option>
                                             <option value="Create campaign" <?php if($fetch['type']=='Create campaign'){ echo "selected"; } ?>>Create campaign</option>
											 <option value="Reset Password" <?php if($fetch['type']=='Reset Password'){ echo "selected"; } ?>>Reset Password</option>
											 <option value="Faq" <?php if($fetch['type']=='Faq'){ echo "selected"; } ?>>Faq</option>
											  <option value="Term of use" <?php if($fetch['type']=='Term of use'){ echo "selected"; } ?>>Term of use</option>
											  <option value="Contact us" <?php if($fetch['type']=='Contact us'){ echo "selected"; } ?>>Contact us</option>
											</select>
                                            </div>
                                       
                                        <input type="hidden" name="id" value="<?=$_GET['id']?>" />
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="Update">
										
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
 alert ("Please select type");
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

