<?php
 
session_start() ;
$doctor_id=$_SESSION['doctor_id'] ;


include 'C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php';

$query = "SELECT * FROM projects  WHERE id NOT IN (SELECT project_id FROM project_status)";
$run_query = mysqli_query($conn, $query);


?>


