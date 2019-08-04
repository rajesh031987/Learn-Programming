<?php
include('include.php');

 $title="Service Category"; 
?>
<?php


?>
<?php
if($_GET['action']=='update'){

		 $id = $_GET['id'];
	     $name = $_POST['city'];
	     $state = $_POST['state'];	
		
	$sql = mysqli_query($conn,"UPDATE cities SET name='$name',state_id='$state' WHERE id='$id'");
	$_SESSION['message']='City Updated Successfully';
echo "<script>document.location.href='city-list.php'</script>";
exit();
	
	
	}
if($_GET['action']=='add'){

		 $id = $_GET['id'];
		$name = $_POST['city'];
	     $state = $_POST['state'];
		
		
	$sql = mysqli_query($conn,"insert into cities SET name='$name',state_id='$state'");
	$_SESSION['message']='City inserted Successfully';
echo "<script>document.location.href='add-city.php'</script>";
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
                    <h1 class="page-header"><?php if($_GET['action']=='edit'){ echo "Edit"; } else{ echo "Add"; } ?> City</h1>
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
						 
					<li><a href="city-list.php"><div class="btn btn-success">Manage City</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<?php
								$select1 = "select * from cities where id='".$_GET['id']."'";
								$select2 = mysqli_query($conn,$select1);
	                            $fetch1 = mysqli_fetch_array($select2); 
									$cnt1 = mysqli_query($conn,"select * from states where id='".$fetch1['state_id']."'");	
	                                   $fetch2 = mysqli_fetch_array($cnt1);
								$cnt = $main->getcountry($fetch2['country_id']);	
	                            $fetch3 = mysqli_fetch_array($cnt);							?>
          
											
<?php if($_GET['action']=='edit'){ ?>
                                    <form role="form" action="add-city.php?action=update&id=<?php echo $_GET[id] ?>" method="post">
									<?php }  else{
									
							?>
							 <form role="form" action="add-city.php?action=add" method="post">
							 <?php } ?>	
                               <div class="form-group">
                                           
                                         
                                            <label>Country:</label>
                                            <?php $query1=mysqli_query($conn,"select * from countries ORDER BY name ASC");
											 ?>
                                            <select class="form-control country" name="country" id="country">

                                             <option value="">Select your country</option>

											<?php while($country=mysqli_fetch_array($query1)){?>
                       				
                                            <option <?= $fetch3['id'] == $country['id'] ? 'selected' : ''; ?> value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                    						
                                            <?php } ?>
                                            </select>
                                           
                                        </div>
                                        <div class="form-group">  
                                        <label>State:</label>
                                        <?php $st = $fetch['user_state']; ?>
                                        <?php $query1=mysqli_query($conn,"select * from states where id = $st");
											$row = mysqli_fetch_array($query1);
											 ?>
                                         <select name="state" class="form-control state" id="state">
                                         <!--<option value="" selected="selected">Select your state</option>-->
                                         <option value="<?php echo $fetch2['id'];?>" selected="selected"><?php echo $fetch2['name'];?></option>
                                        </select>
                                        
                                       </div>
                                        
                                        <div class="form-group">
                                           
                                         
                                            <label>City:</label>
                                            
                                           
                                           <input type="text" name="city" id="city" class="form-control" value="<?=$fetch1['name'];?>"/>
                                        </div>
                                  
                                       
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
 if ($("#city").val()=="")
 { 
 alert ("Please enter city");
 return false;
 }
});
});
</script>
<script>
$(document).ready(function(){
	var uid = "<?php echo $_GET['id'];?>";
	$('.country').change(function(){
	  $('.state').find('option').remove();
	  var id = $(this).val();
	  
	  var dataString = 'id='+id +'uid='+uid;
	   
	   
	  $.ajax({
	    type: 'POST',
		url: 'get_state.php',
		data: dataString,
		success: function(html){
			$('.state').html(html);
		}
	   
	})

	});
	
	$('.state').change(function() {
		$('.city').find('option').remove();
		var cid = $(this).val();
		
		var dataString= 'cid='+ cid;
		
		$.ajax({
			
			type: 'POST',
			url: 'get_state.php',
			data: dataString,
			success: function(html){
				
				$('.city').html(html);
			}
		})
		
	});

});

</script>
</body>

</html>


