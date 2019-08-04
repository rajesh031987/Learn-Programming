<?php
include 'db_cls_connect.php';
session_start();
$query = "UPDATE tbl_student SET last_logout=now() WHERE id='$_SESSION[userid]'"; 
$result = mysqli_query($conn,$query);
session_unset();
session_destroy();
header("location:index.php");

exit();
?>