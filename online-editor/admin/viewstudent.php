
   <!-- Modal -->
  <div id="myModal<?=$rows['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center"><strong>Student details</strong></h4>
      </div>
      <div class="modal-body">
                                        <div class="col-md-6 col-sm-4 name" ><b>Image:</b></div> 
										<div class="col-md-6 col-sm-8">
										<?php if($rows['image'] != ''){?>
										<img style="width:100px;height:100px;" src="../profile_image/<?=$rows['image'];?>">
										<?php } else {?>
										<img style="width:100px;height:100px;" src="../profile_image/user.png">
										<?php } ?>
										</div> 
										<div class="clearfix"></div>
	                               
							 <div class="col-md-6 col-sm-4 name" ><b>Name:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['user_name'];?></div> 
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-4 name" ><b>Email:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['email'];?></div> 
										<div class="clearfix"></div>   
										<div class="col-md-6 col-sm-4 name" ><b>Address:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['address'];?></div> 
										<div class="clearfix"></div>  
                                        <div class="col-md-6 col-sm-4 name" ><b>Contact number:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['phone'];?></div> 
										<div class="clearfix"></div>
										   <div class="col-md-6 col-sm-4 name" ><b>University:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['university'];?></div> 
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-4 name" ><b>Course:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['course'];?></div> 
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-4 name" ><b>Country:</b></div> 
										<div class="col-md-6 col-sm-8">
										    <?php
										    $where = "where id=".$rows['country'];
										    $country = $main->get_single_record("countries","$where");
										    echo $country['name'];?>
										    </div> 
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-4 name" ><b>City:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['city'];?></div> 
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-4 name" ><b>Zipcode:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['pincode'];?></div> 
										<div class="clearfix"></div>
										
										
									
										
						
									
									
                                 	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




      
    </div>