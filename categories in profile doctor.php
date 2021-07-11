<?php
session_start();
include "read/cat_read.php";
include "read/read_cat_doc_profile.php";


if(isset($_POST['submit']))
{
    $name =   $_POST['name'];
    echo $name;
      $que="SELECT id FROM categories WHERE name='$name' ";
      
		$run_que=mysqli_query($conn,$que);
      $row = mysqli_fetch_assoc($run_que);
    $category_id=$row['id'];
     $doctor_id=  $_SESSION['doctor_id'];
    // Attempt insert query execution
    $insert = "INSERT INTO doc_cat (category_id, doctor_id) VALUES ('$category_id', '$doctor_id') ";
  
    if(mysqli_query($conn, $insert)){
        echo  "Records added successfully.";
    } 
        else
    {
        echo "ERROR: Could not able to execute  " . mysqli_error($conn);
    }
    
    
} 
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
         <div class="card  mt-5" style="position: relative;
	top: 100px;">
            <div class="card-body">
               <h2 class="card-title"> categories</h2>
               
               <button id="myAdd" type="submit" class="btn btn-outline-primary ">all categories</button>
               <a class="btn btn-primary" href="form%20new%20categories.php"> add new category</a>
            </div>
         </div>
    

            <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST" style="position: relative;
	top: 120px;">
                
                <div class="form-group">
                    <select class="form-control" name="name">
                        <option>Please select category</option>
                        <?php foreach($run_query as $key => $value){ ?>
                          <option value="<?= $value['name'];?>"><?= $value['name']; ?></option> 
                        <?php } ?>
                    </select>
                    <button class="btn submit mt-3" type="submit"> submit</button>
               <button class="btn btn-danger  mt-3" type="submit"> Reset</button>
                </div>
                        </div>
                </div>
              </div>
            </form>
      </div>
      
      <?php if (mysqli_num_rows($run_sql)) { ?>
      <table class="table table-bordered mt-5 w-75" style="display: none;position: relative;
	top: 120px " id="myTable">
         <thead>
            <tr>
               <th scope="col"></th>
               <th scope="col">category-name </th>
            </tr>
         </thead>
         <tbody>
         <?php 
			  	   $i = 0;
			  	   while($row_cat = mysqli_fetch_assoc($run_sql)){
			  	   $i++;
			  	 ?>
            <tr>
                <th scope="row"><?php echo $i ; ?></th>
               <th scope="row" style="text-transform:capitalize"><?php echo $row_cat['name'] ; ?></th>
               
        
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