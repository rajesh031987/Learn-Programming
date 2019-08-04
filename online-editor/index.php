
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Student :: Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/authentication.css">
    <link rel="stylesheet" href="css/color_skins.css">
	<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<style>
		

	.error{color:red !important;}

.l-login {

    height: 100vh !important;

}


/*new css 30-jan*/
.Food-delivery{
	text-align: center;
}
		.Food-delivery p {
		color: black;
		font-size: 25px;
		text-align: center;
		position: relative;
		top: 15px !important;
		font-weight: 800;
}
/* .go .card-plain {
	position: relative;
	top: 180px;*/
}
.form-control{
			border-radius: 0px !important;
		}
	   .abc .page-header:after, .page-header:before{
			/*background: white !important;*/
		}
	   .abc  .form-control {

    border-radius: 0px !important;
    background: #faffbd !important;
    color: black !important;
    border:1px solid black !important;

}
   .abc  .form-control::placeholder{
    color: black !important;
   }
.abc .btn-round {
    border-radius: 0px !important;
    font-weight: 900;
}
.abc a.nav-link.btn.btn-white.btn-round {
    background: #a9a9a9;
    color: white;
    font-weight: 900;
}
	</style></style>
</head>
<body class="theme-cyan authentication sidebar-collapse abc">

<!-- Navbar -->
<section>

<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">

    <div class="container">        

        <div class="navbar-translate n_logo">

            <!-- <a class="navbar-brand" href="javascript:void(0);" title="" target="_blank"><img style="width:100px;" src="images/logo.png" alt=""></a> -->

            <button class="navbar-toggler" type="button">

                <span class="navbar-toggler-bar bar1"></span>

                <span class="navbar-toggler-bar bar2"></span>

                <span class="navbar-toggler-bar bar3"></span>

            </button>

        </div>

      <div class="navbar-collapse">

            <ul class="navbar-nav">

                          

                <li class="nav-item">

                    <a class="nav-link btn btn-white btn-round" href="sign-up.php">SIGN UP</a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- End Navbar -->

<div class="page-header l-login" >

    <div class="page-header-image" style="background-image: url('bg-01.jpg');" ></div>

    <div class="container">


        <div class="col-md-12 content-center go">
         <div class="row">
            <div class="col-md-12">
             <div class="Food-delivery">
             <p>Learn Programming</p>
            </div>
             </div>
        </div>

        <!--<center><img src="images/logo.jpg" style="width:300px;"></center>-->
        <!-- --- -->
            <div class="card-plain go">
				
                <form id="login-form" name="login_form" role="form" style="display: block;" method="post" autocomplete="off">
                    <div class="header">
                        <div class="logo-container">
                            <img src="images/logo.svg" alt="">
                        </div> 
                        <h5>Log in</h5>
						<div class="alert alert-danger" role="alert" id="error" style="display: none;">...</div>
                    </div>
					
                    <div class="content">                                                
                        <div class="form-group"> 
                            <input type="email" class="form-control  input-group" placeholder="Enter Email"  name="username" id="username"  value="" autocomplete="off"  required>
                        </div> 
						<div class="form-group"> 
                            <input type="password" placeholder="Password" class="form-control input-group input-lg" name="password" id="password" autocomplete="off" required>
                        </div>    
                    </div>
                    <div class="footer text-center">
                       
							<button type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-primary btn-round btn-lg btn-blocky">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Log In
							</button>
                      <h5><a class="link" href="sign-up.php" style="color:#000000;">If not Registered? Please login here..</a></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
</div>

<!-- Jquery Core Js -->

<script>
$(document).ready(function(){
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			
			username: {
				required: true,
				email: true ,
			},
			password: {
				required: true,
			},
		},
		
		
		submitHandler: submitForm	
	});	


	});

function submitForm() {		
		var data = $("#login-form").serialize();
		$.ajax({				
			type : 'POST',
			url  : 'response.php?action=login',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success : function(response){			
				if($.trim(response) === "1"){
					console.log('dddd');									
					$("#login-submit").html('Signing In ...');
					setTimeout(' window.location.href = "my_program.php"; ',2000);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html(response).show();
					});
				}
			}
		});
		return false;
	}	
</script>
<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
</script>
</body>
</html>