<?php
session_start();
include ('../includes/config.php');
$id=$_GET['ID'];

if(!(isset($_SESSION['username'])))
{
	die();
}
$username=$_SESSION['username'];
$class="";
$year="";
$teacher="";
$date="";
 	  $sql = "SELECT * FROM classes where id='$id'";
if($result = mysqli_query($db_found, $sql)){
    
        while($row = mysqli_fetch_array($result))
		{
			$class=$row['class'];
			$year=$row['year'];
			$teacher=$row['teacher'];
			$date=$row['date'];
		}
}

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
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-3.jpg">
     
    <div class="logo">
        <a href="dashboard.php" class="simple-text logo-normal">
          Student
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="./classes.php">
              <i class="material-icons">dashboard</i>
              <p>Classes</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./calender.php">
              <i class="material-icons">content_paste</i>
              <p>Calender</p>
            </a>
          </li><hr>
		   <li class="nav-item ">
            <a class="nav-link" href="./todo.php">
              <i class="material-icons">content_paste</i>
              <p>Todo</p>
            </a>
          </li>
		  
		  <li class="nav-item ">
            <a class="nav-link" href="./task.php">
              <i class="material-icons">bubble_chart</i>
              <p>Task</p>
            </a>
          </li>	 		 
		     
          <li class="nav-item active-pro">
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
     <nav class="navbar navbar-light navbar-expand-md bg-light justify-content-center">
    <a href="/" class="navbar-brand mr-0">Logo</a> 
    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
        <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item">
                <a class="nav-link" href="./stream.php">Stream <span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./classroom.php">ClassRoom</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./people.php">People</a> 
            </li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
            <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-facebook mr-1"></i></a> </li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-twitter"></i></a> </li>
        </ul>
    </div>
</nav>
      <!-- End Navbar -->
	  <div class="content">
        <div class="container-fluid">
		  <div class="row">
		   <div class="col-md-12">
              <div class="card card-chart">
                
                <div class="card-body card-header-warning">
                  <h4 class="card-title">Class Name : <?php echo $class; ?></h4>
                  <p class="card-category">
				  <p class="card-category">
                    <span class="text-success"></span> Class Year: <?php echo $year; ?></p>
					<p class="card-category">
                    <span class="text-success"></span>Teacher Name : <?php echo $teacher; ?></p>
				
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> Class Created On : <?php echo $date; ?>
                  </div>
                </div>
              </div>
            </div>
		</div>
	  <div class="row">
			     <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-primary">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Teacher Notices</h4>
            
                </div>
                <div class="card-footer">
                  <div class="stats">
                   												  			  	  <?php
	  $sql = "SELECT * FROM notice where class_id='$id'";
if($result = mysqli_query($db_found, $sql)){
    
        while($row = mysqli_fetch_array($result))
		{ ?>
<span class="text-success"><i class="fa fa-long-arrow-up"></i> <?php echo $row['description']; ?> </span> 
			<?php
		}
}		?>	
                  </div>
                </div>

              </div>
            </div>
		  
				<div class="col-md-8">
				
			  </div> 
			  
			  <!-- uploaded notes -->
			  	  <?php
	  $sql = "SELECT * FROM notes where class_id='$id'";
if($result = mysqli_query($db_found, $sql)){
    
        while($row = mysqli_fetch_array($result))
		{
$id3=$row['id'];			?>
	<div class="col-md-4">
	</div>
			  				<div class="col-md-8">
							<a href="../teacher/<?php echo $row['path']; ?>" target="_blank">
					  <div class="card card-chart">
						
						<div class="card-body">
						 <div class="stats">
							<i class="material-icons"></i>
					<img src="../teacher/<?php echo $row['path']; ?>" height="100" width="100" <br>
					<?php $trimmed = str_replace('upload/', '', $row['path']) ;
					?>
					<a class="btn btn-info" href="../teacher/<?php echo $row['path']; ?>" target="_blank"><?php echo $trimmed ;?>
										<i class="halflings-icon white edit"></i>  
									</a>
						  </div>
						 
						</div>
						<div class="card-footer">
						  <p class="card-category">
							<span class="text-success"><i class="fa fa-long-arrow-up"></i> <?php echo $row['description']; ?> </span> 
							</p>
						  </a>
	
							
							
							
						</div>
						<form action="" method="post">
							<label > Comment </label>
							<input type="text" name="comment">
							<input type="hidden" name="id3" value="<?php echo $id3; ?>">
							<input type="submit" name="submit">
							</input>
							</form>
														Comments						  			  	  
								<?php
									$getAdd = mysqli_fetch_assoc(mysqli_query($db_found, "SELECT comment FROM notes where id='$id3'"));
										$comment = $getAdd['comment'];
									?>

<span class="text-success"><i class="fa fa-long-arrow-up"></i> <?php echo $comment; ?> </span> 
	
					  </div>
					
			 

			  </div> 
		<?php }
}

?>
<?php 
						if(isset($_POST['submit']))
						{
							$comment=$_POST['comment'];
							$id4=$_POST['id3'];
							$SQL = "UPDATE notes SET comment='$comment' where id='$id4'";
						mysqli_query($db_found,$SQL);
						}
						 ?>
			  
			  
			  
			  <!-- end uploade notes -->
			  
			  

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
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="assets/js/plugins/chartist.min.js"></script>
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script src="assets/demo/demo.js"></script>

</body>

</html>
