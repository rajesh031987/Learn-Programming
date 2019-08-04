<?php
include('include.php');
$title="Manage order";
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

$all_users_2= $main->getorderLists('', '', $search_request);

$all_users =$main->getorderLists($start, $perpage, $search_request);

$totrec = mysqli_num_rows($all_users_2);

?>
    <?php 

  $search_url ='';

  

  	if($_REQUEST['Search']=='Search'){

		



		$search_url .="&Search=".$_REQUEST['Search'];

		
       if($_REQUEST['order_id']!=''){

		$search_url .="&order_id=".$_REQUEST['order_id'];

		}
		if($_REQUEST['emp_id']!=''){

		$search_url .="&emp_id=".$_REQUEST['emp_id'];

		}
			if($_REQUEST['store_id']!=''){

		$search_url .="&store_id=".$_REQUEST['store_id'];

		}
		if($_REQUEST['andor']!=''){

		$search_url .="&andor=".$_REQUEST['andor'];

		}
	    if($_REQUEST['fromdate']!=''){

		$search_url .="&fromdate=".$_REQUEST['fromdate'];

		}
		if($_REQUEST['todate']!=''){

		$search_url .="&todate=".$_REQUEST['todate'];

		}
		if($_REQUEST['marketcenter']!=''){

		$search_url .="&marketcenter=".$_REQUEST['marketcenter'];

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

$data = " status='Active'";
$where = " where id = '$Id'";
if($main->update_data($data,tbl_employee,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) active successfully.</div>';
echo "<script>document.location.href='manage-employee.php'</script>";
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

$data = " status='Blocked'";
$where = " where id = '$Id'";
if($main->update_data($data,tbl_employee,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) blocked successfully.</div>';
echo "<script>document.location.href='manage-employee.php'</script>";
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

 $fetchimg = $main->get_single_record(tbl_employee," where id = $Id ");	
 $main_img = $fetchimg['profile_image'];

 unlink("../profile_image/".$main_img);
$where = " where id = $Id ";
if($main->delete_single_record(tbl_employee,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) deleted successfully.</div>';
echo "<script>document.location.href='manage-employee.php'</script>";
exit();
}



}
?>
<style>
    .co-smt {
        margin-top: 15px;
    }
    
    .sea-bt {
        margin-top: 12px;
        margin-right: 6px;
    }
    
    .sea-bt input[type="submit"] {
        border: 0px;
        padding: 6px 20px;
        background: rgba(255, 0, 0, .6);
        color: #fff;
    }
	    .sea-bt input[type="button"] {
        border: 0px;
        padding: 6px 20px;
        background: rgba(255, 0, 0, .6);
        color: #fff;
    }
</style>
                <script src="function.js"></script>
                <link href="paging.css" rel="stylesheet">
                <div id="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <?php echo $title;?>
                            </h1>
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
                                                <form method="get" action="">
                                                    <div class="col-lg-4">

                                                        <input type="text" name="order_id" class="form-control" PLACEHOLDER="Order id" value="<?php echo $_GET['order_id']; ?>" />



                                                    </div>
												 <div class="col-lg-4">

                                                        <input type="text" name="store_id" id="store_id" class="form-control" PLACEHOLDER="Store name/id" value="<?php echo $_GET['store_id']; ?>" />



                                                    </div>
														
												     <div class="col-lg-4">

                                                        <input type="text" name="emp_id" class="form-control" PLACEHOLDER="Employee id" value="<?php echo $_GET['emp_id']; ?>" />



                                                    </div>
														
													
										
													  

                                                <div class="col-lg-4">
                                                    <div class="sea-bt pull-right111">
                                                   
                                                            <input type="submit" name="Search" value="Search" />
															 

                                                        </form>
														<input type="button" name="Search" value="Clear filter" onclick="window.location='manage-order.php';" />
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </div>
                                        

                                            </div>
                                        </div>
                                      
							
						</form>
						<!--
                                        <li><input class="btn btn-info" type="submit" value="Active" onclick="active_category(this.value);" name="active"></li>
                                        <li><input class="btn btn-warning" type="submit" value="Blocked" onclick="block_category(this.value);" name="blocked"></li>

                                        <li><input class="btn btn-danger" type="submit" value="Delete" onclick="delete_category(this.value);"></li>
                            -->                                   
								   </ul>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <?php if($_SESSION['message']!=''){?>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                        <?=$_SESSION['message'];?>
                                            <a class="alert-link" href="#"></a>.
                                    </div>
                                    <?php 
							 unset($_SESSION['message']);
						 } ?>
                                    <div class="dataTable_wrapper">
                                        <form name="product_form" id="product_form" action="manage-employee.php" method="post">

                                            <input type="hidden" value="" name="doaction" id="doaction" />
                                            <table class="table table-striped table-bordered table-hover" id="example">
                                                <thead>
                                                    <tr>
                                                     
                                                       <th>Order id</th>
													    <th>Store name</th>
                                                        <th>Emplyee name</th>
                                                        <th>Product</th>
                                                       <th>Price</th>
                                                       
                                                        <th>Created Date</th>
                                                      


                                                 
														
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php    $total_num =  mysqli_num_rows($all_users_2);
									  if( $total_num >0){

  $sn =1;

  while($rows = mysqli_fetch_array($all_users)){
		$store = $main->get_single_record(tbl_store,"where id='$rows[id]'");
 $emp = $main->get_single_record(tbl_employee,"where id='$rows[emp_id]'");				
	$cnt = $main->getcountry($rows['country']);	
	$fetch = mysqli_fetch_array($cnt);
// user state
$wherestate = "where id = $rows[state]";
$fetchstate = $main->get_single_record(states,$wherestate);
// user city
$wherecity = "where id = $rows[city]";
$fetchcity = $main->get_single_record(cities,$wherecity);


	?>

                                                    <tr class="odd gradeX">

                                                        <td>
                                                            <?php  echo $rows['order_id'];?>
                                                        </td>
														<td><?=$store['store_name'];?> (store id :<?=$store['id'];?>)</td>
                                                        <td>
                                                            <?php  echo ucwords($emp['fullname']);?> (emp id :<?=$emp['id'];?>)
                                                        </td>
                                         <td>
                                                            <?php  echo $rows['product_name'];?>
                                                        </td>
														 <td>
                                                            <?php  echo $rows['price'];?>
                                                        </td>
                                                        <td>
                                                            <?php echo $main->posteddate($rows['created_date']);?>
                                                        </td>

                                                       

                                                        <td class="center">
                                                            <span class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#myModalaaa<?=$rows['id'];?>">		
		</span>
		<?php /*
											<a href="edit-employee.php?action=edit&id=<?php echo $rows['id']; ?>">
									

                                                            <span class="glyphicon glyphicon-pencil"></a> */?>

                                            </td>
                                            
										
										</tr>
                                <?php 
                                     $sn++;
									 
									 include('users.php');
									 } 

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
						 	    	<!--
                                        <li><input class="btn btn-info" type="submit" value="Active" onclick="active_category(this.value);" name="active"></li>
                                        <li><input class="btn btn-warning" type="submit" value="Blocked" onclick="block_category(this.value);" name="blocked"></li>

                                        <li><input class="btn btn-danger" type="submit" value="Delete" onclick="delete_category(this.value);"></li>
                            -->  
                                    </ul>
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
<script>
    $(document).ready(function () {
        $('#store_id').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "allstore.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>

</body>

</html>