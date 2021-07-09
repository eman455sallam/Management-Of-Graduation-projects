<?php  
session_start();
include('inc\db_connection.php');
include_once('inc\validation.php'); 
$error='';


 

if (isset($_POST['submit'])){
  
 
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
   $bio = validate($_POST['bio']);

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
                if($bio)
                {
              

       $sql = "UPDATE doctors
               SET name='$name', email='$email',bio='$bio'
               WHERE id=$id ";
                } else 
                {
                    $sql = "UPDATE doctors SET  name='$name' ,email='$email'  
                    WHERE id=$id";
                }

                 $result = mysqli_query($conn, $sql);
                 if ($result) {
                  header("Location: doctor_profile.php?success=successfully updated");
                     }
      
              }else {
                 $error="invalid email";
               }
        } else {
          $error="name must be string";
        }        
    }else {
      $error="name must be > 3";
    }        
  }else {
   	$error="unknown error occurred";
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
       <!-- start navbar -->
       <nav class="navbar navbar-expand-lg navbar-light ">
         <div class="container">
        <a class="navbar-brand" href="#">Management  <span class="">Of Graduation Projects</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link  " href="doctor_profile.php">profile <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            </div>
            </div>
            <li class="nav-item log">
               <a class="nav-link log "  href="doctor_login.php">Log out</a>
             </li>
         </nav>
      <!-- As a link -->
       <!--start form edit profile-->
       <?php if ($error) { ?>
        <div class="alert alert-danger text-center " role="alert">
           <?php echo $error; ?>
         </div>
        <?php } ?>

<div class="forms">
      <form class="sign" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?> "
      class="mt-5"  id="myForm">
         <div class="form-group ">
            <label for="inputname" class=" col-form-label">Name</label>
            <input type="text" name="name" value="<?php  echo $_SESSION['doctor_full_name'] ;?>"
            class="form-control" id="exampleInputName" >
            <input type="hidden" value="<?php  echo $_SESSION['doctor_id'] ; ?>" name="id" >
         </div>
         <div class="form-group ">
            <label for="inputEmail" class=" col-form-label">email</label>
            <input type="email" name="email" value="<?php   echo $_SESSION['doctor_email'] ; ?>"
            class="form-control" id="exampleInputEmail1" >
         </div>
         <div class="form-group ">
            <label for="inputBio" class=" col-form-label">Biographies</label>
            <input type="text" name="bio" class="form-control" id="exampleInputBiographies" placeholder="Enter your Biographies">
         </div>
         <div class="bttn">
            <button type="submit" name="submit" class="btn submit" >save</button>
            <button type="button" class="btn btn-danger " >cancel</button>
         </div>
      </form>
      <!--end form profile doctor-->
   </div>

   <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>