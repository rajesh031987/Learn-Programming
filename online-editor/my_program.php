<?php include 'header.php';
// ini_set('display_errors', 1); 
include_once("classes/functions_common.php");
$main = new main();


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

			
       if($_REQUEST['emp_id']!=''){

		$search_url .="&emp_id=".$_REQUEST['emp_id'];

		}
       
			if($_REQUEST['store_id']!=''){

		$search_url .="&store_id=".$_REQUEST['store_id'];

		}
		if($_REQUEST['andor']!=''){

		$search_url .="&andor=".$_REQUEST['andor'];

		}
	

		if($_REQUEST['sortby']!=''){

		
$search_url .="&sortby=".$_REQUEST['sortby'];

		}
	}
?>
<style>
.modal-backdrop {
    z-index: 1 !important;
}
.modal-dialog {
		margin: 6.75rem auto !important; 
     }
.modal-title{margin:0px;}
.modal .modal-header .close{padding:0px;}
.modal-content .modal-header {
    padding-top:10px;
}
.zmdi{cursor:pointer;}
.modal-backdrop {
    z-index: 1 !important;
}
body[style]{
overflow-y:auto !important;
box-sizing: content-box;	
}
</style>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Manage Programs
                <small>Welcome to programming world</small>
                </h2>
            </div>
            
        </div>
    </div> 
						
    <div class="container-fluid">
        <div class="row clearfix">
            
            <div class="col-md-12">
                <div class="card">
                  
                    <div class="tab-content">
                      <div class="tab-pane body active" id="Account">
					  <form method="get" action="">
						 <div class="row">
						 
								
													
								 <div class="col-lg-4">
                                             <input type="text" name="keywords" id="name" class="form-control" placeholder="Search By name"  value="<?php echo $_GET['keywords']; ?>" >

                                                    </div>
								
								<div class="col-sm-4">
									<div class="form-group">
			 
				
                <input type="submit" name="Search" value="Search" class="btn btn-primary"/>
				
				<a href="my_program.php"  class="btn btn-primary">Clear filter</a>
				
									</div>
									
								</div>
								
							 
						</div>
				 </form>
						
                        <div class="row clearfix">
							
						
								 <table  class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Sr #</th>
											<!--<th>Program Name</th>-->
											<th>Language</th>
											<!--<th>Code</th>
											<th>Input</th>
											<th>Output</th>-->
											<th>KeyStroke</th>
											<th>Created Date</th>
											<th>Last Updated Date</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
										<?php    $total_num =  mysqli_num_rows($all_users_2);
											if( $total_num >0){
											$sn =1;
											while($rows = mysqli_fetch_array($all_users)){?>	
										<tr>
										<td><?php echo $sn;?></td>
										<!--<td><?php echo $rows['name'];?></td>-->
										<td><?php echo $rows['language'];?></td>
										<!--<td><?php echo $rows['code'];?></td>
										<td><?php echo $rows['input'];?></td>
										<td><?php echo $rows['output'];?></td>-->
										<td><a class="btn btn-primary btn-sm viewkeystroke" href="JavaScript:Void(0);" id="<?php echo $rows['id'];?>"><?php echo $rows['keystroke'];?></a></td>
										<td><?php echo $rows['created_date'];?></td>
										<td><?php echo $rows['modified_at'];?></td>
										
										<td>
										<a class="btn btn-primary btn-sm view" href="JavaScript:Void(0);" id="<?php echo $rows['id'];?>">View</a>
													    
										<a class="btn btn-primary btn-round" href="edit-code.php?id=<?php echo $rows['id'];?>&language=<?php echo $rows['language'];?>">Edit</a></td>
										</tr>
											<?php $sn++;} }?>
										</tbody>
									
								</table>
							

						
                        </div> 
 <?php
           if($totrec>$perpage)
{ 
  include("paging.php");
 }

              ?>						
                    </div>
                </div>
                          
            </div>
        </div>        
    </div>
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
</section>

<?php include 'footer.php';?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://uxsolutions.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
 $('.view').click(function(){
    	var id = $(this).attr('id');
    
    	var dataString = 'id='+ id;
    	 $.ajax({
			type: "POST",
			url: "get_program_info.php",
			data: dataString,
			cache: false,
			success: function(response){
						$('#largeModalLabel').html('Program Info');
						$('.modal-body').html(response);
						$('#largeModal').modal('show');
					}
										
            
			
		});
    	

     });
	 
	 
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
