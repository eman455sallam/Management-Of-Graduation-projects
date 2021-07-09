<?php
include('C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php');
$sql="SELECT *
FROM categories
INNER JOIN doc_cat
ON id = category_id";

$run_sql=mysqli_query($conn , $sql);



?>