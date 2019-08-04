<?php
include('include.php');
$tbl = 'tbl_images';
$id = $_POST['id'];
$did = $_POST['d_id'];

 $fetchimg = $main->get_single_record($tbl," where id = $id ");	
 $main_img = $fetchimg['image'];

 //$path1 = $_SERVER["DOCUMENT_ROOT"]."/news/$main_img";

 unlink("../advertise_image/".$main_img);

 $wherecnd = " where main_image='$id'";
 $cnt  = $main->get_count_record(tbl_advertise,$wherecnd);
 if($cnt > 0){
	$data11 = " main_image = ' ' ";
$where111 = " where id = $did ";
$main->update_data($data11,tbl_advertise,$where111);
   
	 
 }
 mysqli_query($conn,"delete from tbl_images where id='$id'");
 
  
//$main->delete_single_record($tbl,$id);
echo "1";
?>