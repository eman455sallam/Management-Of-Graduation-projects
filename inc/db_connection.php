<?php

$serverName='localhost';
$dbUser='root';
$dbPassword='';
$dbName='graduation_project';
 
$conn=mysqli_connect($serverName,$dbUser,$dbPassword,$dbName);
 
if(!$conn)
{
    echo "Connection failed!";
}



?>