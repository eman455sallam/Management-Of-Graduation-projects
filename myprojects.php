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
      <div class="container-fluid ">
         <div class="card   mt-5 projects">
            <div class="card-body">
               <h2 class="card-title"> My projects</h2>
               
               
            </div>
         </div>
    

      
      <?php if (mysqli_num_rows($run_query)) { ?>
      <table class="table table-bordered my-projects mt-5" style="position: relative;
	top: 100px;" style="posit"id="myTable">
         <thead>
            <tr>
               <th scope="col"></th>
               <th scope="col">Project name </th>
               <th scope="col">Description</th>
               <th scope="col">Team</th>
               <th scope="col">Proposal link</th>
               <th scope="col">degree</th>


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
               <th scope="row"><?php echo $row['team'] ; ?></th>
               <th>
          <a type="button" href="<?php echo $row['proposal'] ; ?> " class="btn " style="background-color: #065f9f;
               color: #fff;">proposal link</a></th>
                   <th>
          <a type="button" href="doc_add_degree.php?id=<?php echo $row['id']; ?>" class="btn " style="background-color:  #065f9f;
               color: #fff;">add </a></th>
               <!-- <th scope="row"><button><a href="<?php echo $row['proposal'] ; ?>"></a></button> Link of proposal</th> -->



               
        
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