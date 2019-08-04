<?php
include('include.php');
$title="Manage Programs";
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

$all_users_2= $main->getprogramLists('', '', $search_request);

$all_users =$main->getprogramLists($start, $perpage, $search_request);

$totrec = mysqli_num_rows($all_users_2);

?>
    <?php 

  $search_url ='';

  

  	if($_REQUEST['Search']=='Search'){

		



		$search_url .="&Search=".$_REQUEST['Search'];

		
       if($_REQUEST['status']!=''){

		$search_url .="&status=".$_REQUEST['status'];

		}
		if($_REQUEST['keywords']!=''){

		$search_url .="&keywords=".$_REQUEST['keywords'];

		}
			if($_REQUEST['zip_code']!=''){

		$search_url .="&zip_code=".$_REQUEST['zip_code'];

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
if($main->update_data($data,tbl_student,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) active successfully.</div>';
echo "<script>document.location.href='manage-student.php'</script>";
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
if($main->update_data($data,tbl_student,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) blocked successfully.</div>';
echo "<script>document.location.href='manage-student.php'</script>";
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
 /*
$fetch_default = $main->get_single_record(tbl_broker,"where agent_id='$Id'");
$broker_id = $fetch_default['id'];
$main->$main->delete_single_record(tbl_lead,"where default_agent_id='$broker_id'");
$main->$main->delete_single_record(tbl_lead,"where agent_id='$Id'");
$main->$main->delete_single_record(tbl_broker,"agent_id='$Id'");
*/
$where = " where id = $Id ";
if($main->delete_single_record(tbl_student,$where)){

$count++;

}

}



$_SESSION['message']=$count.' Records(s) deleted successfully.</div>';
echo "<script>document.location.href='manage-student.php'</script>";
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

                                                        <input type="text" name="keywords" class="form-control" PLACEHOLDER="Please enter Program Name" value="<?php echo $_GET['keywords']; ?>" />



                                                    </div>
												
												     
													
										
													  

                                                <div class="col-lg-4">
                                                    <div class="sea-bt pull-right">
                                                   
                                                            <input type="submit" name="Search" value="Search" />
															 

                                                        </form>
														<input type="button" name="Search" value="Clear filter" onclick="window.location='manage-program.php';" />
                                                    </div>
                                                    <div class="clearfix"></div>

                                                </div>


                                            </div>
                                        </div>
                                      
							
						</form>
						
                                        </ul>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <?php if($_SESSION['message']!=''){?>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                        <?=$_SESSION['message'];?>
                                            <a class="alert-link" href="#"></a>
                                    </div>
                                    <?php 
							 unset($_SESSION['message']);
						 } ?>
                                    <div class="dataTable_wrapper">
                                        <form name="product_form" id="product_form" action="manage-student.php" method="post">

                                            <input type="hidden" value="" name="doaction" id="doaction" />
                                            <table class="table table-striped table-bordered table-hover" id="example">
                                                <thead>
                                                    <tr>

                                                       <th>Sr</th>
													   <th>Student Name</th>
                                                        <th>Name</th>
                                                        <th>Langauge</th>
														
														<th>Total Keystroke</th>
                                                        <th>Created Date</th>
                                                        <th>Last Updated Date</th>
                                                        <th>No of Views</th>

                                                 
														
                                                        <th>Action</th>
                                                       </tr>
                                                </thead>
                                                <tbody>
                                                    <?php    $total_num =  mysqli_num_rows($all_users_2);
									  if( $total_num >0){

  $sn =1;

  while($rows = mysqli_fetch_array($all_users)){
	$cnt = $main->get_count_record(tbl_employee,"where store_id=$rows[id]");
	$student = $main->get_single_record(tbl_student,"where id=$rows[student_id]");
    $query = mysqli_query($conn,"SELECT SUM(count_keystroke) as total FROM tbl_keystroke WHERE program_id=".$rows['id']);
	$keystroke = mysqli_fetch_array($query);
	?>

                                                    <tr class="odd gradeX">

                                                    <td>
                                                            <?php  echo $sn;?>
                                                        </td>
														 <td>
                                                            <?php  echo ucwords($student['user_name']);?>
                                                        </td>
                                                        <td>
                                                            <?php  echo ucwords($rows['name']);?>
                                                        </td>
                                                        <td>
                                                            <?php  echo $rows['language'];?>
                                                        </td>

													   
														<td>
                                                              <a class="btn btn-warning btn-sm viewkeystroke" href="JavaScript:Void(0);" id="<?php echo $rows['id'];?>"><?php echo $rows['keystroke'];?></a>
														</td>
                                                        <td>
                                                            <?php echo $main->posteddate($rows['created_date']);?>
                                                        </td>
                                                         <td><?php echo $main->posteddate($rows['modified_at']);?></td>
                                                        <td>
                                                             <?php  echo $rows['views'];?>
                                                        </td>
                                                       
                                                       
														   

                                                        <td class="center">
                                                           <a href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#myModal11<?=$rows['id'];?>"> <span class="glyphicon glyphicon-eye-open" >		
</span> View</a>
											<!--<a class="btn btn-primary" href="edit-student.php?action=edit&id=<?php echo $rows['id']; ?>">
											

                                                            <span class="glyphicon glyphicon-pencil">Edit</a>

																<a class="btn btn-primary" href="view-student.php?&id=<?php echo $rows['id']; ?>">View details</a>-->
										
															
                                            </td>
                                            
                           			
										</tr>
                                <?php 
                                     $sn++;
									 
									 include('viewprogram.php');
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
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body"> </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
</html>
<script>
$(document).ready(function() {
 $('.viewkeystroke').click(function(){
    	var id = $(this).attr('id');
    
    	var dataString = 'id='+ id;
    	 $.ajax({
			type: "POST",
			url: "get_keystroke.php",
			data: dataString,
			cache: false,
			success: function(response){
						$('#largeModalLabel').html('Key Strokes');
						$('.modal-body').html(response);
						$('#largeModal').modal('show');
					}
										
            
			
		});
    	

     });
	  });
	  </script>