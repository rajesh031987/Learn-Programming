<?php
include('include.php');

 $uid = $_GET['id'];
 ?>
	
<?php


/*if( ($_SESSION['Admin']=='') || ($_SESSION['Admin_login']=='')){
	
echo "<script>document.location.href='login.php'</script>";	

}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Enable Hover State on Bootstrap 3 Table Rows</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>
<?php
 $query=mysql_query("select * from tbl_register where id='".$_GET['id']."'");
 $fetch=mysql_fetch_array($query);
  $email = $fetch['user_email'];
  $tableName='tbl_subscription';
  $where=" email='$email' ";
$rows = selectRow($tableName, $where);
// find plan id
  $tableName='tbl_user_plan';
  $where=" id='".$fetch['id']."'";
$fetchplanid = selectRow($tableName, $where);
// find plan details
  $tableName='tbl_plan';
  $where=" id='".$fetchplanid['plan_id']."'";
$plan = selectRow($tableName, $where);
?>
<h3 align="center">Subscriptions Details</h3>
<div class="bs-example">
    <table class="table table-hover">
        <thead>
                 <tr class="success">
				 <td><strong>Weight</strong></td>
				 <td><?= $rows['weight']; ?></td>
				</tr>		
				          <tr class="success">
				 <td><strong>Goal</strong></td>
				 <td><?= $rows['mygoal']; ?></td>
				</tr>		
					          <tr class="success">
				 <td><strong>Height</strong></td>
				 <td><?= $rows['height_inch']; ?> Feet <?=$rows['height_feet'];?> Inches (<?php echo  $inches = feetToinch($rows['height_inch'], $rows['height_feet']) ;?>C.M)</td>
				</tr>		
						          <tr class="success">
				 <td><strong>Age</strong></td>
				 <td><?= $rows['age']; ?></td>
				</tr>		
							          <tr class="success">
				 <td><strong>Goal</strong></td>
				 <td><?= $rows['mygoal']; ?></td>
				</tr>		
							          <tr class="success">
				 <td><strong>Gender</strong></td>
				 <td><?= $rows['gender']; ?></td>
				</tr>		
					  		          <tr class="success">
				 <td><strong>RMR Rate</strong></td>
				 <td><?php  if($rows['gender']==' Male'){  echo manRmr($rows['weight'], $rows['height'], $rows['age']);          } else {    echo womenRmr($rows['weight'], $rows['height'], $rows['age']);                          } ?></td>
				</tr>		       	
	        </thead> 
	    
    </table>


  
</div>
    
	
</div>
<h3 align="center">Plan details</h3>
<div class="bs-example">

    <table class="table table-hover">
        <thead>
                 
			
				  <tr class="success">
				
                <td><strong>Title</strong></td>
				
				<td><?=$plan['plan_title']?></td>
				</tr>
				  <tr class="success">
				
                <td><strong>Price</strong></td>
				
				<td><?=$currency;?> <?php  echo $plan['price'];?>  <?=$plan['price_type'];?></td>
				</tr>
				
					  <tr class="success">
				
                <td><strong>Description</strong></td>
				
				<td><?=$plan['plan_desc']?></td>
				</tr>
				
				
       
				<tr class="success">
				
                <td><strong>Plan s.date</strong></td>
				
				  <td><?php  echo date('d-M-Y',strtotime($fetchplanid['created_date']));?></td>
				</tr>
					<tr class="success">
				      <td><strong>plan e.date</strong></td>
				
				  <td><?php  
				  $date = date('Y-m-d',strtotime($fetchplanid['created_date']));
				
				  if($plan['price_type']=='/Month'){ 
				  $add_days = 30;
				  echo date('d-M-Y',fetchplanid($date.' +'.$add_days.' days'));  
				      }
				   if($plan['price_type']=='/Year'){ 
				    $add_days = 365;
				   echo date('d-M-Y',fetchplanid($date.' +'.$add_days.' days'));       }
				    if($plan['price_type']=='/Week'){ 
					  $add_days = 7;
					 echo date('d-M-Y',strtotime($date.' +'.$add_days.' days'));     }
				  ?>
				  </td>
				</tr>		
						
	        </thead> 
	    
    </table>


  
</div>
    
<h3 align="center">Basic Details</h3>
    <?php
									  
                                       // get plan details
                                       $plan = $main->get_plan_details($fetch['subscribe_plan_id']);
									   // get transact ion details
									   $payment = $main->get_transaction_details($_GET[id],$fetch[subscribe_plan_id]);
                                       
                                       ?>
<div class="bs-example">
    <table class="table table-hover">
        <thead>
                 <tr class="success">
				 <?php if($fetch['user_img']!=''){ ?>
                <td><strong>Profile Image</strong></td>
				
				<td><img src="../profileimage/<?=$fetch['user_img']?>"  width="204" height="136" class="img-rounded"/></td>
				</tr>
				<?php } ?>
				 <tr class="success">
				  <td><strong>Name</strong></td>
				<td> <?php echo $fetch['user_fname'].' '.$fetch['user_lname']; ?></td>
				</tr>
	
					 <tr class="success">
				  <td><strong>Email</strong></td>
				<td> <?php echo $fetch['user_email']; ?></td>
				</tr>
			
						 <tr class="success">
				  <td><strong>Country</strong></td>
				<td>     <?php $query1=mysql_query("select * from countries where id='".$fetch['user_country']."' ");
											$fetch1 = mysql_fetch_array($query1);
											echo $fetch1['name'];
											 ?></td>
				</tr>
					 <tr class="success">
				  <td><strong>State</strong></td>
				<td>   <?php  $st = $fetch['user_state']; ?>
                                        <?php $query1=mysql_query("select * from states where id = $st");
										$row = mysql_fetch_array($query1);
										echo $row['name'];
											 ?></td>
				</tr>
						 <tr class="success">
				  <td><strong>City</strong></td>
				<td>       <?php $ct = $fetch['user_city']; ?>
                                        <?php $query1=mysql_query("select * from cities where id = $ct");
											$row1 = mysql_fetch_array($query1);
										echo $row['name'];
										?></td>
				</tr>
					 <tr class="success">
				  <td><strong>Address</strong></td>
				<td>     <?php echo $fetch['user_address']; ?></td>
				</tr>
					 <tr class="success">
				  <td><strong>Describe Yourself</strong></td>
				<td>       <?php echo strip_tags($fetch['user_about']); ?></td>
				</tr>
        </thead>
        
    </table>
	</div>
	<h3 align="center">Other Details</h3>
	<?php
	  $tableName='tbl_form';
  $where=" subscription_id='".$rows['id']."' ";
$otherdetails = selectRow($tableName, $where);



	?>

	<?php
        if($rows['form_type']=='man'){
 $fetchdata=  json_decode($otherdetails['man_data']);

include('man-data.php');
}
if($rows['form_type']=='child'){
 $fetchdata = $otherdetails['child_data '];
 $fetchdata=  json_decode($otherdetails['child_data']);

}
if($rows['form_type']=='women'){

 $fetchdata=  json_decode($otherdetails['women_data']);
 include('women-data.php');

}
?>

</body>
</html>                                		