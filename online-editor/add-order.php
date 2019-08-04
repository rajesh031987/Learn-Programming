<?php include 'header.php'; ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Add Order
                <small>Welcome to Barcode</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Barcode</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                    <li class="breadcrumb-item active">Add Order</li>
                </ul>
            </div>
        </div>
    </div>    
    <div class="container-fluid">        
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2><strong>Add</strong> Order<small>Description text here...</small> </h2>
						<ul class="header-dropdown">                            
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
						<div class="alert alert-danger  col-md-4" role="alert" style="display:none;"></div>
						<div class="alert alert-success col-md-4" role="alert" style="display:none;"></div>
					</div>
					<div class="body">
					
						<h4	>Enter Valid Employee id to scan </h2>
						<form method="post" id="order_form">
						<div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="emp-id" class="form-control emp-id" id="emp-id" placeholder="Enter empoyee id">
									<span class="error empError" id="error"></span>
								</div>
                            </div>
                         
                        </div>
						<div id="scan-box" style="display:none;"> 
                        <div class="row clearfix" id="barcode">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="barcode[]" class="form-control barcode" placeholder="Scan Barcode">
								</div>
                            </div>
                         
                        </div>
                       
                        <div class="row clearfix">
                          
                            <div class="col-sm-12">
                                <button type="button" id="finished" class="btn btn-primary btn-round">FINISEHED ORDER</button>
                                <button type="button" class="btn btn-default btn-round btn-simple">CANCEL</button>
                            </div>
                        </div>
						</div>
						</form>
                    </div>
				</div>
			</div>
		</div>
    </div>
</section>
<?php include 'footer.php' ?>
<script>
/*var index = 1;
$('.barcode').on('keyup',function(e){
  var code = (e.keyCode ? e.keyCode : e.which);
  if (code == 13) {
    $('#barcode').append('<div class="col-sm-6"> <div class="form-group"><input type="text" class="form-control" placeholder="Scan Barcode"></div></div>');    
    //$('tr:last td:eq(0)').html(index);
     // $('tr:last td:eq(1)').html($(this).val());
   // $(this).focus().select();
    index++;
  }
});*/
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('#barcode'); //Input field wrapper
	var x = 1; //Initial field counter is 1
   
    
    //Once add button is clicked
//$('.barcode').on('keyup',function(e){
$(document).on('keyup', 'input.barcode', function (e) {
var code = (e.keyCode ? e.keyCode : e.which);
  if (code == 13) {
   // $(addButton).click(function(){
        //Check maximum number of input fields
        //if(x < maxField){ 
            x++; //Increment field counter
			 var fieldHTML = '<div class="col-sm-6"><div class="form-group"><input type="text" name="barcode[]" id="abc'+x+'" class="form-control barcode" value="" autofocus/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div></div>'; //New input field html 
			$(wrapper).append(fieldHTML); //Add field html
			//console.log(x);
			$('#abc'+x).focus();	
       // }
	}
	//$(wrapper).siblings('input').focus();
	
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$('.emp-id').on('keyup',function(e){
  var code = (e.keyCode ? e.keyCode : e.which);
  if (code == 13) {
	 //return false;
	 var empid = $('#emp-id').val(); 
	 var dataString = 'emp-id='+ empid;
	  $.ajax({
			type: "POST",
			url: "check-emp.php",
			data: dataString,
			cache: false,
			success: function(response){
					if(response == 1){
						$('#scan-box').css('display','block');
						$("#emp-id").attr('readonly','readonly');
					}
					if(response == 0){
						$(".empError").html('Please enter valid Employee Id.'); 
						$(".empError").fadeOut(5000); 
					}						
            
			
            //alert(response);
        }

    });
	
  }
  });
  
      $('#finished').on('click', function (event) {
			event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'submit-order.php',
            data: $('#order_form').serialize(),
            success: function (response) {
				if(response == 1)
			    {
					$(".alert-success").css('display','block');
				    $(".alert-success").html('Order Submitted Successfully!'); 
					$(".alert-success").fadeOut(5000); 
					setTimeout(function() {
					 window.location.reload();
				  }, 5000);
					
			    }
				if(response == 0)
			    {
					$(".alert-danger").css('display','block');
					$(".alert-danger").html('Please try again!'); 
					$(".alert-danger").fadeOut(5000); 
					setTimeout(function() {
					 window.location.reload();
				  }, 5000);
			    }
            }
          });

        });
//$('#order_form').on('keypress', function(e) {
   // return e.which !== 13;
//});

</script>