<?php

include "read/proposal_read.php";


 ?>
<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/fontawesome-all.min.css">
      <link rel="stylesheet" href="css/index_style.css">
   </head>
   <body>
      <!-- As a link -->
      <nav class="navbar navbar-light  first">
         <a class="navbar-brand mr-auto" href="#">Management of Graduation Projects</a>
         <a class="navbar-brand ml-auto" href="profile2%20doctors.php">Profile</a>
      </nav>
      <!-- As a link -->
      <div class="container-fluid">
         <div class="card  mt-5">
            <div class="card-body">
               <h2 class="card-title">All Proposols</h2>
            </div>
         </div>
      </div>
      <!--start proposal table-->
      <?php if (isset($_GET['success'])) { ?>
		   <div class="alert alert-success text-center" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		   <?php } ?>

         <table class="table table-bordered mytable " id="myTable2" >
         <thead>
            <tr>
               <th scope="col"> </th>
               <th scope="col">name </th>
               <th scope="col"> link</th>
               <th scope="col">action</th>
               
            </tr>
         </thead>
         <tbody>
            <tr>
            <?php
            
            if(mysqli_num_rows($run_query))
            {
			  	   $i = 0;
			  	   while($row = mysqli_fetch_assoc($run_query)){
                    $_SESSION['student_id']= $row['student_id'] ;
			  	   $i++;
			  	 ?>
            <tr>
                <th scope="row"><?php echo $i ; ?></th>
               <th ><?php echo $row['name'] ; ?></th>
               <th ><?php echo $row['proposal'] ; ?></th>
               
              <td><a type="button" href="project_status.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">accept</a>
               <a type="button" href="project_status.php?id=<?php echo $row['id']; ?> " class="btn btn-danger">reject</a></td>

            </tr>
            <?php } }?>
          
         </tbody>
      </table>
      
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
      <script src='https://kit.fontawesome.com/a076d05399.js'></script>
   </body>
</html>