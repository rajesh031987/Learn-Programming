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
                    <h1 class="page-header">Edit Country</h1>
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
						 
					<li><a href="country-list.php"><div class="btn btn-success">Manage Country</div></a></li>
						 </ul>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								
							
							 <form role="form" action="" method="post">
							
									
                                       <?php
									   $query=mysql_query("select * from  countries where id='".$_GET['id']."'");
										$fetch=mysql_fetch_array($query);
                                       
                                       
                                       
                                       ?>
                                 
                                        
                                        

                                        
                                        
                                        
                                       
                                        <div class="form-group">
                                           
                                         
                                            <label>Country:</label>
                                            
                                           
                                           <input type="text" name="name" id="name" class="form-control" value="<?=$fetch['name'];?>"/>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                         
                                         
                                        
                                        
                                         
                                         
                                        

                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="uid"/>
                                        <input type="submit" class="btn btn-danger add-button" name="update" value="Save">
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

