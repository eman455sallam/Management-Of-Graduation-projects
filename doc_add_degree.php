<?php  

include('inc\db_connection.php');
include_once('inc\validation.php'); 


 
$error='';
$success='';

if(isset($_GET['id'])){
 // $_SESSION['id'] =$_GET['id'];

  $id = validate($_GET['id']);

	$query = "SELECT * FROM projects WHERE id=$id";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query) > 0) {
    	$row = mysqli_fetch_assoc($run_query);
    }else {
    	header("Location: myprojects.php");
    }



}elseif (isset($_POST['submit'])){
  
   

	$sup_grades = validate($_POST['sup_grades']);
	$grade = validate($_POST['grade']);
    $id = validate($_POST['id']);

  

	if (empty($sup_grades)) {
        echo "no grade";
	}else if (empty($grade)) {
        echo "no no grade";

	}
    else if ($sup_grades  &&  $grade )
  {
    
      if(check_numeric($grade))
       {
               
       $sql = "UPDATE projects
               SET sup_grades='$sup_grades', grade='$grade',
               WHERE id=$id ";
                

                 $result = mysqli_query($conn, $sql);
                 if ($result) {
                     }
                     echo "success";

              
        } else {
           echo "error=name must be string";
        }        
       
      }else {
   	echo "error=unknown error occurred";
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
   <!-- start navbar -->
   <!--
   <nav class="navbar navbar-expand-lg navbar-light ">
         <div class="container">
        <a class="navbar-brand" href="#">Management  <span class="">Of Graduation Projects</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link  " href="categories in profile doctor.php">categories <span class="sr-only">(current)</span></a>
            </li>
      
            <li class="nav-item ">
               <a class="nav-link  " href="proposal in profile doctor.php">New Proposals <span class="sr-only">(current)</span></a>
            </li>
          
           
          </ul>
       
        </div>
         </div>
         <li class="nav-item log">
              <a class="nav-link log "  href="index.php">Log out</a>
            </li>
      </nav> -->
      <!--end Navbar-->

<?php if ($error) { ?>
		   <div class="alert alert-danger text-center" role="alert">
			  <?php echo $error; ?>
		    </div>
		   <?php } ?>
<?php if ($success) { ?>
		   <div class="alert alert-success text-center" role="alert">
			  <?php echo $success; ?>
		    </div>
		   <?php } ?>

      <div class=" form">
    
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="send-proposal" style="position: absolute;
            top: -400px;
            margin: auto;
            text-align: center;
            width:800px;
            padding: 50px;
            text-align: center;
            border: 3px solid  #065f9f;
		    " id="myForm">
            <div class="form-group">
               <label for="exampleInputEmail1">Supervisor grades</label>
               <input  type="text" name="sup_grades"value="<?php echo $row['sup_grades']  ?>"
                class="form-control" id="exampleInputname" >

            </div>
           
            <div class="form-group">
               <label for="exampleInputEmail1">Grade</label>
               <input type="text" name="grade" value="<?php echo $row['grade']  ?>"
                class="form-control"   >
                <input type="hidden" value="<?php echo $id; ?>" name="id" >

            </div>
            
            <button type="submit" name="submit"class="btn btn-primary" style="background-color: #065f9f;
               color: #fff;" class="toggle">add</button>
         </form>
      </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>