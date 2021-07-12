<?php 
session_start();
include "inc/db_connection.php";
include "inc/validation.php";
$error='';
$success='';
 $category_id= $_SESSION['category_id'];
 $doctor_id=   $_SESSION['doctor_id'];
 $student_id=  $_SESSION['student_id'];
   
if (isset($_POST['submit'])) {
	
	

	$pro_name = validate($_POST['pro_name']);
	$pro_link= validate($_POST['pro_link']);
	$pro_description = validate($_POST['descrption']);
   $pro_team = validate($_POST['team']);

 

	//$user_data = 'name='.$name. '&email='.$email . '&password='.$password;

	if (empty($pro_name)) {
		 $error=" project name is required";
	}else if (empty($pro_description)) {
        $error="project description is required";
	}else if (empty($pro_link)) {
      $error="proposal link is required";
 }else if (empty($pro_team)) {
   $error="Names of team members is required";
}
   else if ($pro_name &&    $pro_description && $pro_link  && $pro_team)
		{
			if(min_length($pro_name,3) )
			{
				if(check_numeric($pro_name))
				 {
				         
    
                   $query = "INSERT INTO projects(name ,category_id,doctor_id,student_id, description, proposal,team) 
                      VALUES('$pro_name' , '$category_id','$doctor_id','$student_id','$pro_description','$pro_link','$pro_team')";
                   $run_query = mysqli_query($conn, $query);
                           if ($run_query) {
				               $success="successfully sended";
                  }
							   
                           }else{
					$error="name must be string not a number";
				}
			}
	       }else {
			$error="name_length must be >3 ";}
	  }
		

?>









<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/fontawesome-all.min.css">
      <link rel="stylesheet" href="css/style4.css">
   </head>
   <body>
      <!--start navbar-->
      <nav class="navbar navbar-expand-lg navbar-light ">
         <div class="container">
            <a class="navbar-brand" href="#">Management <span>of Graduation Projects</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="student_profile.php">Profile</a>
                  </li>
               </ul>
            </div>
         </div>
         <li class="nav-item log">
            <a class="nav-link log "  href="student_login.php">Log out</a>
         </li>
      </nav> 
      <!--	   end navbar-->

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

      <div class=" form">
    
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="send-proposal" style="position: absolute;
            top: -400px;
            margin: auto;
            text-align: center;
            width:800px;
            padding: 50px;
            text-align: center;
            border: 3px solid  #065f9f;
		    " id="myForm">
            <div class="form-group">
               <label for="exampleInputEmail1">Project name</label>
               <input  type="text" name="pro_name" class="form-control" id="exampleInputname" placeholder="Enter project name">
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Description of the project </label>
               <textarea name="descrption" placeholder="Enter your Description" class="form-control"></textarea>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Link of proposal</label>
               <input type="text" name="pro_link" class="form-control"   placeholder="Enter link of proposal ">
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Names </label>
               <textarea name="team" placeholder="Enter names of your team" class="form-control"></textarea>
            </div>
            
            <button type="submit" name="submit"class="btn btn-primary" style="background-color: #065f9f;
               color: #fff;" class="toggle">send</button>
         </form>
      </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>