<?php  
session_start();
include 'C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php';
$student_id=$_SESSION['student_id'] ;



$sql="SELECT * FROM doctors WHERE id IN (SELECT doctor_id FROM project_status WHERE student_id='$student_id') ";
$run_sql = mysqli_query($conn, $sql);

    



?>
