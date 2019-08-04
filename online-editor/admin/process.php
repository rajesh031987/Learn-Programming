<?php
include('include.php');

@extract($_POST);
$__files = array();
foreach($_FILES['__files']['name'] as $key=>$val){
$upload_dir = "../news/";
$upload_file = $upload_dir.$_FILES['__files']['name'][$key];
$filename = $_FILES['__files']['name'][$key];
if(move_uploaded_file($_FILES['__files']['tmp_name'][$key],$upload_file)){
	$data = "	news_id = '$id',image = '$filename' ";
     $insert = $main->insert_data($data,tbl_images);

}
}
echo $filename;		
?>
