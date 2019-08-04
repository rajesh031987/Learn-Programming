<?php
include('include.php');

 $title="Service Category"; 
?>
<?php


?>
<?php
if($_GET['action']=='update'){

		 $id = $_GET['id'];
	     $name = $_POST['country'];
	     $state = $_POST['state'];	
		
	$sql = mysqli_query($conn,"UPDATE states SET name='$state',country_id='$name' WHERE id='$id'");
	$_SESSION['message']='State Updated Successfully';
echo "<script>document.location.href='state-list.php'</script>";
exit();
	
	
	}
if($_GET['action']=='add'){

		 $id = $_GET['id'];
		$name = $_POST['country'];
	     $state = $_POST['state'];
		
	$sql = mysqli_query($conn,"insert into states SET name='$state',country_id='$name'");
	$_SESSION['message']='State inserted Successfully';
echo "<script>document.location.href='add-state.php'</script>";
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
                    <h1 class="page-header">Add State</h1>
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
						 
					<li><a href="state-list.php"><div class="btn btn-success">Manage State</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<?php
								$select1 = "select * from states where id='".$_GET['id']."'";
								$select2 = mysql_query($select1);
	                            $fetch1 = mysql_fetch_array($select2); 
								?>					
<?php if($_GET['action']=='edit'){ ?>
                                    <form role="form" action="add-state.php?action=update&id=<?php echo $_GET[id] ?>" method="post">
									<?php }  else{
									
							?>
							 <form role="form" action="add-state.php?action=add" method="post">
							 <?php } ?>	
                               <div class="form-group">
                                   <label>Country:</label>
                                          <select class="form-control" name="country" id="country">
										 
									<option value="">Select Country</option>
									  <?php
									   $query=mysqli_query($conn,"select * from  countries ORDER BY name ASC");
										while($fetch=mysqli_fetch_array($query)){
                                    ?>
									<option value="<?=$fetch['id'];?>" <?php if($fetch1['country_id']==$fetch['id']){ echo "selected";} ?>><?=$fetch['name'];?></option>	  
										<?php } ?>  
										  </select>
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>State:</label>
                                            
                                           
                                           <input type="text" name="state" id="state" class="form-control" value="<?=$fetch1['name'];?>"/>
                                        </div>
                                  
                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="uid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="
										<?php if($_GET['action']!=''){ echo "Update"; } else{ echo "Add"; }?>">
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
if ($("#country").val()=="")
 { 
 alert ("Please select country");
 return false;
 }
 if ($("#state").val()=="")
 { 
 alert ("Please enter state");
 return false;
 }
});
});
</script>
</body>

</html>


