<?php
include('include.php');

 $title="Service Category"; 
?>
<?php



?>
<?php
if($_GET['action']=='update'){
global $conn;
		 $id = $_GET['id'];
		$name = $_POST['name'];
		$country_code = $_POST['country_code'];


   $sql = mysqli_query($conn,"update  countries SET name='$name',country_code='$country_code' where id='$id'");
	$_SESSION['message']='Country inserted Successfully';
echo "<script>document.location.href='country-list.php'</script>";
exit();
	
	

	
	
	
	
	}
if($_GET['action']=='add'){
global $conn;
		 $id = $_GET['id'];
		$name = $_POST['name'];
		$country_code = $_POST['country_code'];
	$query=mysqli_query($conn,"select * from  countries where name='$name'");
	$rec = mysqli_num_rows($query);
		if($rec > 0){

	$_SESSION['message']='Country exists in database';
echo "<script>document.location.href='country.php'</script>";
exit();
	
	}
	else{
   $sql = mysqli_query($conn,"insert into  countries SET name='$name',country_code='$country_code'");
	$_SESSION['message']='Country inserted Successfully';
echo "<script>document.location.href='country-list.php'</script>";
exit();
	
	}

	
	
	
	
	}

		
	
 include('header.php'); 
?>
        
        
		<script>

	$(document).ready(function(){

		

		$('.datepicker').datepicker({ format: 'yyyy-mm-dd', });

	});

</script>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Country</h1>
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
                   <?php /*?>     <ul class="list-inline text-right">
						 
					<li><a href="country-list.php"><div class="btn btn-success">Manage Country</div></a></li>
						 </ul><?php */?>
							  							  <div id="tabs">


                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								
							
<?php if($_GET['action']=='edit'){ ?>
                                    <form role="form" action="country.php?action=update&id=<?php echo $_GET[id] ?>" method="post" enctype="multipart/form-data">
									<?php }  else{
									
							?>
							 <form role="form" action="country.php?action=add" method="post" enctype="multipart/form-data">
							 <?php } ?>	
							
									
                                       <?php
									   $query=mysqli_query($conn,"select * from  countries where id='".$_GET['id']."'");
										$fetch=mysqli_fetch_array($query);
                                     
                                       ?>
                                 
                                        <div class="form-group">
                                           
                                         
                                            <label>Country</label>
                                            
                                           
                                           <input type="text" name="name" id="name" class="form-control" value="<?=$fetch['name'];?>"/>
                                        </div>
								   <div class="form-group">
                                           
                                         
                                            <label>Country Code</label>
                                            
                                           
                                           <input type="text" name="country_code" id="country_code" class="form-control" value="<?=$fetch['country_code'];?>"/>
                                        </div>
                                
                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="uid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="update"  value="
										<?php if($_GET['action']!=''){ echo "Update"; } else{ echo "Add"; }?>" >
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
    

    <style>

	</style>
<?php include('footer.php'); ?>
<script type="text/javascript">
$(document).ready(function() {
$('.add-button').click(function() {
if ($("#name").val()=="")
 { 
 alert ("Please enter country");
 return false;
 }
});
});
</script>

</body>

</html>

