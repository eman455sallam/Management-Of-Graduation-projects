<?php
include "read/cat_read.php";

?>


<html>
        <head>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/fontawesome-all.min.css">
            <link rel="stylesheet" href="css/style.css">
            
           
        </head>
        <body>
<!--start navbar -->
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
        <a class="nav-link log " href="student_login.php">Log in</a>
      </li>
</nav>
<!--end nav-->

<!--start section projects-->
<section id="myprojects">
<div class="container" >
<?php if(mysqli_num_rows($run_query) > 0){ 
   $cat=mysqli_fetch_assoc($run_query);
   $cat_id=$cat['id'];
   foreach($cat as $key ){
    $sql="SELECT * FROM projects WHERE category_id='$cat_id'";
    $run_sql=mysqli_query($conn,$sql);
   ?>
     <h2><?php echo $cat['name']; ?></h2>
    <div class="lines"></div>
    <button class="btn btn  " id="myAllProjects" >All <?php echo $cat['name']; ?> </button>
   <?php
  
  
   
   while(   $pro=mysqli_fetch_assoc($run_sql)){

?>
   <div class="container ">
    <div class="row">
    <div class="col-md-4">
    <div class="items">
    <img class="img-fluid" src="images/p1.jpg" style="height: 80%;" >
    <div class="layer "style="height: 80%;" >
        <div class="team-info">
          <div class="words">
              <h4> Name of project : <?php echo $pro['name'] ;?></h4><br>
            <h5> link of project : <?php echo $pro['proposal'] ;?></h5><br>
            <h6> Name of students: ahmed <br><br> Name of supervisor: dr mohammed</h6>
            <p>Degree :</p>
        </div>
    </div>
    </div>
    </div>
</div>

<!--end section projects-->


<?php
   }
  }
  
}
?>
</section>
<div class="line"></div>
  

</div>





            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
              <script src="js/scrip.js" ></script> 
</body>
</html>