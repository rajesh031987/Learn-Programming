<?php

include('include.php');

$title="Manage slider";

include('header.php');





?>

 



<?php

if(isset($_POST['doaction']) && $_POST['doaction'] == 'Delete'){



$size = sizeof($_POST['users_lists']);



if($size < 1){



$_SESSION['message']='Error! Plese select one product at least to delete';



}else{



$count = 0;







foreach($_POST['users_lists'] as $del){



$Id= $del;



 $main->id = $Id;



//$fetch = $main->get_single_record(tbl_retailer_type,"where id='$del'");





$where = " where id = $Id ";

if($main->delete_single_record(tbl_slider,$where)){



$count++;



}



}

$_SESSION['message']=$count.' Records(s) deleted successfully.</div>';

		$redirect ="manage-slider.php";

		$main->redirect($redirect);

		exit();

}







}

?>

 <script src="function.js"></script>

 

    <link href="paging.css" rel="stylesheet">

        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header">Manage slider</h1>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">					

                        <div class="panel-heading">

						 <ul class="list-inline text-right">

						  </ul>

						

                        </div>

                        <!-- /.panel-heading -->

                        <div class="panel-body">

						<?php if($_SESSION['message']!=''){?>

							<div class="alert alert-info alert-dismissable">

                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>

                                 <?=$_SESSION['message'];?> <a class="alert-link" href="#"></a>.

                            </div>

						 <?php 

							 unset($_SESSION['message']);

						 } ?>

                            <div class="dataTable_wrapper">

							<form name="product_form" id="product_form" action="manage-slider.php" method="post">



                                <input type="hidden" value="" name="doaction" id="doaction" />

                                <table class="table table-striped table-bordered table-hover" id="example">

                                    <thead>

                                        <tr>

										   <th>Slider</th>

											
											 

                                            <th>Action</th>

											 <th><input name="selectall" id="selectall" type="checkbox" value="" /></th>



                                        </tr>

                                    </thead>

                                    <tbody>

									<?php   

                                    $q = mysqli_query($conn,"select * from tbl_slider");

									 $total_num =  mysqli_num_rows($q);

									  if($total_num >0){



  //$sn =1;

 $rows1 = $main->get_list_record(tbl_slider,"where 1");

  foreach($rows1 as $rows){

									

									?>

                                        <tr class="odd gradeX">

							 

                                            <td> 

											<img src="../slider/<?=$rows['slider'];?>" height="50" width="50"></img>

                                            </td>
                                             


                                         

                                            <td class="center">

											<a href="edit-slider.php?id=<?php echo $rows['id']; ?>">

											

<span class="glyphicon glyphicon-pencil"></span>

</a>

											</td>

                                       

										    <td><input name="users_lists[]" id="users_lists_<?=$rows['id']?>" type="checkbox" value="<?=$rows['id']?>"  class="checkboxes"/></td>

										</tr>

                                <?php 

                                     } 



  	} else{ ?>

	

<td colspan="5">No record found</td>

                                        

                        <?php } ?>                

                                    

                                    </tbody>

									

                                </table>

							

								 <?php



                



                if($totrec>$perpage)



                { 



                  include("paging.php");



                }



              ?>

	</form>

                            </div>

							<ul class="list-inline pull-right">

						 		<?php /*

							<li><input class="btn btn-info" type="submit" value="Active" onclick="active_category(this.value);" name="active"></li>

							<li><input class="btn btn-warning" type="submit" value="Inactive" onclick="inactive_category(this.value);"></li>

							*/ ?>

							<li><input class="btn btn-danger" type="submit" value="Delete" onclick="delete_category(this.value);"></li>

							</ul>

                            <!-- /.table-responsive -->

                            

                        </div>

                        <!-- /.panel-body -->

                    </div>

                    <!-- /.panel -->

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            

            <!-- /.row -->

            

            <!-- /.row -->

            

            <!-- /.row -->

        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->



   <?php include('footer.php'); ?>

   <script src="js/jquery.dataTables.min.js"></script>

<script src="js/dataTables.bootstrap.min.js"></script>

	<script>

$(document).ready(function() {

    $('#example').DataTable( {

        "paging":   true,

        "ordering": false,

        "info":     false

    } );

} );

</script>

</body>



</html>

