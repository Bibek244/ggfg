<?php
$servername  = 'localhost';
$user = 'root';
$password =  "";
$database = "inventory";
 $con = mysqli_connect($servername,$user,$password,$database);

 if(!$con){
     die(mysqli_connect_error());
 }
 ?>