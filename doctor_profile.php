<?php 
session_start();
include('inc\db_connection.php');
include_once('inc\validation.php'); 
include_once "read/accepted_read.php";


 

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
  <?php 
       $doc_id=$_SESSION['doctor_id'];
       $find_notifications = "SELECT * from projects where notification_status = 0  AND doctor_id=$doc_id";
       $result = mysqli_query($conn,$find_notifications);
       $count_active = '';
        while($rows = mysqli_fetch_assoc($result)){
                $count_active = mysqli_num_rows($result);
             
        }
        ?>
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
               <a class="nav-link  " href="proposal in profile doctor.php?var=show">New Proposals <span class="sr-only">(current)</span></a>

            </li><i class="fa fa-bell"></i><span class="badge "><?php echo $count_active; ?></span>

          
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
               <h2 class="card-title" style="text-transform: capitalize;"> <span style="color:#065f9f ; font-weight:bold">Name:</span>  <?php echo $_SESSION['doctor_full_name'] ; ?></h2>
               <h2 class="card-title"><span style="color:#065f9f ; font-weight:bold">Email:</span><?php echo $_SESSION['doctor_email'] ; ?> </h2>
               <!-- <h2 class="card-title">Bio:<?php echo $_SESSION['doctor_bio'] ; ?> </h2> -->

                  </div>
         </div>


   <div class="profile" >
      <div class="row  ">
      <div class="col-sm-12 col-md-3" >
         <div class="card d-flex  align-items-center text-center doctor-card">
            
               <img class="card-img-top w-50 rounded-circle mt-3" src="images/f1.png" alt="doctor">
               <div class="card-body">
                    
                  <h4 class="card-title"> <?php echo $_SESSION['doctor_full_name'] ; ?> </h4>
                   <a href="update doctor profile.php" class="btn btn-primary" id="myEditProfile">Edit profile</a>
               
                  </div>
                  
            </div>
            
         </div>
         <div class="col-sm-12 col-md-9" >
         <div class="card text-center">
 
<div class="text-center">
  <button class="btn mt-3  btn-primary" style="background-color:#065f9f ; color:#fff" > <a style=" color:fff" href="myprojects.php" > veiw details </a></button>
</div>
  <div class="card-body ">
    <blockquote class="blockquote mb-0">
    <?php if (mysqli_num_rows($run_query)) { ?>
      <table class="table table-bordered mt-0" style="" id="myTable">
         <thead>
            <tr>
               <th scope="col"></th>
               <th scope="col">project name </th>
               <th scope="col">description</th>
               


            </tr>
         </thead>
         <tbody>
         <?php 
			  	   $i = 0;
			  	   while($row = mysqli_fetch_assoc($run_query)){
			  	   $i++;
			  	 ?>
            <tr>
                <th scope="row"><?php echo $i ; ?></th>
               <th scope="row"><?php echo $row['name'] ; ?></th>
               <th scope="row"><?php echo $row['description'] ; ?></th>
               


               
        
            </tr>
            <?php } ?>
         </tbody>
      </table>
      <?php } ?>

    </blockquote>
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