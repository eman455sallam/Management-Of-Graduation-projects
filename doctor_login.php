<?php
session_start();
include('C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php');
//$error='';



if (isset($_POST['submit'])) {
	
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (empty($user_name)) {
		      $error="user name is required";
	}else if (empty($password)){
		  $error="Password is required";
	}else{
		$query = "SELECT * FROM doctors WHERE user_name='$user_name'";
		$run_query=mysqli_query($conn,$query);
	

		if (mysqli_num_rows($run_query) > 0) {
			$row = mysqli_fetch_assoc($run_query);

			$doctor_id = $row['id'];
			$doctor_user_name = $row['user_name'];
			$doctor_password = $row['password'];
			$doctor_full_name = $row['name'];
			$doctor_email = $row['email'];
			//$u=$row["password"];
				//echo $u;


			if ($user_name === $doctor_user_name) 
			{
				//echo $user_name.$doctor_id.$password.$doctor_password;
				
				if (password_verify($password, $doctor_password)) {
				     
					$_SESSION['doctor_id'] = $doctor_id;
					$_SESSION['doctor_email'] = $doctor_email;
					$_SESSION['doctor_user_name']=$doctor_user_name;
					$_SESSION['doctor_full_name'] = $doctor_full_name;
					header("Location:doctor_profile.php?id=$doctor_id&name=$doctor_full_name");
					
				}else {
					
		           	$error="Incorect User name or password";
		         }
	        }else {
		          $error="Incorect User name or password";
	        }
        }else {
	      $error="Incorect User name or password";
        }
		
	}
}
	
	
	

?>


<html>

    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/style4.css">
        
       
    </head>
    <body>


	<?php if (isset($error)) { ?>
		   <div class="alert alert-danger text-center" role="alert">
			  <?php echo $error; ?>
		    </div>
		   <?php } ?>
	
		<div class="form ">
		
		<form class="log"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		  <div class="form-group">
			<label for="exampleInputEmail1"   >User name</label>
			<input type="text" name="user_name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  
		  <button type="submit" name="submit" class="btn sign">sign in </button>
		</form>
		</div>
    
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>