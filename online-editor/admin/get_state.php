<?php
include('include.php');
if($_POST['id'] || $_POST['uid']){
	$uid = $_POST['uid'];
	
	$id = $_POST['id'];
	$uid = $_POST['uid'];
	
	$sql_s = "select * from states where country_id = '$id'";
	$query_s = mysqli_query($conn,$sql_s);
	?>
		
    
	<option value="">Select your state</option>
                    						
     <?php while($state = mysqli_fetch_array($query_s)) { ?>
                    						
       <option  value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                    
    
     <?php } ?>               
	<?php } ?>
	
<?php	
  if($_POST['cid']){
	  
	  $cid = $_POST['cid'];
	  $sql_s1 = "select * from cities where state_id = '$cid'";
	$query_s1 = mysqli_query($conn,$sql_s1);
	?>
	<option value="">Select your city</option>
                    						
     <?php while($city = mysqli_fetch_array($query_s1)) { ?>
                    						
       <option  value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                    
    
     <?php } ?>               
	<?php } ?>
	
	
	
	
	