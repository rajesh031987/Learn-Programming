<?php 
session_start();
//error_reporting(0);
//include_once("db-connection/conn.php");

/* settings */

$config = array();



$config['site_url'] = "http://magentuguru.com/online-editor/admin"; //website absolute path

$config['site_title'] = "Admin"; //website absolute path
$config['site_url'] = "Admin"; // site url

#default connection

//$info = new clsSettings();
/*
   $admin_site_server   = $info->site; 
  $admin_site_user     = $info->siteuser;				

 $admin_site_passwd   = $info->sitepass; 

 $admin_site_db 		= $info->sitedb;

$default_con = mysqli_connect($admin_site_server, $admin_site_user, $admin_site_passwd,$admin_site_db)	;

//mysql_select_db($admin_site_db, $default_con) or die("unable to connect db error");
if(! $default_con ) {
            die('Could not connect: ' . mysqli_error());
         }
		 */
		 $dbhost = 'localhost';
         $dbuser = 'lksproject';
         $dbpass = '@23jan@@';
         $dbname = 'lksproject';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass ,$dbname);
   
         if(!$conn ) {
            die('Could not connect: ' . mysqli_error());
         }
	 global $conn;
$currency = '$';




?>