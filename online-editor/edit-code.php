<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>			
<script type="text/javascript" src="js/compile.js"></script>			
<script type="text/javascript" src="js/tab.js"></script>			
<script type="text/javascript" src="js/jquery.form.js"></script>			
<!--<script type="text/javascript">				
$(document).ready(function() { 					
$('#form2').ajaxForm(function(msg) { 						
$('#output2').html(msg); 					
}); 				
});			
</script>-->
<?php $id= $_GET['id'];
if($id != ''){
    mysqli_query($conn,"UPDATE programs SET views = views + 1 WHERE id = '$id' ");
}
$programs= mysqli_query($conn,"select * from programs where id='$id'");
$rows= mysqli_fetch_array($programs);
if($_GET['language'] == 'python2.7'){
	$language = 'Python Editor';
}

if($_GET['language'] == 'c'){
	$language = 'C Editor';
}

?>
<section class="content profile-page">
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2><?php echo $language; ?>                 <small>Welcome to programming world</small>                </h2>
         </div>
         
      </div>
   </div>
   <div class="container-fluid">
   <div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card">
        <div class="header">
						<h2><strong>Run Your Code Online</strong></h2>
						<ul class="header-dropdown">
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
						
					</div>
					<div class="body">
                       <div class="alert alert-danger  col-md-4" role="alert" style="display:none;"></div>
						<div class="alert alert-success col-md-4" role="alert" style="display:none;"></div>
						<form action="compile.php" method="post" id="form">
						 <div class="row clearfix">
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Run" id="submit">
							    <button  type="button" name="save_continue" id="save_continue" class="btn btn-primary">Update</button>
							   </div>
							</div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                                    <input name="program_name" readonly class="form-control" id="program_name" placeholder="Enter program name.." value="<?php echo htmlspecialchars($rows['name'])?>" required>							<span id="errorCode" class="error"></span>
							   </div>
                            </div>
							 <div class="col-md-12">
                                <div class="form-group">
                                   <textarea name="code" style="border: 1px solid;" class="form-control no-resize" rows=15 cols=100 onkeydown=insertTab(this,event) id="code" placeholder="Enter Your code here.." required><?php echo $rows['code']?></textarea><br/>							<span id="errorCode" class="error"></span>
							    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                     <textarea name="output" class="form-control no-resize" id="output" onkeyup="new do_resize(this);" cols="50" rows="15" placeholder="Output.." readonly="yes"><?php echo strip_tags($rows['output'])?></textarea><br/>							<span id="errorCode" class="error"></span>
								<input type="hidden" id="language"  name="language" value="<?php echo $_GET['language'];?>">
								</div>
                            </div>
                        </div>
                        <div class="row clearfix">
                             <!--<div class="col-md-6">
                                <div class="form-group">
                                    <select name="language" id="language" class="form-control" required>
									<option value="">Select Language</option>
									 <option value="c">C</option><option value="cpp">C++</option><option value="java">Java</option>									
									 <option value="python2.7">Python</option>
								    <option value="python3.2">Python3</option>
								  </select>
								</div>
                            </div>
							</div>
							 <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                   <textarea name="code" style="border: 1px solid;" class="form-control no-resize" rows=15 cols=100 onkeydown=insertTab(this,event) id="code" placeholder="Enter Your code here.." required><?php echo $rows['code']?></textarea><br/>							<span id="errorCode" class="error"></span>
							    </div>
                            </div>
							
                            <!--<div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="input" style="border: 1px solid;" class="form-control no-resize" rows=7 cols=100 id="input" placeholder="Please provide Input here.."><?php echo $rows['input']?></textarea>	
							  </div>
                            </div>-->
							</div>
							
							   
							   
							</form>
                        </div>
                    
                    </div>
					
	  </div>
	  </div>
	    
</section>
<?php include 'footer.php';?>
<script type="text/javascript">
$(document).ready(function(){
 $('#save_continue').on('click', function (event) {
			event.preventDefault();// using this page stop being refreshing 
var program_name= $('#program_name').val();
var output= $('#output').val();
if(program_name == '')
{
	alert('Program name is required!');
	return false;
}
if(output == '')
{
	alert('Please run program to save!');
	return false;
}
          $.ajax({
            type: 'POST',
            url: 'edit-program.php',
            data: $('#form').serialize(),
            success: function (response) {
				if(response == 1)
			    {
					$(".alert-success").css('display','block');
				    $(".alert-success").html('Program Submitted Successfully!'); 
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
					//setTimeout(function() {
					// window.location.reload();
				  //}, 5000);
			    }
				
				if(response == 2)
			    {
					$(".alert-danger").css('display','block');
					$(".alert-danger").html('Please update code in code area!'); 
					$(".alert-danger").fadeOut(5000); 
					//setTimeout(function() {
					 //window.location.reload();
				  //}, 5000);
			    }
            }
          });

        });
		});
		</script>
		<script>
		function do_resize(textbox) {

 var maxrows=5; 
  var txt=textbox.value;
  var cols=textbox.cols;

 var arraytxt=txt.split('\n');
  var rows=arraytxt.length; 

 for (i=0;i<arraytxt.length;i++) 
  rows+=parseInt(arraytxt[i].length/cols);

 if (rows>maxrows) textbox.rows=maxrows;
  else textbox.rows=rows;
 }
		</script>