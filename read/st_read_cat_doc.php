
<?php
include('C:\xampp\htdocs\New2GraduationProject\inc\db_connection.php');
if(isset($_GET['id'])){
    $cat_id=$_GET['id'];
    $query = "SELECT name FROM categories WHERE id='$cat_id'";
    $run_query = mysqli_query($conn, $query);

    $sql="SELECT * FROM doctors
    WHERE id IN (SELECT doctor_id FROM doc_cat WHERE category_id='$cat_id')";
    $run_sql=mysqli_query($conn , $sql);
    $row=mysqli_fetch_assoc($run_sql);
    echo $row['name'];
    
    
}







?>
<html>
   <head>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/fontawesome-all.min.css">
      <link rel="stylesheet" href="../css/style4.css">
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
                  <a class="nav-link" href="../student_profile.php">Profile</a>
               </li>
            </ul>
         </div>
			
			  </div>
		   <li class="nav-item log">
        <a class="nav-link log "  href="student_login.php">Log out</a>
      </li>
      </nav>
      <div class="container-fluid">
         
         <!--end add field-->
       

         <!--start categeroies for doctor -->
         <?php if (mysqli_num_rows($run_query)) { ?>
            <?php if (mysqli_num_rows($run_sql)) { ?>
         <table class="table table-bordered table-hover table-dark mt-5 cat-doc" style="">
            <thead >
               <tr >
                  <th scope="col ">category</th>
                  <th scope="col">Doctors</th>
               </tr>
            </thead>
            <tbody>
            <?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($run_query)){
			  	   $i++;
                 $_SESSION['category_id']=$rows['id'];

			  	 ?>
               
               <tr >
                  <th scope="row" ><?php echo $rows['name'] ;?></th>
                  <td>
                  <?php foreach($run_sql as $key => $value){ ?>

                     <a href="../send_proposal.php" class="btn btn-primary"><?= $value['name']; ?> </a><br><br>
                     <?php }?>
                  </td>
               </tr>
              <?php } ?> 
            </tbody>
         </table>
         <?php }?><?php } ?>
		   <!--end categeroies for doctor -->
      </div>
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/myjs.js"></script>
   </body>
</html>