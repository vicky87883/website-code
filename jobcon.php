<?php

$server = "localhost:3306";
$user = "root";
$password = "";
$db = "jobs";

$con = mysqli_connect($server,$user,$password,$db);
if($con)
{
// echo "Connection Successful";
}else{
echo "No connection";
}

?>