<?php
include('include.php');
?>
<?php $title="Admin Profile"; ?>
<?php include('header.php'); ?>
<?php
$fetch=$main->getadmindetails($_SESSION['coach_id']);
@extract($fetch);






if(isset($_POST['update']) && $_POST['update']=='Save'){


$update =  mysql_query("update tbl_coach set username='".$_POST['username']."',email='".$_POST['email']."', password='".$_POST['password']."' where admin_id='".$_SESSION['Admin_id']."'") or die(mysql_error());

$_SESSION['message']="Updated successfully...";

	$redirect ='admin_profile.php';
		$main->redirect($redirect);
exit();
}



$result = mysql_query("select * from tbl_coarch where id='".$_SESSION['coach_id']."'");

if(mysql_num_rows($result)>0){

$admin = mysql_fetch_array($result);

}else{

$_SESSION['message']='Error! Something is not right here.';
	$redirect ='admin_profile.php';
		$main->redirect($redirect);
exit();
}



?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Account Info</h1>
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
                        <div class="panel-heading">
                         
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input class="form-control" name="username" id="username" value="<?php echo $username; ?>">
                                           
                                        </div>
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                                           
                                        </div>
                                       
                                             <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Enter text" name="password" id="password" value="<?php echo $password; ?>">
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <input type="submit" class="btn btn-default" name="update" value="Save">
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

   <?php include('footer.php'); ?>

</body>

</html>

