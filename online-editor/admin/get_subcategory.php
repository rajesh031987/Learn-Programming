<?php
include('include.php');
if($_POST['id']){
	
	
	$id = $_POST['id'];
	
	
	$sql_s = "select * from tbl_category where parent_cat = '$id'";
	$query_s = mysqli_query($conn,$sql_s);
	?>
		
    
	<option value="">Select subcategory</option>
                    						
     <?php while($category = mysqli_fetch_array($query_s)) { ?>
                    						
       <option  value="<?= $category['id'] ?>"><?= $category['category'] ?></option>
                    
    
     <?php } ?>               
	<?php } ?>
	