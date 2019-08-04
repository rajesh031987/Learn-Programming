<?php
        $dbhost = 'localhost';
         $dbuser = 'lksproject';
         $dbpass = '@23jan@@';
         $dbname = 'lksproject';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass ,$dbname);
   
         if(!$conn ) {
            die('Could not connect: ' . mysqli_error());
         }
 
?>