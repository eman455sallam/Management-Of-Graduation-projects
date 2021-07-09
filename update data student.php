<?php 
include "inc/db_connection.php";
include "inc/validation.php";
$error='';
$success='';
if (isset($_POST['submit'])) {
	
	

	$name = validate($_POST['name']);
	$user_name = validate($_POST['user_name']);
	$email = validate($_POST['email']);
    $password = trim(htmlspecialchars($_POST['password']));

	//$user_data = 'name='.$name. '&user_name='.$user_name . '&password='.$password;

	if (empty($name)) {
		 $error="Name is required";
	}else if (empty($email)) {
        $error="email is required";
	}else if (empty($user_name)) {
        $error="user_name is required";
	}else if (empty($password)) {
        $error="password is required";
	}else if ($name  &&  $user_name && $email &&  $password)
		{
			if(min_length($name,3) && max_length($password,20))
			{
				if(check_numeric($name))
				 {
					if(validate_email($email))
					{
    
		           $hashed_password = password_hash($password, PASSWORD_DEFAULT ) ;
                   $query = "INSERT INTO students(name, user_name,password,email) 
                      VALUES('$name', '$user_name','$hashed_password','$email')";
                   $run_query = mysqli_query($conn, $query);
                           if ($run_query) {
				               $success="successfully added";
							}
							   
                           
				}else {
					$error="enter validate email";}
	  }
				else{
					$error="name must be string not a number";
				}
			}
	    }else {
			$error="name_length must be >3 and password_length must be <20";}
	  }
		

?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/style3.css">
        
       
    </head>
    <body>

      <!- start navbar-->
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
  <!--end navbar-->
		
		<div class="container-fluid">

			<div class="card py-2 mt-5">
			  <div class="card-body">
				<h4 class="card-title">Add Students</h4>
				<a href="students.php"class="btn view">view all students</a>
			  </div>
			</div>
		
<!--end view students-->
<?php if ($error) { ?>
		   <div class="alert alert-danger text-center" role="alert">
			  <?php echo $error; ?>
		    </div>
		   <?php } ?>
<?php if ($success) { ?>
		   <div class="alert alert-success text-center" role="alert">
			  <?php echo $success; ?>
		    </div>
		   <?php } ?>
			<div class="form">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="add-student w-50" >
<div class="form-group row">
        <label for="exampleInputId" class="col-sm-2">Name</label>
	<div class="col-sm-10">
        <input name="name" type="text" class="form-control" id="exampleInputId" placeholder="Enter name">
      </div>
	</div>
    <div class="form-group row">
        <label for="exampleInputUser-name" class="col-sm-2">User_name</label>
		<div class="col-sm-10">
        <input name="user_name" type="text" class="form-control" id="exampleInputId" placeholder="Enter student user name">
      </div>
		</div>
	  <div class="form-group row">
        <label for="exampleInputemail" class="col-sm-2">Email</label>
		  <div class="col-sm-10">
        <input name="email" type="email" class="form-control" id="exampleInputId" placeholder="Enter student email">
      </div>
	</div>
      
      
    <div class="form-group row">
        <label for="exampleInputpassword" class="col-sm-2">Password</label>
		<div class="col-sm-10">
        <input name="password" type="password" class="form-control" id="InputName" aria-describedby="NameHelp" placeholder="Enter password">
      
      </div>
	</div>
    
    <button name="submit" type="submit" class="btn submit">Submit</button>
  </form>
			</div>	
		</div>
		
		

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>