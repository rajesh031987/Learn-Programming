<?php
include('classes/settings.php');
     $path = $_SERVER['PHP_SELF']; // will return http://xyz.com/two.php for our example
     $page1 = basename($path); // will return two.php
     $page1 = basename($path, '.php'); //will return the string 'two'<br>
	 $class = " class='active'";

?>
<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title><?php echo $config['site_title']; ?></title>



    <!-- Bootstrap Core CSS -->

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- MetisMenu CSS -->

    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">



    <!-- Timeline CSS -->

    <link href="dist/css/timeline.css" rel="stylesheet">




    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom CSS -->



    <!-- Morris Charts CSS -->

    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	<link rel="stylesheet" type="text/css" href="css/admin-style.css" />
	 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->



</head>



<body>



    <div id="wrapper">



        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                 <a class="navbar-brand" href="<?=$config['site_url'];?>" style="color:white;"><?php if($page1!='index'){?>Logo<?php } else { ?>Logo<?php } ?></a>
				
            </div>

            <!-- /.navbar-header -->



            <ul class="nav navbar-top-links navbar-right">

                

                <!-- /.dropdown -->

                

                <!-- /.dropdown -->


                <!-- /.dropdown -->

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="change_password.php"><i class="fa fa-user fa-fw"></i>Change Password</a>


                        <li class="divider"></li>

                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                        </li>

                    </ul>

                    <!-- /.dropdown-user -->

                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->



            <?php include('left-sidebar.php');?>

            <!-- /.navbar-static-side -->

        </nav>



