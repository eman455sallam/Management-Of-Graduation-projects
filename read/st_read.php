<?php  

include 'C:\xampp\htdocs\NewGraduationProject\inc\db_connection.php';

$query = "SELECT * FROM students ORDER BY id ASC";
$run_query = mysqli_query($conn, $query);
?>