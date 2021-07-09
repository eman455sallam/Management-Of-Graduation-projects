<?php  

include('inc\db_connection.php');
include_once('inc\validation.php'); 


 


if(isset($_GET['id'])){
  echo $_GET['id'];

  $id = validate($_GET['id']);

	$query = "SELECT * FROM students WHERE id=$id";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query) > 0) {
    	$row = mysqli_fetch_assoc($run_query);
    }else {
    	header("Location: students.php");
    }



}elseif (isset($_POST['update'])){
  
   

	$name = validate($_POST['name']);
  $user_name = validate($_POST['user_name']);
  $password=trim(htmlspecialchars($_POST['password']));
  $id=validate($_POST['id']);
  

	if (empty($name)) {
		header("Location: students.php?id=$id&error=Name is required");
	}else if (empty($user_name)) {
		header("Location: students.php?id=$id&error=user name is required");
	}else if ($name  &&  $user_name )
  {
    if(min_length($name,3)  )
    {
      if(check_numeric($name))
       {
               
                if($password)
                {
              
             $hashed_password = password_hash($password,PASSWORD_DEFAULT);

       $sql = "UPDATE students
               SET name='$name', user_name='$user_name',password='$hashed_password'
               WHERE id=$id ";
                } else 
                {
                    $sql = "UPDATE students SET  name='$name' ,user_name='$user_name'  
                    WHERE id=$id";
                }

                 $result = mysqli_query($conn, $sql);
                 if ($result) {
                     header("Location: students.php?success=successfully updated");
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
            <link rel="stylesheet" href="css/style3.css">
            
           
        </head>
        <body>

            <!--start navbar-->
            <nav class="navbar navbar-expand-lg navbar-light ">
				<div class="container">
                  <a class="navbar-brand" href="admin.php">Admin</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
    
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                        <a class="nav-link" href="doctors.php">Doctors <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="students.php">Students</a>
                      </li>
                        <li class="nav-item">
                        <a class="nav-link" href="categories.php">categories</a>
                      </li>
                        <li class="nav-item">
                        <a class="nav-link" href="proposals.php">Proposals</a>
                      </li>
    
    
                    </ul>
    
                  </div>
					</div>
                </nav>
    <!--end navbar -->
            
            <div class="container-fluid">
    
                <div class="card py-2">
                  <div class="card-body">
                    <h3 class="card-title up-student">Update Students</h3>
                  </div>
                </div>
            
    <!--end view students-->
    

        <!--start form update student in admin-->
				<div class="form div-update">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
             id="StudentUpdateForm" class="update-student w-50 mt-5" >
                <div class="form-group row " >
                    <label for="inputName" class="col-sm-2 col-form-label ">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="<?php echo $row['name']  ?>" 
                      class="form-control ml-4" id="inputName" >
                      <input type="hidden" value="<?php echo $id; ?>" name="id" >
                    </div>
                  </div>


                  <div class="form-group row " >
                    <label for="inputName" class="col-sm-2 col-form-label ">UserName</label>
                    <div class="col-sm-10">
                      <input type="text" name="user_name" value="<?php echo $row['user_name']  ?>"
                      class="form-control ml-4" id="inputUserName" >
                    </div>
                  </div>
               
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control ml-4 " id="inputPassword3" >
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" name="update"class="btn update " >update</button>
                  </div>
                </div>
              </form>
					</div>
        
              <!--end form student doctor in admin---> 



            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            
</body>
</html>