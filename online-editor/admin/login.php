<?php

include('include.php');

if (isset($_POST['Login']) && ($_POST['Login'] == 'Login')) {
    //$main->MysqlRealEscapeString_array($_POST);
    
    $query = "select * from admin where username='" . $_POST['email_address'] . "' AND password ='" . md5($_POST['password']). "'";
    
    $result = mysqli_query($conn, $query) or die(mysql_error());
    
    if (mysqli_num_rows($result) > 0) {
        
        $details                   = mysqli_fetch_array($result);
        $_SESSION['username']      = $details['username'];
       $_SESSION['admin_id']      = $details['admin_id'];
	
        $_SESSION['admin_login']   = "Yes";
        $_SESSION['Last_Login']    = $details['last_login'];
        $_SESSION['Last_Login_ip'] = $details['last_login_ip'];
        $date                      = date('Y-m-d h:i:s');
        
        $ip = $_SERVER['REMOTE_ADDR'];
        //$update= mysql_query("update admin set last_login='".$date."', last_login_ip = '".$ip."' ") or die(mysql_error());
        
        echo "<script>document.location.href='dashboard.php'</script>";
        
        exit;
    } else {
        $message = '<div class="message-error">Invalid Username or password.</div>';
    }
}
?>


			<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
								<meta name="description" content="">
									<meta name="author" content="">
										<title>
											<?php
echo $config['site_title'];
?>
										</title>
										<!-- Bootstrap Core CSS -->
										<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
											<!-- MetisMenu CSS -->
											<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
												<!-- Custom CSS -->
												<link href="dist/css/sb-admin-2.css" rel="stylesheet">
													<!-- Custom Fonts -->
													<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
														<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
														<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
														<!--[if lt IE 9]>
														<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
														<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
														<![endif]-->
													</head>
													<body>
														<div class="container">
															<div class="row">
																<div class="col-md-4 col-md-offset-4">
																	<?php
if ($message != '') {
?>
																	<div class="alert alert-info alert-dismissable">
																		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
																		<?= $message; ?>
																		<a class="alert-link" href="#"></a>.



                            
																	
																	</div>
																	<?php
}
?>
																	<div class="login-panel panel panel-default">
																		<div class="panel-heading" style="background-color: white;">
																			<h3 class="panel-title" >
																				Logo here&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In
																				
																				</h3>
																			</div>
																			<div class="panel-body">
																				<form role="form" action="" method="post">
																					<fieldset>
																						<div class="form-group">
																							<input class="form-control" placeholder="Username" name="email_address" id="email_address" type="text" >
																							</div>
																							<div class="form-group">
																								<input class="form-control" placeholder="Password" name="password" type="password"  id="password">
																								</div>
																								<!-- Change this to a button or input when using this as a form -->
																								<input type="submit" value="Login" name="Login" class="btn btn-lg btn-block" style="background-color:#4484F6; color:#fff;">
																									<!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
																								</fieldset>
																							</form>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<!-- jQuery -->
																		<script src="bower_components/jquery/dist/jquery.min.js"></script>
																		<!-- Bootstrap Core JavaScript -->
																		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
																		<!-- Metis Menu Plugin JavaScript -->
																		<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
																		<!-- Custom Theme JavaScript -->
																		<script src="dist/js/sb-admin-2.js"></script>
																	</body>
																</html>
													