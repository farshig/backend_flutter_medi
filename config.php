<?php

 $host = "localhost";
 $username = "root";
 $password = "";
 $db_name = "helth";
 $connection = mysqli_connect($host,$username,$password,$db_name);

 if($connection){
     echo "connection succes";
 }


?>