<?php 
include 'db_cls_connect.php';
include 'functions.php';
include_once("classes/functions_common.php");
$main = new main();
$id = $_POST['id'];
$result = mysqli_query($conn,"select * from programs where id='$id'");
$row = mysqli_fetch_array($result);
$code = $row['code'];
$name = $row['name'];
$output = $row['output'];

 echo ' <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 label label-primary">Name:</label>
            <div class="col-sm-10">'.$name.'
               
            </div>
        </div>
 
		<div class="form-group row">
            <label for="inputEmail" class="col-sm-2 label label-primary">Code:</label>
            <div class="col-sm-10">'.$code.'
               
            </div>
        </div>
        
		<div class="form-group row">
            <label for="inputPassword" class="col-sm-2 label label-primary">Output:</label>
            <div class="col-sm-10">
               '.$output.'
            </div>
        </div>';

