<?php 
session_start();
include 'C:\xampp\htdocs\NewGraduation project\inc\db_connection.php';
if(isset($_GET['id'])){
  
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);


$sql="DELETE FROM projects  WHERE id=$id ";
$run_sql=mysqli_query($conn ,$sql);
if ($run_sql) {
    
    header("Location:doctor_proposal.php?success= done ");
   } 

}
?>