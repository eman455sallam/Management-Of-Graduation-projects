<?php 
include "inc/db_connection.php";
include "inc/validation.php";
$error='';
$success='';
if (isset($_POST['submit'])) {
	
	

	$cat_name = validate($_POST['cat_name']);
	if (empty($cat_name)) {
		$error="Name is required";
	}elseif($cat_name){
		if(min_length($cat_name,3))
		{  
			if(check_numeric($cat_name))
			{
			$query = "INSERT INTO categories(name) VALUES('$cat_name')" ;
	     	 $run_query = mysqli_query($conn, $query) ;
				 if ($run_query) {
					 $success="successfully added";}
					 
			
			}else {
				$error=" name must be string";
		    }
		}else {
			$error="categoriy name must be > 3";}
	  }else{
		$error="categoriy name is erquired";
	  }
		}
	

	


?>
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
               <a class="nav-link  " href="proposal in profile doctor.php">New Proposals <span class="sr-only">(current)</span></a>
            </li>
          
            <li class="nav-item ">
               <a class="nav-link  " href="myprojects.php">My projects <span class="sr-only">(current)</span></a>
            </li>
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
 <div class="container-fluid">
	<div class="card  category mt-5">
	   <div class="card-body">
		  <h2 class="card-title">  All categories</h2>
	   <a class="view btn btn-primary" href="categories in profile doctor.php" > view categories </a>
	   </div>
	</div>
</div>




  
    <!-- start form new categorie-->
   <?php if ($error) { ?>
		   <div class="alert alert-danger text-center " role="alert">
			  <?php echo $error; ?>
		    </div>
		   <?php } ?>
<?php if ($success) { ?>
		   <div class="alert alert-success text-center" role="alert">
			  <?php echo $success; ?>
		    </div>
		   <?php } ?>
<div class="myform">
		<form class="log" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="  ">
		  <div class="form-group new-cat">
			<input name="cat_name" type="text" class="form-control w-75 " id="exampleInputText" placeholder="Add new category">
			
		  </div>
		  
		  
		  <button name="submit" type="submit" class="btn add ">Add new category</button>
		</form>
</div>
	
   <!--end form new categories-->
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/myjs.js"></script>
</body>
</html> 