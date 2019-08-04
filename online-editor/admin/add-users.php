<?php
include('include.php');

 $title="Service Category"; 
 include('header.php'); ?>
<?php


if( ($_SESSION['Admin']=='') || ($_SESSION['Admin_login']=='')){
	
echo "<script>document.location.href='login.php'</script>";	

}

?>
<?php
if(isset($_POST['update'])){
	echo '<pre style="padding-left:50px;">';
	print_r($_POST);
	echo '</pre>';
	
		echo $id = $_POST['uid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$username = $_POST['uname'];
		$phone = $_POST['phone'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		
	//$sql = mysql_query("UPDATE tbl_register SET user_fname='$fname', user_lname='$lname', user_email='$email', user_name='$username', 
	//user_phone='$phone', user_mob='$mobile', user_gender='$gender' WHERE id='$id'");
	
	
	
	}


		
	

?>
        
        <link href="css/boostrap-datepicker.css" rel="stylesheet" type="text/css" />
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap-datepicker.js"></script>
        
		<script>

	$(document).ready(function(){

		

		$('.datepicker').datepicker({ format: 'yyyy-mm-dd', });

	});

</script>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Edit </h1>
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
                        <ul class="list-inline text-right">
						 
					<li><a href="manage-users.php"><div class="btn btn-success">Manage Users</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<?php if($_GET['action']=='edit'){ ?>
                                    <form role="form" action="add-users.php?action=update&id=<?php echo $_GET[id] ?>" method="post">
									<?php }  else{
									
							?>
							 <form role="form" action="" method="post">
							 <?php } ?>		
									
                                       <?php
									   $query=mysql_query("select * from tbl_register where id='".$_GET['id']."'");
										$fetch=mysql_fetch_array($query);
                                       
                                       
                                       
                                       ?>
                                        
										<div class="form-group">
                                            <label>First Name:</label>
                                            <!--<select class="form-control" name="parent" id="parent" >
											<option value="">Select Parents</option>
                                           </select>-->
										   
			                                 <input class="form-control" name="fname" id="fname" value="<?php echo $fetch['user_fname']; ?>">
		                                    
                                        </div>
                                        
										<div class="form-group">
                                            <label>Last Name:</label>
                                             <input class="form-control" name="lname" id="lname" value="<?php echo $fetch['user_lname']; ?>">
                                           
                                        </div>
                                        
                                        
                                       <div class="form-group">
                                         
                                            <label>Email:</label>
                                             <input class="form-control" name="email" id="email" value="<?php echo $fetch['user_email']; ?>">
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                           
                                         
                                            <label>Username:</label>
                                             <input class="form-control" name="uname" id="uname" value="<?php echo $fetch['user_name']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>Phone:</label>
                                             <input class="form-control" name="phone" id="phone" value="<?php echo $fetch['user_phone']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>Mobile:</label>
                                             <input class="form-control" name="mobile" id="mobile" value="<?php echo $fetch['user_mob']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>Gender:</label>
                                            
                                             <select id="gender" name="gender" class="form-control">
                                            <option value="Male" <?php if($fetch['user_gender']=='Male'){ echo "selected";}?>>Male</option>
                                             <option value="Female" <?php if($fetch['user_gender']=='Female'){ echo "selected";}?>>Female</option>
                                             
                                             </select>
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>Date of Birth:</label>
                                            
                                             <input type="text" class="form-control datepicker" id="dob" name="dob" value="<?php echo $fetch['user_dob']; ?>" placeholder="">
                                           
                                        </div>
                                        <div id="wrapper" ng-app="myApp">
 
                                      <input type="text" ng-model="datePicker" datepicker />
                                    </div>
                                        
                                        <div class="form-group">
                                           
                                         
                                            <label>Skype ID:</label>
                                            
                                             <input class="form-control" name="skype" id="skype" value="<?php echo $fetch['user_skype']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>Website:</label>
                                            
                                             <input class="form-control" name="website" id="website" value="<?php echo $fetch['user_website']; ?>">
                                           
                                        </div>
                                         <div class="form-group">
                                           
                                         
                                            <label>Website:</label>
                                            
                                             <input class="form-control" name="website" id="website" value="<?php echo $fetch['user_website']; ?>">
                                           
                                        </div>
                                         <div class="form-group">
                                           
                                         
                                            <label>Country:</label>
                                            <?php $query1=mysql_query("select * from countries where id='".$fetch['user_country']."'");
											$fetch1=mysql_fetch_array($query1); ?>
                                            
                                             <input class="form-control" name="country" id="country" value="<?php echo $fetch1['name']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>State:</label>
                                            <?php $query2=mysql_query("select * from states where id='".$fetch['user_state']."'");
											$fetch2=mysql_fetch_array($query2); ?>
                                            
                                             <input class="form-control" name="state" id="state" value="<?php echo $fetch2['name']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                         
                                            <label>City:</label>
                                            <?php $query3=mysql_query("select * from cities where id='".$fetch['user_city']."'");
											$fetch3=mysql_fetch_array($query3); ?>
                                            
                                             <input class="form-control" name="city" id="city" value="<?php echo $fetch3['name']; ?>">
                                           
                                        </div>
                                         <div class="form-group">
                                           
                                         
                                            <label>Address:</label>
                                          
                                            
                                              <input class="form-control" name="address" id="address" value="<?php echo $fetch['user_address']; ?>">
                                           
                                        </div>
                                         <div class="form-group">
                                           
                                         
                                            <label>About You:</label>
                                          
                                            
                                              <input class="form-control" name="about" id="about" value="<?php echo $fetch['user_about']; ?>">
                                           
                                        </div>
                                        

                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="uid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="
										<?php if($_GET['action']!=''){ echo "Update"; } else{ echo "Add"; }?>">
                                      <!--  <button type="reset" class="btn btn-default">Reset Button</button>-->
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
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <style>

	</style>
<script>
var myApp = angular.module('myApp', []);

myApp.directive("datepicker", function () {
  return {
    restrict: "A",
    require: "ngModel",
    link: function (scope, elem, attrs, ngModelCtrl) {
      var updateModel = function (dateText) {
        scope.$apply(function () {
          ngModelCtrl.$setViewValue(dateText);
        });
      };
      var options = {
        dateFormat: "dd/mm/yy",
        onSelect: function (dateText) {
          updateModel(dateText);
        }
      };
      elem.datepicker(options);
    }
  }
});
</script>
</body>

</html>

