<?php session_start();

if($_SESSION['userid'] == ''){
header("location:index.php");
exit();

}
if($_SESSION['userid'] != ''){
include 'db_cls_connect.php';
			/*$query = "SELECT * FROM tbl_employee WHERE id='$_SESSION[userid]'";
			$resultset = mysqli_query($conn, $query);
			$employee = mysqli_fetch_assoc($resultset);*/
			$query6 = "SELECT * FROM tbl_student WHERE id='$_SESSION[userid]'";
			$resultset6 = mysqli_query($conn, $query6);
			$student = mysqli_fetch_assoc($resultset6);
			
			// for country
			$query1 = "SELECT * FROM countries WHERE id='$student[country]'";
			$resultset1 = mysqli_query($conn, $query1);
			$countries = mysqli_fetch_assoc($resultset1);
			// for state
			$query2 = "SELECT * FROM states WHERE id='$student[state]'";
			$resultset2 = mysqli_query($conn, $query2);
			$states = mysqli_fetch_assoc($resultset2);
			// for cities
			$query3 = "SELECT * FROM cities WHERE id='$student[city]'";
			$resultset3 = mysqli_query($conn, $query3);
			$city = mysqli_fetch_assoc($resultset3);
			
	
			
			
}		
?>
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>:: Learn Programming :: </title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<link href="css/bootstrap-select.css" rel="stylesheet" />
<!-- Custom Css -->
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/color_skins.css">
<script type="text/javascript" charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css" />
<style>
	.error{color:red;}
	.mdl-data-table{white-space:normal!important;}
	
	</style>
</head>
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="images/logo.svg" width="48" height="48" alt="Logo"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="online-editor/index.php"><img src="images/logo.svg" width="30" alt="Oreo"><span class="m-l-10">Programming World</span></a>
            </div>
        </li>
       
        <!--<li class="hidden-sm-down">
            <div class="input-group">                
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-search"></i>
                </span>
            </div>
        </li>-->        
        <li class="float-right">
            <a href="logout.php" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
            <!--<a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>-->
        </li>
    </ul>
</nav>
<!-- Left Sidebar -->
<?php include 'left-sidebar.php';?>
<!-- Right Sidebar -->
<?php include 'right-sidebar.php';?>
