<?php
include('include.php');
$title="Manage CMS";
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

$all_users_2= $main->getCmsLists('', '', $search_request);

$all_users =$main->getCmsLists($start, $perpage, $search_request);

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

 $main->id = $Id;
$data = " status='active'";
$where = " where cms_id = '$Id'";
if($main->update_data($data,cms,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) active successfully.</div>';
header("Location: manage-cms.php");
echo "<script>document.location.href='manage-cms.php'</script>";
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

 $main->id = $Id;
$data = " status='inactive'";
$where = " where cms_id = '$Id'";
if($main->update_data($data,cms,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) inactive successfully.</div>';
header("Location: manage-cms.php");
echo "<script>document.location.href='manage-cms.php'</script>";
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

if($main->deletecms()){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) deleted successfully.</div>';
header("Location: manage-cms.php");
echo "<script>document.location.href='manage-cms.php'</script>";
exit();
}



}
?>
 <script src="function.js"></script>
    <link href="paging.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage CMS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">					
                        <div class="panel-heading">
						 <ul class="list-inline text-right">
						 
					
						 	
							<li><input class="btn btn-info" type="submit" value="Active" onclick="active_cms(this.value);" name="active"></li>
							<li><input class="btn btn-warning" type="submit" value="Inactive" onclick="inactive_cms(this.value);"></li>
							
							<!--<li><input class="btn btn-danger" type="submit" value="Delete" onclick="delete_cms(this.value);"></li>-->
						 </ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<?php if($_SESSION['message']!=''){?>
							<div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                 <?php echo $_SESSION['message'];?> <a class="alert-link" href="#"></a>.
                            </div>
						 <?php 
							 unset($_SESSION['message']);
						 } ?>
                            <div class="dataTable_wrapper">
							<form name="product_form" id="product_form" action="" method="post">

                                <input type="hidden" value="" name="doaction" id="doaction" />
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example111111">
                                    <thead>
                                        <tr>
									  
                                            <th>Title</th>
                                          
											<th>Status</th>
									
                                            <th>Action</th>
											     <th><input name="selectall" id="selectall" type="checkbox" value="" /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php    $total_num =  mysqli_num_rows($all_users);
									  if( $total_num >0){

  //$sn =1;

  while($rows = mysqli_fetch_array($all_users)){
									
									?>
                                        <tr class="odd gradeX">

                                            <td> 
											<?php  echo ucwords($rows['page_name']);?>
</td>

											<td><?php echo ucwords($rows['status']); ?></td>
                                         
                                            <td class="center">
											
											<a href="edit-cms.php?id=<?php echo $rows['cms_id']; ?>" >
											
<span class="glyphicon glyphicon-pencil"></span>
</a>
											</td>
                                       										    <td><input name="users_lists[]" id="users_lists_<?=$rows['cms_id']?>" type="checkbox" value="<?=$rows['cms_id']?>"  class="checkboxes"/></td>
										
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
						 	
										<li><input class="btn btn-info" type="submit" value="Active" onclick="active_cms(this.value);" name="active"></li>
							<li><input class="btn btn-warning" type="submit" value="Inactive" onclick="inactive_cms(this.value);"></li>
							
							<!--<li><input class="btn btn-danger" type="submit" value="Delete" onclick="delete_cms(this.value);"></li>-->
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

 
<?php include('footer.php') ?>
</body>

</html>
