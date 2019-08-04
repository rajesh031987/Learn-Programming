<?php
include('include.php');
$tbl = 'tbl_advertise';
$id = $_POST['id'];
$did = $_POST['d_id'];
$data= "main_image='0'";
$where1 = "where id = '$did'";
$main->update_data($data,$tbl,$where1);

$data = " main_image = '$id' ";
$where = " where id = $did";
$main->update_data($data,$tbl,$where);
  
//$main->delete_single_record($tbl,$id);
echo "1";
?>