<?php

include "read/accepted_read.php";


 
?>
<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/fontawesome-all.min.css">
      <link rel="stylesheet" href="css/style4.css">
   </head>
   <body>
      <!-- As a link -->
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
              <a class="nav-link  " href="proposal%20in%20profile%20doctor.php">New proposals <span class="sr-only">(current)</span></a>
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
         <div class="card pt-5  mt-5">
            <div class="card-body">
               <h2 class="card-title"> My projects</h2>
               
               
            </div>
         </div>
    

      
      <?php if (mysqli_num_rows($run_query)) { ?>
      <table class="table table-bordered mt-5" style="" id="myTable">
         <thead>
            <tr>
               <th scope="col"></th>
               <th scope="col">project name </th>
               <th scope="col">proposal link</th>
               <th scope="col">description</th>
               <th scope="col">team</th>


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
               <th scope="row"><?php echo $row['proposal'] ; ?></th>
               <th scope="row"><?php echo $row['description'] ; ?></th>
               <th scope="row"><?php echo $row['team'] ; ?></th>


               
        
            </tr>
            <?php } ?>
         </tbody>
      </table>
      <?php } ?>
	   </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>