<?php $title="Service Category"; ?>
<?php include('header.php'); ?>
<?php
$fetch=$main->getadmindetails($_SESSION['Admin_id']);
@extract($fetch);

if( ($_SESSION['Admin']=='') || ($_SESSION['Admin_login']=='')){

echo "<script>document.location.href='login.php'</script>";

}





if(isset($_POST['update']) && $_POST['update']=='Save'){


}

include_once 'ckeditor/ckeditor.php';
 require_once 'ckeditor/ckfinder/ckfinder.php';

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Service Category </h1>
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
                           Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" name="category" id="category" value="<?php echo $username; ?>">
                                           
                                        </div>
										
                                       <div class="form-group">
                                            <label>Description</label>
                                          <?
				$ckeditor = new CKEditor( ) ;
				$ckeditor->basePath	= 'ckeditor/' ;
				CKFinder::SetupCKEditor($ckeditor,'ckeditor/ckfinder/' ) ; 
				$ckeditor->editor('detail',stripcslashes($fetch['descp']), '100%');
				?>
                                           
                                        </div>
                                             
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <input type="submit" class="btn btn-danger" name="update" value="Add">
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

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

