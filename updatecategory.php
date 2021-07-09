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

			<div class="card w-50 mt-5">
			  <div class="card-body">
				<h4 class="card-title">Add categories</h4>
				<a href="categories.php" class="btn view">view all categories</a>
			  </div>
			</div>
		
<!--end view fields-->
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
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5 w-50  add-cat" >
		  <div class="form-group row">
			  <label for="exampleInputuser-name" class="col-sm-3">New Category</label>
			  <div class="col-sm-9">
			<input name="cat_name" type="text" class="form-control " id="exampleInputText" placeholder="Add new category">
			
		  </div>
			  </div>
		  
		  
		  <button name="submit" type="submit" class="btn submit">Add new category</button>
		</form>
	</div>

	
</div>
		
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>