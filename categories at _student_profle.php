<?php
include "read/cat_read.php";

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
      <div class="container-fluid">
         <div class="card w-50 mt-5 cat-student">
            <div class="card-body">
               <h4 class="card-title">All categories</h4>
            </div>
         </div>
         <!--end add field-->
         <!-- start fields table -->
         <?php if (mysqli_num_rows($run_query)) { ?>
         <table class="table table-bordered table-hover table-dark mt-5 ta-cat-student">
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
               <tr >
                   <th scope="row"  ><?php echo  $i; ?></th>
                   <td style="font-weight:bold; font-size:18px ;text-transform: capitalize"><?php echo $rows['name']; ?></td>
                  
                   <td><a type="button" href="read/st_read_cat_doc.php?id=<?php echo $rows['id']; ?>"   class="btn submit">submit</a></td>
                  
               </tr>
               
               <?php } ?>
            </tbody>
         </table>
         <?php } ?>

		   <!-- end fields table -->

         <!--start categeroies for doctor -->
         <table class="table table-bordered table-hover table-dark mt-5" style="display: none">
            <thead >
               <tr >
                  <th scope="col ">category</th>
                  <th scope="col">Doctors</th>
               </tr>
            </thead>
            <tbody>
               <tr >
                  <th scope="row" >Web</th>
                  <td>
                     <a href="doc.php"> Dr Mohammed</a>
                  </td>
               </tr>
               <tr>
                  <td><a href="doc.php"> Dr Mohammed</a></td>
               </tr>
            </tbody>
         </table>
		   <!--end categeroies for doctor -->
      </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>