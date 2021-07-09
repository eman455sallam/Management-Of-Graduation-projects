<?php
include "read/cat_read.php";
include "delete/cat_delete.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/style3.css">
        
       
    </head>
    <body>

      <!- start navbar-->
      <nav class="navbar navbar-expand-lg navbar-light  ">
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
		<!--start add field-->
			<div class="container-fluid">

			<div class="card py-2 mt-5" >
			  <div class="card-body">
				<h4 class="card-title">All categories</h4>
				<a href="updatecategory.php" class="btn add">Add new category</a>
			  </div>
			</div>
<!--end add field-->
<!-- start fields table -->
<?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger text-center" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
  <?php if (isset($_GET['success'])) { ?>
		   <div class="alert alert-success text-center" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		   <?php } ?>
		   
             <?php if (mysqli_num_rows($run_query)) { ?>
			<table class="table table-bordered table-hover table-dark mt-5 w-75" >
				
			  <thead >
				<tr >
				<th scope="col"></th>
				  <th scope="col">Name</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($run_query)){
			  	   $i++;
			  	 ?>
      <tr>
        <th scope="row"><?php echo  $i; ?></th>
        <td style="font-weight:bold; font-size:18px ;text-transform: capitalize"><?php echo $rows['name']; ?></td>
        
        <td><a type="button" href="form_update_cat.php?id=<?php echo $rows['id']; ?>" class="btn update">Update</a>
			<a type="button" href="delete/cat_delete.php?id=<?php echo $rows['id']; ?> " class="btn btn-danger">Delete</a>
		  
		  </td>
		  
		 
<!--         <td> <a type="button" href="delete/cat_delete.php?id=<?php echo $rows['id']; ?> " class="btn btn-danger">Delete</a></td>-->
        
      </tr>
	          <?php } ?>
			  </tbody>
			</table>
			<?php }?>
		</div>
		
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>