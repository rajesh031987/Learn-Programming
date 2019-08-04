
   <!-- Modal -->
  <div id="myModal11<?=$rows['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center"><strong>Program details</strong></h4>
      </div>
      <div class="modal-body">
	                               
							 <div class="col-md-6 col-sm-4 name" ><b>Name:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['name'];?></div> 
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-4 name" ><b>Langauge:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['language'];?></div> 
										<div class="clearfix"></div>   
										<div class="col-md-6 col-sm-4 name" ><b>Code:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['code'];?></div> 
										<div class="clearfix"></div>  
                                        <!--<div class="col-md-6 col-sm-4 name" ><b>Input:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['input'];?></div> 
										<div class="clearfix"></div>-->   
										 <div class="col-md-6 col-sm-4 name" ><b>Output:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['output'];?></div> 
										<div class="clearfix"></div>  
										 <div class="col-md-6 col-sm-4 name" ><b>Created Date:</b></div> 
										<div class="col-md-6 col-sm-8"><?=$rows['created_date'];?></div> 
										<div class="clearfix"></div>  
									
										
						
									
									
                                 	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




      
    </div>