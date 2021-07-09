<?php
 
session_start() ;
$doctor_id=$_SESSION['doctor_id'] ;


include 'C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php';

$query = "SELECT * FROM projects  WHERE id  IN (SELECT project_id FROM project_status
 WHERE doctor_id='$doctor_id' AND status='accepted')";
$run_query = mysqli_query($conn, $query);
//$rows = mysqli_fetch_assoc($run_query);
//echo $rows['name'];

?>
