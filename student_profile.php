<?php  
session_start();
include_once('inc\validation.php'); 
include "read/accepted_proposal_for_student.php";
?>
<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/fontawesome-all.min.css">
      <link rel="stylesheet" href="css/style4.css">
   </head>
   <body>
      !--start navbar -->
<nav class="navbar navbar-expand-lg navbar-light ">
	<div class="container">

  <a class="navbar-brand" href="#">Management  <span class="">Of Graduation Projects</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link  " href="categories at _student_profle.php">categories <span class="sr-only">(current)</span></a>
      </li>

		
    
    </ul>
 
  </div>
	</div>
	<li class="nav-item log">
        <a class="nav-link log "  href="student_login.php">Log out</a>
      </li>
</nav>
<!--end nav-->
	   
	   
		
      <div class="container-fluid">
      <div class="card student mt-5 py-2" style="width:40% ">
         <div class="card-body">
            <h2 class="card-title">User profile</h2>
            <a href="student_profile.php"class="btn btn-primary">Profile</a>
         </div>
      </div>
		  
		  
		  
      <!-- Start section profile-->
      <div class="profile"  >
      <div class="row  ">
		  
      <div class="col-sm-12 col-md-3" >
         <div class="card d-flex  align-items-center text-center user-card">
            
               <img class="card-img-top w-50 rounded-circle mt-3" src="images/f1.png" alt="student">
               <div class="card-body">
                  <h4 class="card-title"> <?php  echo $_SESSION['student_full_name'];?></h4>
                  <a href="update_student_profile.php" class="btn btn-primary" id="myEditProfile">update profile</a>
               </div>
            </div>
         </div>
		  <div class="col-sm-12 col-md-9" >
         <div class="card text-center">
  <div class="card-header">
    <h3 class="prp">Project supervisor </h3>
  </div>
  <div class="card-body ">
  <?php if(mysqli_num_rows($run_sql)){?>

    <blockquote class="blockquote mb-0">
    <?php $row=mysqli_fetch_assoc($run_sql); ?>

		<h4>Doctor : <?php echo $row['name']; ?></h4>
		<a class="btn ">Contact : <?php echo $row['email']; ?> </a>
   

    </blockquote>
    <?php }else{
    echo "not yet";
}
 ?>
  </div>
</div>
         </div>
         </div>
         <!--end section-->

      </div>
		  </div>

      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>