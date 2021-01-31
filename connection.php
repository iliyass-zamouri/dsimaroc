<?php  
       $servername = "localhost";  
       $username = "root";  
       $password = "root";  
       $conn = mysql_connect ($servername , $username , $password) or die("unable to connect to host");  
       $sql = mysql_select_db ('test',$conn) or die("unable to connect to database"); 
?>   