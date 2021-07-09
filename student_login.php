<?php
session_start();
include('inc\db_connection.php');
//$error='';



if (isset($_POST['submit'])) {
	
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (empty($user_name)) {
		      $error="user name is required";
	}else if (empty($password)){
		  $error="Password is required";
	}else{
		$query = "SELECT * FROM students WHERE user_name='$user_name'";
		$run_query=mysqli_query($conn,$query);
	

		if (mysqli_num_rows($run_query) > 0) {
			$row = mysqli_fetch_assoc($run_query);

			$student_id = $row['id'];
			$student_user_name = $row['user_name'];
			$student_password = $row['password'];
			$student_full_name = $row['name'];
			$student_email = $row['email'];
			//$u=$row["password"];
				//echo $u;


			if ($user_name === $student_user_name) 
			{
				//echo $user_name.$student_id.$password.$student_password;
				
				if (password_verify($password, $student_password)) {
					echo "Success";
				     
					$_SESSION['student_id'] = $student_id;
					$_SESSION['student_email'] = $student_email;
					$_SESSION['student_user_name']=$student_user_name;
					$_SESSION['student_full_name'] = $student_full_name;
					header("Location:student_profile.php?id=$student_id&name=$student_full_name");
					
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
	
		<div class="form mb-5">
		
		<form class="log "action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="padding: 50px;
    text-align: center;
    border: 3px solid  #065f9f;
	top: -400px;">
		  <div class="form-group">
			<label for="exampleInputEmail1"   >User name</label>
			<input type="text" name="user_name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  
		  <button type="submit" name="submit" class="btn sign" style="background-color: #065f9f;
	color: #fff;">sign in </button>
		</form>
		</div>
    
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>


