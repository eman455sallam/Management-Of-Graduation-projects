<?php  

include 'C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php';

$query = "SELECT * FROM doctors ORDER BY id ASC";
$run_query = mysqli_query($conn, $query);
?>