<?php 
session_start();
include 'C:\xampp\htdocs\NewGraduation project\inc\db_connection.php';



$project_id= $_GET['id'];
$doctor_id=$_SESSION['doctor_id'];
$student_id= $_SESSION['student_id'] ;


$sql="INSERT INTO project_status(project_id,doctor_id,student_id,status)
VALUES('$project_id','$doctor_id','$student_id','accepted')";
$run_sql=mysqli_query($conn ,$sql);
if ($run_sql) {
    
    header("Location:doctor_proposal.php?success= done ");
   } 


?>