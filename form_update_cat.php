<?php  
include('inc\db_connection.php');
include_once('inc\validation.php'); 


 

if(isset($_GET['id'])){
  //echo $_GET['id'];

  $id = validate($_GET['id']);

	$query = "SELECT * FROM categories WHERE id=$id";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query) > 0) {
    	$row = mysqli_fetch_assoc($run_query);
    }else {
    	header("Location: categories.php");
    }



}elseif (isset($_POST['update'])){
  
   

	$name = validate($_POST['cat_name']);
  $id=validate($_POST['id']);
  

	if (empty($name)) {
		header("Location: categories.php?id=$id&error=Name is required");
	}else if ($name   )
  {
    if(min_length($name,3) )
    {
      if(check_numeric($name))
       {
              
       $sql = "UPDATE categories
               SET name='$name'
               WHERE id=$id ";
                

                 $result = mysqli_query($conn, $sql);
                 if ($result) {
                     header("Location: categories.php?success=successfully updated");
                     }
      
              } else {
          header("Location: categories.php?id=$id&error=name must be string");
        }        
    }else {
      header("Location: categories.php?id=$id&error=name must be > 3");
    }        
  }else {
   	header("Location: categories.php?error=unknown error occurred");
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

			<div class="card py-2 mt-5">
			  <div class="card-body">
				<h4 class="card-title">Update categories</h4>
				<a href="categories.php" class="btn update">View all categories</a>
			  </div>
			</div>
		
<!--end view fields-->

			<div class="form div-update">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5 w-50 update-category ">
		  <div class="form-group">
			<input name="cat_name" value="<?php echo $row['name']  ?>" type="text" class="form-control " id="exampleInputText" >
			<input type="hidden" value="<?php echo $id; ?>" name="id" >
		  </div>
		  <div class="form-group row">
                  <div class="col-sm-10">
		             <button name="update" type="submit" class="btn update">update category</button>
                  </div>
                </div>
		  
		</form>
				</div>

	
</div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>