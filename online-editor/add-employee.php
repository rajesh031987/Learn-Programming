<?php include 'header.php';
include 'db_cls_connect.php';
?>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Employee
                <small>Welcome to Barcode</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Employee</li>
                </ul>                
            </div>
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row clearfix">
            
            <div class="col-md-12">
                <div class="card">
                  
                    <div class="tab-content">
                      <div class="tab-pane body active" id="Account">
					  <?php if(isset ($_GET['result']) && $_GET['result'] == 0){?>
						<div class="alert alert-danger  col-md-4" role="alert">Employee Code already exist!</div>
						<?php }?>
						<?php if($_GET['result'] == 1){?>
						   <div class="alert alert-success col-md-4" role="alert">Employee Code generated successfully!</div>
						<?php }?> 
					   <?php if($_GET['eid']){
						  	$query = "SELECT * FROM tbl_employe WHERE id='$_GET[eid]'";
							$resultset = mysqli_query($conn, $query);
							$row = mysqli_fetch_assoc($resultset); 
					   }?>
					   
						<form class="form" id="signup-form"  action="emp-submit.php" name="signup-form" role="form" style="display: block;" method="post" autocomplete="off">
                          
                            <div class="row clearfix">
							
								<div class="col-lg-6 col-md-12">
                                    <button class="btn btn-primary btn-round" id="generate-emp-id">Generate Employee ID</button>
                                </div>
								<div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="empid" name="empid" placeholder="Employee ID" value="<?php echo $row['fullname'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['fullname'];?>" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['emp-id'];?>" >
                                    </div>
                                </div>                                    
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $row['email'];?>" >
                                    </div>
                                </div>
								 <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="phone" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $row['mobile'];?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group m-b-10">
                                        <textarea rows="4" class="form-control no-resize" id="addrees" name="address" placeholder="Address Line 1"><?php echo $row['address'];?> </textarea>
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <div class="checkbox">
                                        <input id="procheck2" type="checkbox">
                                        <label for="procheck2">New task notifications</label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="procheck3" type="checkbox">
                                        <label for="procheck3">New friend request notifications</label>
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <button type="submit" name="emp-submit" class="btn btn-primary btn-round">Save Changes</button>
                                </div>
								
                            </div>
							</form>
                        </div>                        
                    </div>
                </div>
                          
            </div>
        </div>        
    </div>
</section>
<?php include 'footer.php';?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	
	 $('#generate-emp-id').on('click',function(e){
		
	 
		 this.length = 8;
		 this.timestamp = +new Date;
		 
		 var _getRandomInt = function( min, max ) {
			return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
		 }
		 
		
			 var ts = this.timestamp.toString();
			 var parts = ts.split( "" ).reverse();
			 var id = "";
			 
			 for( var i = 0; i < this.length; ++i ) {
				var index = _getRandomInt( 0, parts.length - 1 );
				id += parts[index];	 
			 }
			 
			 $('#empid').val('Emp_'+id);
			  //alert(id);
		

		 

	 }); 
 });
</script>

<script>
$(document).ready(function(){
	/* handling form validation */
	$("#signup-form").validate({
		rules: {
			empid: {
				required: true,
			},
			fname: {
				required: true,
			},
			lname: {
				required: true,
			},
			email: {
				required: true,
				email: true
			},
			mobile: {
				required: true,
				mobile: true
			},
			address1: {
				required: true,
				
			},
			
		},
		
		
		submitHandler: function (form) {
             $(form).ajaxSubmit(); 
        }
		
	});	


	});

	</script>