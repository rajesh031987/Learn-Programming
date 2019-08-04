<?php include 'header.php';?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.profile-image {
position: relative;
display: inline-block;
}


.edit {
padding-top: 20px;
padding-right: 31px;
position: absolute;
right: 0;
top: 0;

}

.edit a {
color: #000;
}
.loadingx {
    position: absolute;
    width: 32px;
    top: 50%;
    left: 50%;
    margin-left: -16px;
    margin-top: -16px;
    display: none;
    z-index: 999;
}
</style>
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Profile
                <small>Welcome to programming world</small>
                </h2>
            </div>
            
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row clearfix">
            <div class=" col-md-12">
			
                <div class="card profile-header">
                    <div class="body text-center user-avatar">
                        <div class="profile-image"> 
						<div class="edit">	
						<form class="edit-phto" enctype="multipart/form-data">
							<input type="file" name="userfile1" id="image" accept="image/*" style="display: none;">
						</form>
						<a href="JavaScript:Void(0);"><i class="fa fa-pencil fa-lg"></i></a></div>

						<?php if($student['image'] == '') {?>
						<img id="file-select" src="profile_image/user.png"> <?php } else {?> <img id="file-select" src="profile_image/<?php echo $student['image'];?>"><?php } ?></div>
                        <img class="loadingx" src="images/loader.gif" style="width:50px;height:50px;"/>
						<!--<form class="edit-phto" enctype="multipart/form-data">
							<i class="fa fa-camera-retro"></i>
							<label class="fileContainer">
								<a href="javascript:void(0);" data-toggle="modal" data-target="#myModalavatar">Edit Display Photo</a>
								<input type="file" name="userfile1" id="image" accept="image/*">
								
							</label>
							
						</form-->
						
						
						<div>
                            <h4 class="m-b-0"><strong><?php echo ucfirst($student['user_name']);?></h4>
                            <p><?php echo $student['address'];?>, <?php echo $city['name'];?>, <?php echo $countries['name'];?></p>
                        </div>
                      
                       
                    </div>                    
                </div>                               
               
                               
            </div>
            <div class="col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                      
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Account">Account</a></li>                        
                    </ul>
                    
                    <div class="tab-content">
                    
                        <div class="tab-pane body active" id="Account">
                            <?php if(isset ($_GET['result']) && $_GET['result'] == 0){?>
						<div class="alert alert-danger" style="border-radius: 5%;" role="alert">Please try again!</div>
				    <?php }?>
				      <?php if(isset ($_GET['result']) && $_GET['result'] == 3){?>
						<div class="alert alert-danger" style="border-radius: 5%;" role="alert">Current Password is wrong!</div>
				    <?php }?>
				    <?php if($_GET['result'] == 1){?>
				       <div class="alert alert-success" style="border-radius: 5%;" role="alert">Submit successfully!</div>
                    <?php }?> 
                            <form action="update_password.php" method="POST" id="password-form">
                            <div class="form-group">
                                <input type="password" name="cpassword" class="form-control" placeholder="Current Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="npassword" class="form-control" placeholder="New Password" required>
                            </div>
                            <button class="btn btn-info btn-round" name="password_update">Save Changes</button>
                            </form>
                            <hr>
                             <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
							
							 
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?php echo $student['first_name']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $student['last_name']?>">
                                    </div>
                                </div>
								
								 <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="University" name="university" value="<?php echo $student['university']?>">
                                    </div>
                                </div>
								
								  <div class="col-lg-4 col-md-12">
                                    <div class="form-group m-b-6">
                                        <input type="text" class="form-control" placeholder="Course"  name="course" value="<?php echo $student['course']?>">
                                    </div>
                                </div>
								<div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="address" placeholder="Address" value="<?php echo $student['address']?>">
                                    </div>
                                </div>
								 <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $student['city']?>">
                                    </div>
                                </div>
								<div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Zipcode" name="pincode" value="<?php echo $student['pincode']?>">
                                    </div>
                                </div>
								

                                         <input type="hidden" name="id" value="<?php echo $student['id']?>">
										 <input type="hidden" class="form-control" placeholder="Mobile" name="phone" value="<?php echo $student['phone']?>">
										<input type="hidden" class="form-control" placeholder="Email" name="email" value="<?php echo $student['email']?>" readonly>
                                   
                                        <input type="hidden" class="form-control" placeholder="Student Id" name="student_id" value="<?php echo $student['student_id']?>" readonly>
                                   
                                
                                <!--<div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control" placeholder="Image" name="image">
                                        <input type="hidden" name="oldimage" value="<?php echo $student['image']?>">
                                    </div>
                                </div>--> 
                               
                                
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                       <?php $query1=mysqli_query($conn,"select * from countries ORDER BY name ASC");?>
                                            <select class="form-control country" name="country">
                							    <option value="">Select your country</option>
                								<?php while($country=mysqli_fetch_array($query1)){?>
                								<option <?= $student['id'] == $country['id'] ? 'selected' : ''; ?> value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                                    		    <?php } ?>
                							</select>
                                    </div>
                                </div>
                               
                                
                               
                                
                                
                                
                                
                              
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-round" name="profile_update">Save Changes</button>
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
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<script>
$(document).ready(function(){

$('.fa-pencil').click(function(){

$('#image').click();
});
});
</script>
<script>
$(document).ready(function(){
	/* handling form validation */
	$("#password-form").validate({
		rules: {
		   
			cpassword: {
				required: true,
			},
			npassword: {
                    required: true,
                }
			
			
		},
		
		
		submitHandler: function (form) {
             $(form).ajaxSubmit(); 
        }
		
	});	

 $('input[name=userfile1]').change(function(){
var _URL = window.URL;
	 var ele = $(this);
	  var file, img;
	 var iSize = ($('#image')[0].files[0].size / 1024 / 1024); 
			 	if(iSize > 2){ 
			alert( 'File size exceeds 2 MB'); //push error text
			//$('.add-button').attr('disabled', 'disabled');
			return false;//set proceed flag to false
		    } 
		
		  var ext = ele.val().split('.').pop().toLowerCase();
		  if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
		   alert('invalid image!');
		   return false;
		  }
		  	  var file_data = $(this).prop('files')[0];
		  var form_data = new FormData();                  
		   form_data.append('userfile1', file_data)              
		  form_data.append('user_id', '25') 
		      if ((file = this.files[0])) {
		//alert(file);
        img = new Image();
        img.onload = function () {
           // alert('Width:' + this.width + '   Height: ' + this.height);
			var w = this.width ;
			var h = this.height ;
			//alert(this.type);
			//alert(w);
			//if(w >= 500 && h>= 500){
				             
		  $.ajax({
		     url: 'uploadprofileimage.php',
		   //dataType: 'script',
		   cache: false,
		   contentType: false,
		   processData: false,
		   data: form_data,                        
		   type: 'post',
		   beforeSend: function(){
			$('.loadingx').show();
		   },
		   success: function(response){
			  
			
			$('#file-select').attr('src', response).show();
			$('.loadingx').hide();
		   },
		  }) 
			//}
			
			
		}
       img.src = _URL.createObjectURL(file);
    }
	});
});
	</script>