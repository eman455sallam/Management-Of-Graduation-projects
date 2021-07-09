<?php
include "read/cat_read.php";

$sql = "SELECT * FROM projects  WHERE id  IN (SELECT project_id FROM project_status)";
$run_sql = mysqli_query($conn, $sql);

?>


<html>
        <head>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/fontawesome-all.min.css">
            <link rel="stylesheet" href="css/style.css">
            
           
        </head>
        <body>
start navbar 
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container">
  <a class="navbar-brand" href="#">Management  <span class="">Of Graduation Projects</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link  " href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>


    </ul>
 
  </div>
  </div>
  <li class="nav-item log">
        <a class="nav-link log" href="student_login.php">Log in</a>
      </li>
</nav> 
<!--end nav-->

<!--start section projects-->
<?php if(mysqli_num_rows($run_query) > 0){ ?>
<section id="myprojects">
<div class="container" >
<?php foreach($run_query as $key => $value){ ?>

    <h2><?= $value['name']; ?> </h2>
    <div class="lines"></div>
    <button class="btn myAllProjects  " id="myAllProjects" >All <?= $value['name']; ?>  Projects</button>
    <!--start img-->


<div class="container ">
    <div class="row">
    <div class="col-md-4">
    <div class="items">
    <img class="img-fluid" src="images/p1.jpg" style="height: 80%;" >
    <div class="layer "style="height: 80%;" >
        <div class="team-info">
          <div class="words">
          <?php if(mysqli_num_rows($run_query) > 0){ ?>

          <?php foreach($run_sql as $key => $pro){ ?>

              <h4> <?= $pro['name']; ?> </h4><br>
            <h5> link of project :<?= $pro['proposal']; ?></h5><br>
            <h6> Name of students: <?= $pro['description']; ?> <br><br> Name of supervisor: dr mohammed</h6>
            <p>Degree :</p>
            <?php } }?>
        </div>
    </div>
    </div>
    </div>
</div>
   
<!--end section projects-->

<?php } ?>
</div>


<?php } ?>



  
  


</section>
			     <!-- start footer -->
      <footer>
         <div class="verybottom">
            <div class="container">

               <div class="row">
                  <div class="col-md-12">
                     <div class="aligncenter">
                        <p>
                           &copy;  <span>Management of Graduation Projects</span>- All right reserved
                        </p>
                        <div class="credits">
                           
                           Designed by <span>Our team </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>

            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
              <script src="js/script.js" ></script> 
</body>
</html>