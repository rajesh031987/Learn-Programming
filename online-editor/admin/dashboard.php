<?php
include('include.php');

 ?>

<?php
 include('header.php');
$active_users = $main->get_count_record(tbl_student,"where status='Active'");
$blocked_users = $main->get_count_record(tbl_student,"where status='Blocked'");
$deleted_users = $main->get_count_record(tbl_student,"where status='Trash'");
?>



        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header">Dashboard</h1>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->
		

            <div class="row">

							<div class="col-lg-4 col-md-4">

                    <div class="panel panel-red">
   <a href="manage-student.php?status=Active&Search=Search">
                        <div class="panel-heading">

                            <div class="row">

                                <div class="col-xs-3">

                                    <i class="fa fa-user fa-5x"></i>

                                </div>

                                <div class="col-xs-9 text-right">

                                    <div class="huge"><?php echo $active_users;?></div>

                                    <div>Active Students</div>

                                </div>

                            </div>

                        </div>

                     

                            <div class="panel-footer">

                                <span class="pull-left">View Details</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                        </a>

                    </div>

                </div>
				
					
				
				
						<div class="col-lg-4 col-md-4">

                    <div class="panel panel-red">
   <a href="manage-student.php?status=Blocked&Search=Search">
                        <div class="panel-heading">

                            <div class="row">

                                <div class="col-xs-3">

                                    <i class="fa fa-user fa-5x"></i>

                                </div>

                                <div class="col-xs-9 text-right">

                                    <div class="huge"><?php echo $blocked_users;?></div>

                                    <div>Blocked Student</div>

                                </div>

                            </div>

                        </div>

                     

                            <div class="panel-footer">

                                <span class="pull-left">View Details</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                        </a>

                    </div>

                </div>
                
                
                
                	<div class="col-lg-4 col-md-4">

                    <div class="panel panel-red">
   <a href="manage-student.php?status=Trash&Search=Search">
                        <div class="panel-heading">

                            <div class="row">

                                <div class="col-xs-3">

                                    <i class="fa fa-user fa-5x"></i>

                                </div>

                                <div class="col-xs-9 text-right">

                                    <div class="huge"><?php echo $deleted_users;?></div>

                                    <div>Deleted Students</div>

                                </div>

                            </div>

                        </div>

                     

                            <div class="panel-footer">

                                <span class="pull-left">View Details</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                        </a>

                    </div>

                </div>
				
			
            </div>

			

			

			

			

			

			

			

			

			

			

			

			

			

			

		

		

		

		

		

		

	<!--	

	Services-->	

		

		

		

		

		<?php // include('service.php'); ?>

		

		

		























































	

		



			

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-8">

                    

                    <!-- /.panel -->

                    

                    <!-- /.panel -->

                    

                    <!-- /.panel -->

                </div>

                <!-- /.col-lg-8 -->

                <div class="col-lg-4">

				

				</div>

                <!-- /.col-lg-4 -->

            </div>

            <!-- /.row -->

        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->

<?php // include('footer.php'); ?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="dist/js/sb-admin-2.js"></script>
</body>

</html>
