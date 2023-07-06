<?php
session_start();
include ('../includes/config.php');
$id = $_GET['ID'];
if(!(isset($_SESSION['username'])))
{
	die();
}
$username=$_SESSION['username'];
$getID = "";
$sql="SELECT id FROM student_profile where username='$username'";
if($result = mysqli_query($db_found, $sql)){
    
        while($row = mysqli_fetch_array($result))
		{
			$getID=$row['id'];
			
        }
        
        mysqli_free_result($result);
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_found);
}

$info="";
$sql = "Select * FROM student_project_info WHERE id=$id";

	if($result = mysqli_query($db_found, $sql)){
    
        while($row = mysqli_fetch_array($result))
		{
			$info=$row['info'];
		   
        }
        
        mysqli_free_result($result);
	}

else
{
	die('Could not delete record:' .mysqli_error());
}
// Close connection
//mysqli_close($db_found);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Student | Student Teacher Portal
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-normal">
          Student
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./student.php">
              <i class="material-icons">person</i>
              <p>Profile</p>
            </a>
          </li>
		   <li class="nav-item ">
            <a class="nav-link" href="./synopsis.php">
              <i class="material-icons">content_paste</i>
              <p>Synopsis</p>
            </a>
          </li>
		   <li class="nav-item active">
            <a class="nav-link" href="./projectinfo.php">
              <i class="material-icons">content_paste</i>
              <p>Project Info</p>
            </a>
          </li>
		  <li class="nav-item ">
            <a class="nav-link" href="./schedule.php">
              <i class="material-icons">content_paste</i>
              <p>Schedule</p>
            </a>
          </li> 
		  <li class="nav-item ">
            <a class="nav-link" href="./task.php">
              <i class="material-icons">bubble_chart</i>
              <p>Task</p>
            </a>
          </li>	 		 
		     
          <li class="nav-item ">
            <a class="nav-link" href="../logout.php">
              <i class="material-icons">unarchive</i>
              <p>Log-Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="coordinatorlist.php">Project Information</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#"></a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="admin.php">Profile</a>
                  <a class="dropdown-item" href="admin.php">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
		
		<div class="row">
            <div class="col-md-12" >
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Information</h4>
                  <p class="card-category">view project information</p>
                </div>
                <div class="card-body">
                  <form method='post' action=''>			  
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">information</label>
							<textarea class="form-control" rows="5" name="instruction" ><?php echo $info; ?></textarea>
					 </div>
                      </div>
					  </div>
					 
					 
                 
                   
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
		
   	  
		  		  
        </div>
      </div>
     
    </div>
  </div>
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="assets/js/plugins/arrive.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="assets/js/plugins/chartist.min.js"></script>
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script src="assets/demo/demo.js"></script>
 </body>
</html>
