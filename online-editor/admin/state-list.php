<?php
include('include.php');
$title="Manage Freelancer";
include('header.php');


//print_r($_SESSION);

	$perpage = '10';

			$start = $_REQUEST['start'];

			if($start=='')

			$start=0;
			$sn = $start+1;
$search_request = '';

if(isset($_REQUEST['Search']) && $_REQUEST['Search'] == 'Search'){

$search_request = $_REQUEST;

}

$all_users_2= $main->getstateLists('', '', $search_request);

$all_users =$main->getstateLists($start, $perpage, $search_request);

$totrec = mysqli_num_rows($all_users_2);

?>
 <?php 

  $search_url ='';

  

  	if($_REQUEST['Search']=='Search'){

		



		$search_url .="&Search=".$_REQUEST['Search'];

		

		if($_REQUEST['keywords']!=''){

		$search_url .="&keywords=".$_REQUEST['keywords'];

		}

				

		if($_REQUEST['orderby']!=''){

		$search_url .="&orderby=".$_REQUEST['orderby'];
$search_url .="&order=".$_REQUEST['order'];

		}

		
	


	}
?>
<?php
if(isset($_POST['doaction']) && $_POST['doaction'] == 'Active'){


$size = sizeof($_POST['users_lists']);

if($size < 1){

$_SESSION['message']='Error! Plese select atleast one';

}else{

$count = 0;



foreach($_POST['users_lists'] as $del){

$Id= $del;

 $main->id = $Id;

if($main->activefreelancer()){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) active successfully.</div>';
echo "<script>document.location.href='manage-freelancer.php'</script>";
exit();
}



}
?>
<?php

	
	
if(isset($_POST['doaction']) && $_POST['doaction'] == 'Blocked'){


$size = sizeof($_POST['users_lists']);

if($size < 1){

$_SESSION['message']='Error! Plese select atleast one';

}else{

$count = 0;



foreach($_POST['users_lists'] as $del){

$Id= $del;

 $main->id = $Id;

if($main->blockfreelancer()){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) blocked successfully.</div>';
echo "<script>document.location.href='manage-freelancer.php'</script>";
exit();
}



}
?>
<?php
if(isset($_POST['doaction']) && $_POST['doaction'] == 'Delete'){

$size = sizeof($_POST['users_lists']);

if($size < 1){

$_SESSION['message']='Error! Plese select one product at least to delete';

}else{

$count = 0;



foreach($_POST['users_lists'] as $del){

$Id= $del;

 $main->id = $Id;

$where = " where id = $Id ";
if($main->delete_single_record(states,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) deleted successfully.</div>';
echo "<script>document.location.href='state-list.php'</script>";
exit();
}



}
?>
 <script src="function.js"></script>
    <link href="paging.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage State</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">					
                        <div class="panel-heading">
						 <ul class="list-inline text-right">
					
						 <div class="search-dr">
						 <div class="row">
                			<div class="col-lg-3">
						 <form method="get" action="">
							<input type="text" name="keywords"  class="form-control" PLACEHOLDER="Enter state" value="<?php echo $_GET['keywords']; ?>"/>
							<input type="hidden" name="Search" value="Search"/>
						</form>
						</div>
						<div class="col-lg-3">
							 <form method="get" action="">
							<select class="form-control" onchange="this.options[this.selectedIndex].value (window.location = this.options[this.selectedIndex].value);">
							<option value="state-list.php">Sort By </option>
							<option value="state-list.php?Search=Search&orderby=name&order=ASC" <?php if($_GET['order']=='ASC'){ echo "selected"; } ?>>ASC</option>
                             <option value="state-list.php?Search=Search&orderby=name&order=DESC" <?php if($_GET['order']=='DESC'){ echo "selected"; } ?>>DESC</option>

							</select>
							
						</form></div>
						
						
						</div>
						</div>
						
						
							<li><input class="btn btn-danger" type="submit" value="Delete" onclick="delete_category(this.value);"></li>
						 </ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<?php if($_SESSION['message']!=''){?>
							<div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                 <?=$_SESSION['message'];?> <a class="alert-link" href="#"></a>.
                            </div>
						 <?php 
							 unset($_SESSION['message']);
						 } ?>
                            <div class="dataTable_wrapper">
							<form name="product_form" id="product_form" action="state-list.php" method="post">

                                <input type="hidden" value="" name="doaction" id="doaction" />
                                 <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
                                        <tr>
										<th>Sr.</th>
									      
										   <th>Country</th>
                                            <th>State</th>
                                    
											
                                            <th>Action</th>
											 <th><input name="selectall" id="selectall" type="checkbox" value="" /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php    $total_num =  mysqli_num_rows($all_users_2);
									  if( $total_num >0){

  $sn =1;

  while($rows = mysqli_fetch_array($all_users)){
									
	$cnt = $main->getcountry($rows['country_id']);	
	$fetch = mysqli_fetch_array($cnt);							?>
                                        <tr class="odd gradeX">
										<td><?=$sn;?></td>
										   
                              		    <td> 
											<?php  echo ucwords($fetch['name']);?>
</td>
<td><?php  echo $rows['name'];?></td>

                                            <td class="center">
											
										<a href="add-state.php?action=edit&id=<?php echo $rows['id']; ?>">
											
<span class="glyphicon glyphicon-pencil"></span></a>
											</td>
                                       
										 <td><input name="users_lists[]" id="users_lists_<?=$rows['id']?>" type="checkbox" value="<?=$rows['id']?>"  class="checkboxes"/></td>
										</tr>
                                <?php 
                                     $sn++;} 

  	} else{ ?>
	
<td colspan="5">No record found</td>
                                        
                        <?php } ?>                
                                    
                                    </tbody>
									
                                </table>
							
								 <?php

                

                if($totrec>$perpage)

                { 

                 include("paging.php");

                }

              ?>
	</form>
                            </div>
							<ul class="list-inline pull-right">
						 	
							
							<li><input class="btn btn-danger" type="submit" value="Delete" onclick="delete_category(this.value);"></li>
							</ul>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
<?php include('footer.php'); ?>



</body>

</html>
