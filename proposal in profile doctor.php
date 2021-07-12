<?php

include "read/proposal_read.php";


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
          <!--start card-->
      <div class="container-fluid">
         <div class="card  category mt-5">
            <div class="card-body">
               <h3 class="card-title"> All proposal</h3>
<!--               <button id="myProposol" type="button" class="btn submit">show</button>-->
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
               <th scope="col"> description</th>
               <th scope="col"> proposal</th>
               <th scope="col">action</th>
            </tr>
         </thead>
         <tbody>
            <tr>
            <?php
            $doc_id=$_SESSION['doctor_id'];
            if(isset($_GET['var'])){
               $deactiv_notifications = "UPDATE projects SET notification_status='1'  AND doctor_id=$doc_id";
               $result = mysqli_query($conn,$deactiv_notifications);
            
                }
            if(mysqli_num_rows($run_query))
            {
			  	   $i = 0;
			  	   while($row = mysqli_fetch_assoc($run_query)){
                    $_SESSION['student_id']= $row['student_id'] ;
                  
			  	   $i++;
                //$_SESSION['notification_num']= $i  ;
			  	 ?>
            <tr>
                <th scope="row"><?php echo $i ;   ?></th>
               <th ><?php echo $row['name'] ; ?></th>
               <th ><?php echo $row['description'] ; ?></th>
               <th>
          <a type="button" href="<?php echo $row['proposal'] ; ?> " class="btn " style="background-color: #065f9f;
               color: #fff;">proposal link</a></th>
              <td><a type="button" href="project_status_accepted.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">accept</a>
               <a type="button" href="project_status_rejected.php?id=<?php echo $row['id']; ?> " class="btn btn-danger">reject</a></td>

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