<?php  

include 'C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php';

$query = "SELECT * FROM projects ORDER BY id ASC";
$run_query = mysqli_query($conn, $query);
//$rows = mysqli_fetch_assoc($run_query);
//echo $rows['name'];
?>

