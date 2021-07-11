<?php
include "read/proposal_admin_read.php";

?>


<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/style3.css">
        
       
    </head>
    <body>
<!- start navbar-->
		
      <!- start navbar-->
      <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
          <a class="navbar-brand" href="admin.html">Admin</a>
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

			<div class="card py-2 mt-5 proposal">
			  <div class="card-body">
				<h3 class="card-title all-proposal">All proposals</h3>
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

			<table class="table table-bordered table-hover table-dark mt-5  ta_proposal">
			  <thead >
				<tr >
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col" >Description</th>
        <th scope="col">Team </th>
        <th scope="col">proposal link</th>
				<th  scope="col">Action</th>
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
				
				  <th ><?php echo $rows['name']; ?></th>
          <th ><?php echo $rows['description']; ?></th>
          <th ><?php echo $rows['team']; ?></th>

          <td>
          <a type="button" href="<?php echo $rows['proposal']; ?> " class="btn " style="background-color: #065f9f;
               color: #fff;">proposal link</a></td>

				  <td>
          <a type="button" href="delete/delete_proposal.php?id=<?php echo $rows['id']; ?> " class="btn btn-danger">Delete</a></td>

			
				  
				</tr>
				
				<?php }?>
			  </tbody>
			</table>
		</div>
    
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>