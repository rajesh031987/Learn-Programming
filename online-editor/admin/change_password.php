<?php

include('include.php');



 $title="Admin Profile"; 

 include('header.php'); 



 ?>

	

<?php



function genrate_uid($str){

	return strtoupper(uniqid($str));

}



function generate_pwd($length = 8) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@-~%!+()*&^%$#';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

    return $randomString;

}





?>

<?php

if(isset($_POST['update'])){

		@extract($_POST);	

$insert = @mysql_query("update tbl_coach set 

					coach_fname = '".$cfname."',

					coach_lname = '".$clname."',

					coach_email = '".$cemail."',

					coach_contactnumber = '".$ccontact."',

					coach_alternate_contact = '".$ccontacta."',

					coach_address = '".$caddress."',

					coach_country = '".$ccountry."',

				

					where id = '".$id."'

				");	

		$_SESSION['message']='Updated successfully';

		$redirect ='manage-coach.php';

		$main->redirect($redirect);

		exit();





	}

	



		

	



?>



 <style>

  img.loadingx{

 position:absolute;

 width:32px;

 top:50%;

 left:50%;

 margin-left:-16px;

 margin-top:-16px;

 display:none;

 z-index:999;

}

.loader {

	font-size: 15px!important;

    color: #caef8e;

	margin-left: 5px!important;

}

span.fileUpload input[type=file] {

    opacity: 0;

    cursor: pointer;

    position: absolute;

    top: 0;

    left: 0;

    width: 100%;

    height: 33px;

}

input[type=file] {

    display: block;

}



#profileIMG img{

	height:140px;

	margin:0px auto;

}



.panel-default > .panel-heading {

    background: #4f2d46;

    color: #fff ;

    font-size: 18px;

}

.panel-heading {

    padding: 10px 15px;

    border-bottom: 1px solid transparent;

    border-top-left-radius: 3px;

    border-top-right-radius: 3px;

}



.profilePage ul li {

    list-style: none;

    margin: 5px auto;

    cursor: pointer;

    padding: 10px 0px;

    background: 0;

}



.profilePage ul li a {

    color: black;

    text-decoration: none;

    padding: 0px 10px;

    display: block;

    font-size: 14px;

}



.profilePage ul li a i {

    margin-right: 5px;

}



.profilePage ul .active {

    background: #4f2d46;

    color:white;

}



.profilePage ul .active a {

    color:white;

}



.profilePage ul li:hover {

    list-style: none;

    color: white;

    margin: 5px auto;

    padding: 10px 2px;

    background: #88C425;

}



.profilePage .update{

	background:#4f2d46;

	padding:10px 15px;

}



.profilePage .mySeclectArea{

    border: 1px solid;

}



.profilePage  #PanelHadding{

background:#8A638C;

color:white;

	

	}

	

.profile .btn-primary {

    color: #fff;

    background-color: #4f2d46;

    border-color: #4f2d46;

}

	

  </style>

	        

        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header">Change password </h1>

                </div>



                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">  

                <div class="col-lg-12">

					 <?php if($_SESSION['message']!=''){?>

			<div class="alert alert-info alert-dismissable">

                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>

                                 <?=$_SESSION['message'];?> <a class="alert-link" href="#"></a>.

                            </div>

							  <?php 

							  unset($_SESSION['message']);

							  } ?>



                    <div class="panel panel-default">

                        

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-lg-12">

							

							        <div class="col-lg-12">

									<?php

								$query = mysqli_query($conn,"select * from admin where admin_id = '".$_SESSION['admin_id']."'");

	

	                         $data = mysqli_fetch_array($query);

	

	@extract($data);

	?>

   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" id="loginForm2">

                                    <div class="form-group">

			<label>User Name</label>

				

					<input class="form-control" name="username" id="username" value="<?=$username;?>" />

				

			</div>

						<div class="form-group">

			<label>Password</label>

				

					<input class="form-control" name="password" id="password" value="" />

				

			</div>



	

		

		<input type="hidden" name="id" value="<?=$_SESSION['id'];?>">

		<input type="button" class="btn btn-danger update" id="loginButton1" data-waiting="Please wait..." name="update" value="Save Changes" />   

		<div id="alertForgot"></div>    

		</form>

                                </div>

                                <!-- /.col-lg-6 (nested) -->

                                

                                <!-- /.col-lg-6 (nested) -->

                            </div>

                            <!-- /.row (nested) -->

                        </div>

                        <!-- /.panel-body -->

                    </div>

                    <!-- /.panel -->

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->

