<?php  
session_start();
include('inc\db_connection.php');
include_once('inc\validation.php'); 


 



if (isset($_POST['submit'])){
  


	$name = validate($_POST['name']);
  $user_name = validate($_POST['user_name']);
  $email = validate($_POST['email']);
  $password=trim(htmlspecialchars($_POST['password']));
  $id=validate($_POST['id']);
  

	if (empty($name)) {
		 echo "error=Name is required";
	}else if (empty($user_name)) {
	  echo "error=user name is required";
	}else if (empty($email)) {
      echo "error=email is required";
    }else if ($name  &&  $user_name && $email )
  {
    if(min_length($name,3)  )
    {
      if(check_numeric($name))
       {
         if(validate_email($email))
         {  
                if($password)
                {
              
             $hashed_password = password_hash($password,PASSWORD_DEFAULT);

       $sql = "UPDATE students
               SET name='$name', user_name='$user_name',email='$email',password='$hashed_password'
               WHERE id=$id ";
                } else 
                {
                    $sql = "UPDATE students SET  name='$name' ,user_name='$user_name',email='$email'  
                    WHERE id=$id";
                }

                 $result = mysqli_query($conn, $sql);
                 if ($result) {
                   $_SESSION['student_id']=$name;

                    header("Location: student_profile.php?success=successfully updated");
                     }
         }else {
                     header("Location: doctors.php?id=$id&error=invalid email");
               }
              
        } else {
          header("Location: students.php?id=$id&error=name must be string");
        }        
    }else {
      header("Location: students.php?id=$id&error=name must be > 3");
    }        
  }else {
   	header("Location: students.php?error=unknown error occurred");
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
      <!-- As a link -->
      <nav class="navbar navbar-expand-lg navbar-light first">
     <div class="container">

  <a class="navbar-brand" href="#">Management  <span class="">Of Graduation Projects</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
	</div>
		  <li class="nav-item log">
        <a class="nav-link log "  href="student_login.php">Log out</a>
      </li>
      </nav>
      <!-- As a link -->
      
<!--update data for students-->
	   <div class="form mb-5">
        <form method="post"class="update" action="<?php echo $_SERVER['PHP_SELF']; ?>"
         class="mt-3"  id="myForm">
            <div class="form-group">
               <label for="exampleInputEmail1"> Name</label>
               <input type="text" name="name" value="<?php echo $_SESSION['student_full_name']  ?>" 
               class="form-control" id="exampleInputname" >
               <input type="hidden" value="<?php echo $_SESSION['student_id'] ;?>" name="id" >

            </div>

            <div class="form-group">
               <label for="exampleInputEmail1"> User  name</label>
               <input type="text" name="user_name" value="<?php echo $_SESSION['student_user_name'] ?>" 
               class="form-control" id="exampleInputname" >
            </div>
            
            <div class="form-group">
               <label for="exampleInputEmail1">Email </label>
               <input type="email" name="email" value="<?php echo $_SESSION['student_email']  ?>"  
               class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group mb-0">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name="password" class="form-control " id="exampleInputPassword1" placeholder="Password">
            </div>
			
            <button type="submit" name="submit" class="btn up" >Save</button>
            <button type="submit" class="btn btn-danger" class="toggle">cancel</button>

      
         </form> 
	   </div>
		  <!-- end update data for students-->

      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>