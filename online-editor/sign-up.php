<?php include 'db_cls_connect.php';?>
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Student :: Sign Up</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/authentication.css">
    <link rel="stylesheet" href="css/color_skins.css">
	<script type="text/javascript" charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<style>
	.error{color:red;}
	.footer {
   padding: 0px!important; 
}
.page-header-form{margin-top:120px;}
body{background:#ffffff;}
.authentication .card-plain {
    border-radius: .25rem;
    padding-bottom: 0px;
    max-width: 320px;
    padding-top: 9px;
}
.p-b-20, .authentication .card-plain .header {
   padding-bottom: 0px!important;
    
}
.card-plain select {
    background: #88888E !important;
}

/*waqaar work */
.new-s .page-header:after, .page-header:before {
 
    /*background: white !important;*/
}

.form-control{
                        border-radius: 0px !important;
                    }

                    .new-s  .form-control {
   
    border-radius: 0px !important;
    background: #faffbd !important;
    color: black !important;
    border:1px solid black !important;

}
   .new-s  .form-control::placeholder{
    color: black !important;
   }
.new-s .btn-round {
    border-radius: 0px !important;
    font-weight: 900;
}
.new-s a.nav-link.btn.btn-white.btn-round {
    background: #a9a9a9;
    color: white;
    font-weight: 900;
}
    .Food-delivery{
		text-align: center;
	}
			.Food-delivery p {
			color: black;
			font-size: 35px;
			text-align: center;
			position: relative;
			top: 15px !important;
			font-weight: 800;
	}
	.navbar{z-index: 1 !important;}
	</style>
</head>


<body class="theme-cyan authentication sidebar-collapse new-s" style="background-image: url('bg-01.jpg');">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="javascript:void(0);" title="" target="_blank"><img style="width:100px;" src="images/logo.jpg" alt=""></a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                          
                <li class="nav-item">
                    <a class="nav-link btn btn-white btn-round" href="index.php">SIGN IN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->


<div class="clearfix"></div>


<div class="page-header-form">
   <!-- <div class="page-header-image" style="background-image:url(images/login.jpg)"></div>-->
    <div class="container">
        <div class="col-md-12">
         <!-- waqar -->
		  <div class="Food-delivery">
			  <p>Learn Programming</p>
			</div>
            <div class="card-plain">
                <?php if(isset ($_GET['result']) && $_GET['result'] == 0){?>
						<div class="alert alert-danger" style="border-radius: 5%;" role="alert">Email or student id is already exist!</div>
				    <?php }?>
				    <?php if($_GET['result'] == 1){?>
				       <div class="alert alert-success" style="border-radius: 5%;" role="alert">Submit successfully!</div>
                    <?php }?> 
                <form class="form" id="signup-form"  action="response.php" name="signup-form" role="form" style="display: block;" method="post" autocomplete="off">
                    <!--<div class="header">
                        <div class="logo-container">
                            <img src="images/logo.svg" alt="">
                        </div>
                       <h5>Sign Up</h5>
                        <span>Register a new Store</span>
                    </div>-->
                    <div class="content">   
                     <div class="form-group">
                            <input type="text" class="form-control" name="student_id" placeholder="Enter Student Id" autocomplete="off">
                         </div>
                         
                         <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" autocomplete="off">
                         </div>  
                         
                         <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" autocomplete="off">
                         </div>  
                      
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Enter Email" autocomplete="off">
                         </div> 
						 
						<div class="form-group">                         
						 <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" autocomplete="off"/>
                        </div>   

						<div class="form-group">                         
						 <input type="password" name="cpassword" placeholder="Enter Confirm Password" class="form-control" autocomplete="off"/>
                        </div>
						
						
                        				
						
						<!--<div class="form-group"> 
						 <?php $query1=mysqli_query($conn,"select * from countries ORDER BY name ASC");?>
                            <select class="form-control country" name="country">
							    <option value="">Select your country</option>
								<?php while($country=mysqli_fetch_array($query1)){?>
								<option <?= $fetch3['id'] == $country['id'] ? 'selected' : ''; ?> value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                    		    <?php } ?>
							</select>
                        </div>  -->   
                        	
						<!--<div class="form-group"> 
                            <select class="form-control state" name="state">
							   
								
							</select>
                        </div>  
                        <div class="form-group">
                         <select class="form-control city" name="city">
							   
							</select>
                        </div> 
                        
                        <div class="form-group"> 
                            <input type="text" placeholder="City" name="city" class="form-control city" autocomplete="off">
                        </div>-->
												
                        </div> 						
                    </div>
                    <!--<div class="checkbox">
                            <input id="terms" type="checkbox">
                            <label for="terms">
                                    I read and agree to the <a href="javascript:void(0);">terms of usage</a>
                            </label>
                        </div>-->
                   <div class="footer text-center">
				      	    
							<button type="submit" name="signup-submit" id="signup-submit" class="button btn btn-primary btn-round"><span>SIGN UP</span></button>
							
                        <h5><a class="link" href="index.php" style="color:#000000;">You already have a Registered?</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
</div>
<script>
$(document).ready(function(){
	/* handling form validation */
	$("#signup-form").validate({
		rules: {
		    student_id: {
				required: true,
			},
			first_name: {
				required: true,
			},
			last_name: {
				required: true,
			},
			
			email: {
				required: true,
				email: true
			},
			
			password: {
				required: true,
			},
			cpassword: {
                    equalTo: "#password"
                }
			
			
		},
		
		
		submitHandler: function (form) {
             $(form).ajaxSubmit(); 
        }
		
	});	


	});

	</script>
	
	<script>
$(document).ready(function(){
	var uid = "<?php echo $_GET['id'];?>";
	$('.country').change(function(){
	  $('.state').find('option').remove();
	  var id = $(this).val();
	  
	  var dataString = 'id='+id +'uid='+uid;
	   
	   
	  $.ajax({
	    type: 'POST',
		url: 'get_state.php',
		data: dataString,
		success: function(html){
			$('.state').html(html);
		}
	   
	})

	});
	
	$('.state').change(function() {
		$('.city').find('option').remove();
		var cid = $(this).val();
		
		var dataString= 'cid='+ cid;
		
		$.ajax({
			
			type: 'POST',
			url: 'get_state.php',
			data: dataString,
			success: function(html){
				
				$('.city').html(html);
			}
		})
		
	});

});

</script>

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
</script>
</body>
</html>