<?php include('footer.php'); ?>



<script>



  $(document).ready(function(){       



   var scroll_start = 0;



   var startchange = $('#FirstSection');



   var offset = startchange.offset();



    if (startchange.length){



   $(document).scroll(function() { 



      scroll_start = $(this).scrollTop();



      if(scroll_start > offset.top) {

	 $("#mynav").css({background:"#4f2d46"});



       } else {



          $("#mynav").css({background:""});



		



       }



   });



    }

	

	 var data = {};

	   var redirect = '<?php echo $_GET['redirect']?>';	

		  var default_redirect = '<?php echo $config['site_url']?>choose-plan.php';	

  $('#submitdata').on('click', function(e) {									   

	  e.preventDefault();											   

	  var ele = $(this);

	  var originaltext = ele.val();

      resetErrors();

      var url = 'submit_child.php';

      $.each($('form#childform input, form#childform select, form#childform textarea'), function(i, v) {

          if (v.type !== 'submit') {

              data[v.name] = v.value;

          }

      }); //end each

      $.ajax({

          dataType: 'json',

          type: 'POST',

          url: url,

          data: data,

		  beforeSend: function(){

			  ele.val(ele.data('waiting')); 	  

			  ele.attr('disabled', true);

		  },

          success: function(resp) {

			  ele.val(originaltext);

              if (resp.action == 'true') {					  

					ele.val(originaltext);

					if(redirect != ''){

						window.top.location.href = redirect;

					}

					else {

						window.top.location.href = default_redirect;

					}	

                  	return false;

              } else if(resp.action == 'false'){

			  		ele.val(originaltext);

					$('#alertRegistration').html('<div class="message_">'+resp.msg+'</div>').fadeIn(500);

                  	return false;

			  } else {

                  $.each(resp, function(i, v) {

	        console.log(i + " => " + v); // view in console for error messages

                      var msg = '<label class="error" for="'+i+'">'+v+'</label>';

                      $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);

                  });

                  var keys = Object.keys(resp);

                  $('input[name="'+keys[0]+'"]').focus();

              }

              return false;

          },

          error: function() {

              console.log('there was a problem checking the fields');

          },

		  

		  complete: function(){

				ele.attr('disabled', false);  

		  }

      });

      return false;

  });	

   var redirect1 = '<?php echo $_GET['redirect']?>';	

  var default_redirect1 = '<?php echo $config['site_url']?>dashboard.php';	

  $('#loginButton').on('click', function(e) {									   

	  e.preventDefault();											   

	  var ele = $(this);

	  var originaltext = ele.val();

      resetErrors();

      var url = 'changepassword-handler.php';

      $.each($('form#loginForm input, form#loginForm select, form#loginForm textarea'), function(i, v) {

          if (v.type !== 'submit') {

              data[v.name] = v.value;

          }

      }); //end each

      $.ajax({

          dataType: 'json',

          type: 'POST',

          url: url,

          data: data,

		  beforeSend: function(){

			  ele.val(ele.data('waiting')); 	  

			  ele.attr('disabled', true);

		  },

          success: function(resp) {

			  ele.val(originaltext);

              if (resp.action == 'true') {					  

					ele.val(originaltext);

					if(redirect1 != ''){

						window.top.location.href = redirect1;

					}

					else {

						window.top.location.href = default_redirect1;

					}	

                  	return false;

              } else if(resp.action == 'false'){

			  		ele.val(originaltext);

					$('#alertLogin').html('<div class="message_">'+resp.msg+'</div>').fadeIn(500);

                  	return false;

			  } else {

                  $.each(resp, function(i, v) {

	        console.log(i + " => " + v); // view in console for error messages

                      var msg = '<label class="error" for="'+i+'">'+v+'</label>';

                      $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);

                  });

                  var keys = Object.keys(resp);

                  $('input[name="'+keys[0]+'"]').focus();

              }

              return false;

          },

          error: function() {

              console.log('there was a problem checking the fields');

          },

		  

		  complete: function(){

				ele.attr('disabled', false);  

		  }

      });

      return false;

  });   

  	  $('#loginButton1').on('click', function(e) {									   

	  e.preventDefault();											   

	  var ele = $(this);

	  var originaltext = ele.val();

      resetErrors();

      var url = 'changepasswordhandler.php';

      $.each($('form#loginForm2 input, form#loginForm2 select, form#loginForm2 textarea'), function(i, v) {

          if (v.type !== 'submit') {

              data[v.name] = v.value;

          }

      }); //end each

      $.ajax({

          dataType: 'json',

          type: 'POST',

          url: url,

          data: data,

		  beforeSend: function(){

			  ele.val(ele.data('waiting')); 	  

			  ele.attr('disabled', true);

		  },

          success: function(resp) {

			  ele.val(originaltext);

           if (resp.action == 'true') {					  

					ele.val(originaltext);

					alert('Updated successfully');

					//window.location.href='yourclubs.php';

                  	return false;

              } else if(resp.action == 'false'){

			  		ele.val(originaltext);

					$('#alertForgot').html('<div class="message_">'+resp.msg+'</div>').fadeIn(500);

                  	return false;

			  } else {

                  $.each(resp, function(i, v) {

	               console.log(i + " => " + v); // view in console for error messages

                      var msg = '<label class="error" for="'+i+'">'+v+'</label>';

                      $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);

                  });

                  var keys = Object.keys(resp);

                  $('input[name="'+keys[0]+'"]').focus();

              }

              return false;

          },

          error: function() {

              console.log('there was a problem checking the fields');

          },

		  

		  complete: function(){

				ele.attr('disabled', false);  

		  }

      });

      return false;

  });  

  

   $('input[name=file]').change(function(){

		  var ele = $(this);

		  var ext = ele.val().split('.').pop().toLowerCase();

		  if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {

		   alert('invalid image!');

		   return false;

		  }

		  var file_data = $(this).prop("files")[0];

		  var form_data = new FormData();                  

		  form_data.append("file", file_data)              

		  form_data.append("user_id", '')                

		  $.ajax({

		   url: "profile-image-uploader.php",

		   //dataType: 'script',

		   cache: false,

		   contentType: false,

		   processData: false,

		   data: form_data,                        

		   type: 'post',

		   beforeSend: function(){

			$('.loadingx').fadeIn();

		   },

		   success: function(response){

			  

			$('.loadingx').fadeOut();

			$('#file-select').attr('src', response).fadeIn();

		   },

		  }) 

	 });

	 

	 

	 

	  	  $('#changepassword').on('click', function(e) {									   

	  e.preventDefault();											   

	  var ele = $(this);

	  var originaltext = ele.val();

      resetErrors();

      var url = 'changepasswordhandler.php';

      $.each($('form#changepassword11 input, form#changepassword11 select, form#changepassword11 textarea'), function(i, v) {

          if (v.type !== 'submit') {

              data[v.name] = v.value;

          }

      }); //end each

      $.ajax({

          dataType: 'json',

          type: 'POST',

          url: url,

          data: data,

		  beforeSend: function(){

			  ele.val(ele.data('waiting')); 	  

			  ele.attr('disabled', true);

		  },

          success: function(resp) {

			  ele.val(originaltext);

           if (resp.action == 'true') {					  

					ele.val(originaltext);

					alert('Password change successfully');

					//window.location.href='yourclubs.php';

                  	return false;

              } else if(resp.action == 'false'){

			  		ele.val(originaltext);

					$('#alertchangepassword').html('<div class="message_">'+resp.msg+'</div>').fadeIn(500);

                  	return false;

			  } else {

                  $.each(resp, function(i, v) {

	               console.log(i + " => " + v); // view in console for error messages

                      var msg = '<label class="error" for="'+i+'">'+v+'</label>';

                      $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);

                  });

                  var keys = Object.keys(resp);

                  $('input[name="'+keys[0]+'"]').focus();

              }

              return false;

          },

          error: function() {

              console.log('there was a problem checking the fields');

          },

		  

		  complete: function(){

				ele.attr('disabled', false);  

		  }

      });

      return false;

  }); 

	 

	 

	 

	 

	 

	 

	 

	 

	 

	 

	 

	 

	 

	 

  

});

function resetErrors() {



    $('form input, form select').removeClass('inputTxtError');



    $('label.error').remove();



}











$(document).ready(function() {

    $("#departing").datepicker();

    $("#returning").datepicker();

    $("#departing").click(function() {

    	var selected = $("#dropdown option:selected").text();

        var departing = $("#departing").val();

        var returning = $("#returning").val();

   

    });

});



	





	

</script>

