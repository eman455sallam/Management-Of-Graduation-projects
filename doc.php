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
      <div class="form">
         <form class=" send-proposal " style="position: absolute;
            top: -450px;
            margin: auto;
            font-size:120px;
            text-align: center;
            width:800px;
            padding: 50px;
            text-align: center;
            border: 3px solid  #065f9f;
		    margin-bottom:50px"id="myForm">
            <div class="form-group">
               <label for="exampleInputEmail1">Project name</label>
               <input type="text" class="form-control" id="exampleInputname" placeholder="Enter project name">
            </div>
			 <div class="form-group">
               <label for="exampleInputEmail1">Description of the project </label>
               <textarea placeholder="Enter your Description" class="form-control"></textarea>
            </div>
			 <div class="form-group">
               <label for="exampleInputEmail1">Names </label>
               <textarea placeholder="Enter names of your team" class="form-control"></textarea>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Link of proposal</label>
               <input type="text" class="form-control"   placeholder="Enter link of proposal ">
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #065f9f;
               color: #fff;" class="toggle">send</button>
         </form>
      </div>
	   
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/myjs.js"></script>
   </body>
</html>