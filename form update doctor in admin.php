<?php  
include('inc\db_connection.php');
include_once('inc\validation.php'); 


 
$error='';
$success='';

if(isset($_GET['id'])){
  echo $_GET['id'];

  $id = validate($_GET['id']);

	$query = "SELECT * FROM doctors WHERE id=$id";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query) > 0) {
    	$row = mysqli_fetch_assoc($run_query);
    }else {
    	header("Location: doctors.php");
    }



}elseif (isset($_POST['update'])){
  
   

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
  $id=validate($_POST['id']);
  

	if (empty($name)) {
		header("Location: doctors.php?id=$id&error=Name is required");
	}else if (empty($email)) {
		header("Location: doctors.php?id=$id&error=Email is required");
	}else if ($name  &&  $email )
  {
    if(min_length($name,3) )
    {
      if(check_numeric($name))
       {
               if(validate_email($email))
              {
                if($password)
                {
              $password=trim(htmlspecialchars($_POST['password']));
             $hashed_password = password_hash($password,PASSWORD_DEFAULT);

       $sql = "UPDATE doctors
               SET name='$name', email='$email',password='$hashed_password'
               WHERE id=$id ";
                } else 
                {
                    $sql = "UPDATE doctors SET  name='$name' ,email='$email'  
                    WHERE id=$id";
                }

                 $result = mysqli_query($conn, $sql);
                 if ($result) {
                     header("Location: doctors.php?success=successfully updated");
                     }
      
              }else {
                 header("Location: doctors.php?id=$id&error=invalid email");
               }
        } else {
          header("Location: doctors.php?id=$id&error=name must be string");
        }        
    }else {
      header("Location: doctors.php?id=$id&error=name must be > 3");
    }        
  }else {
   	header("Location: doctors.php?error=unknown error occurred");
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

<!--start view fields-->
<div class="container-fluid">

    <div class="card py-2 ">
      <div class="card-body">
        <h4 class="card-title up-doctors" style="font-weight: bold;
	color:#065f9f">Update Doctors</h4>
      </div>
    </div>

<!--end view fields-->





<!--start form-->

			<div class="form div-update">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
             id="myHiddenForm" class="update-doctor w-50 mt-5" >
                <div class="form-group row " >
                    <label for="inputName" class="col-sm-2 col-form-label ">Name</label>
                    <div class="col-sm-10">
                      <input type="text"  name="name" value="<?php echo $row['name']  ?>" class="form-control ml-4" id="inputName" placeholder="">
                      <input type="hidden" value="<?php echo $id; ?>" name="id" >
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value="<?php echo $row['email']  ?>" class="form-control ml-4 " id="inputEmail3" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password"  class="form-control ml-4 " id="inputEmail3" placeholder="">
                  </div>
                </div>
           
                
                
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" name="update" class="btn update " >update</button>
                  </div>
                </div>
              </form>
				</div>
        

<!--end form-->



            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
              <script src="js/myjs.js" ></script> 
</body>
</html>