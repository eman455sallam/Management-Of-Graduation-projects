
<?php  
 include 'C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php';
if(isset($_GET['id'])){
  
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$query = "DELETE FROM doc_cat
	        WHERE id=$id  " ;
   $run_query = mysqli_query($conn, $query);
   
   if ($run_query) {
    
    header("Location: ../categories in profile doctor.php?success=successfully deleted");
   } else {
    header("Location: ../categories in profile doctor.php?error=unknown error occurred");
 }

}
?>