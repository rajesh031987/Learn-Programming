<?php
include('include.php');
$title="Manage  Category";
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

$all_users_2= $main->getCategoryLists('', '', $search_request);

$all_users =$main->getCategoryLists($start, $perpage, $search_request);

 $totrec = mysqli_num_rows($all_users_2);

?>
 <?php 

  $search_url ='';

  

  	if($_REQUEST['Search']=='Search'){

		



		$search_url .="&Search=".$_REQUEST['Search'];

		

		if($_REQUEST['category']!=''){

		$search_url .="&category=".$_REQUEST['category'];

		}

				

		if($_REQUEST['orderby']!=''){

		$search_url .="&orderby=".$_REQUEST['orderby'];

		}

		
		if($_REQUEST['order']!=''){

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
$data = " status='Active'";
$where = " where id = '$Id'";
if($main->update_data($data,tbl_category,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) active successfully.</div>';
		$redirect ="category-list.php?type=$_GET[type]";
		$main->redirect($redirect);
		exit();
}



}
?>
<?php
if(isset($_POST['doaction']) && $_POST['doaction'] == 'Inactive'){


$size = sizeof($_POST['users_lists']);

if($size < 1){

$_SESSION['message']='Error! Plese select atleast one';

}else{

$count = 0;



foreach($_POST['users_lists'] as $del){

$Id= $del;
$data = " status='Inactive'";
$where = " where id = '$Id'";
if($main->update_data($data,tbl_category,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) active successfully.</div>';
	$redirect ="category-list.php?type=$_GET[type]";
		$main->redirect($redirect);
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

$fetch = $main->get_single_record(tbl_category,"where id='$del'");
$img = $fetch['image'];
 unlink("../category_image/".$img);
$where = " where id = $Id ";
if($main->delete_single_record(tbl_category,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) deleted successfully.</div>';
		$redirect ="category-list.php";
		$main->redirect($redirect);
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
                    <h1 class="page-header">Manage category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">					
                        <div class="panel-heading">
						 <ul class="list-inline text-right">
						  </ul>
						
						 <ul class="list-inline text-right">
						    <div class="search-dr">
							<div class="row">
                                                
                                                    <div class="col-lg-4">

								
						 <form method="get">
							<input type="text" name="category"  class="form-control" style="width:300px;" PLACEHOLDER="Search category" value="<?php echo $_GET['category']; ?>"/>
						


                                                    </div>
													             <div class="col-lg-4">
                                                    <div class="sea-bt pull-right">
                                                   
                                                            <input type="submit" name="Search" value="Search" />
															 
 </form>
                                                       
														<input type="button" name="Search" value="Clear filter" onclick="window.location='category-list.php';" />
                                                    </div>
                                                    <div class="clearfix"></div>

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
							<form name="product_form" id="product_form" action="category-list.php" method="post">

                                <input type="hidden" value="" name="doaction" id="doaction" />
                                <table class="table table-striped table-bordered table-hover" id="example1234">
                                    <thead>
                                        <tr>
										 
											<th>Category</th>
											 
                                            <th>Action</th>
											 <th><input name="selectall" id="selectall" type="checkbox" value="" /></th>

                                        </tr>
                                    </thead>
                                    <tbody>
									<?php     $total_num =  mysqli_num_rows($all_users_2);
									  if( $total_num >0){

  //$sn =1;

  while($rows = mysqli_fetch_array($all_users)){
		$parent = $main->get_single_record(tbl_category,"where id=$rows[parent_cat]");	
//print_r($parent);		
									?>
                                        <tr class="odd gradeX">
							 
                                            <td> 
											<?php 
											if($parent['category']!=''){
												echo $parent[category]. ' > ';
											}
											echo $rows['category'];
											
											?>
                                            </td>

                                         
                                            <td class="center">
											<a href="add-category.php?id=<?php echo $rows['id']; ?>">
											
<span class="glyphicon glyphicon-pencil"></span>
</a>
											</td>
                                       
										    <td><input name="users_lists[]" id="users_lists_<?=$rows['id']?>" type="checkbox" value="<?=$rows['id']?>"  class="checkboxes"/></td>
										</tr>
                                <?php 
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
						 		<?php /*
							<li><input class="btn btn-info" type="submit" value="Active" onclick="active_category(this.value);" name="active"></li>
							<li><input class="btn btn-warning" type="submit" value="Inactive" onclick="inactive_category(this.value);"></li>
							*/ ?>
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

   <?php include('footer.php'); ?>
   <script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
	<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   true,
        "ordering": false,
        "info":     false
    } );
} );
</script>
</body>

</html>
