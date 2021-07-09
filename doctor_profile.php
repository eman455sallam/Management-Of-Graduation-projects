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
                  header("Location: doctor_login.php?success=successfully updated");
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
              <a class="nav-link  " href="categories in profile doctor.php">categories <span class="sr-only">(current)</span></a>
            </li>
      
            <li class="nav-item ">
               <a class="nav-link  " href="proposal in profile doctor.php">New Proposals <span class="sr-only">(current)</span></a>
            </li>
          
            <li class="nav-item ">
               <a class="nav-link  " href="myprojects.php">My projects <span class="sr-only">(current)</span></a>
            </li>
          </ul>
       
        </div>
         </div>
         <li class="nav-item log">
              <a class="nav-link log "  href="doctor_login.php">Log out</a>
            </li>
      </nav>
      <!--end Navbar-->






      <!-- As a link -->
      <div class="container-fluid">
         <div class="card doctor mt-5 py-2" style="width:40%">
            <div class="card-body">
               <h2 class="card-title">Doctor profile</h2>
      
               <a href="doctor_profile.php"class="btn btn-primary">Profile</a>
            </div>
         </div>


   <div class="profile" >
      <div class="row  ">
      <div class="col-sm-12 col-md-3" >
         <div class="card d-flex  align-items-center text-center doctor-card">
            
               <img class="card-img-top w-50 rounded-circle mt-3" src="images/f1.png" alt="doctor">
               <div class="card-body">
                    
                  <h4 class="card-title"> <?php echo $_SESSION['doctor_full_name'] ; ?> </h4>
                   <a href="update doctor profile.php" class="btn btn-primary" id="myEditProfile">update profile</a>
               </div>
            </div>
         </div>
         </div>
</div>

         <!--end section-->
        
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>