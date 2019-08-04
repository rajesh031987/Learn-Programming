
   <!-- Modal -->
  <div id="myModal<?=$rows['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center"><strong>Employee details</strong></h4>
      </div>
      <div class="modal-body">
	  	                           
										<div class="col-md-6 col-sm-4 name" ><b>Emp id:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['emp_id'];?></div> 
										<div class="clearfix"></div>
										   <?php if($rows['profile_image']!=''){ ?>
											<div class="col-md-6 col-sm-4 name" ><b>Profile image :</b></div> 
										<div class="col-md-6 col-sm-8"><img src="../profile_image/<?=$rows['profile_image'];?>" width="100" height="100" /></div> 
										<div class="clearfix"></div>
										<?php } ?>
	                                    <div class="col-md-6 col-sm-4 name" ><b>Name:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['fullname'];?></div> 
										<div class="clearfix"></div>
										   <div class="col-md-6 col-sm-4 name" ><b>Email:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['email'];?></div> 
										<div class="clearfix"></div>
										
										  <div class="col-md-6 col-sm-4 name" ><b>Contact number:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['contactnumber'];?></div> 
										<div class="clearfix"></div>
									    <div class="col-md-6 col-sm-4 name" ><b>Country:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$fetch['name'];?></div> 
										<div class="clearfix"></div>
										 <div class="col-md-6 col-sm-4 name" ><b>State:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$fetchstate['name'];?></div> 
										<div class="clearfix"></div>
										 <div class="col-md-6 col-sm-4 name" ><b>City:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$fetchcity['name'];?></div> 
										<div class="clearfix"></div>
						                    <div class="col-md-6 col-sm-4 name" ><b>Address:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['address'];?></div> 
										<div class="clearfix"></div>
											<div class="col-md-6 col-sm-4 name" ><b>Created date:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$main->posteddate($rows['created_date']);?></div> 
										<div class="clearfix"></div>
						 <h4 class="modal-title" align="center"><strong>Store details</strong></h4>
						 <div class="col-md-6 col-sm-4 name" ><b>Name:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$store['store_name'];?></div> 
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-4 name" ><b>Email:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$store['email'];?></div> 
										<div class="clearfix"></div>   
										<div class="col-md-6 col-sm-4 name" ><b>Address:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$store['address'];?></div> 
										<div class="clearfix"></div>  
                                        <div class="col-md-6 col-sm-4 name" ><b>Contact number:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$store['phone'];?></div> 
										<div class="clearfix"></div>   
										

									
										
						
									
									
                                 	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




      
    </div>