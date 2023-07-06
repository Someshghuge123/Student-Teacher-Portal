<?php
session_start();
include ('../includes/config.php');

if(!(isset($_SESSION['username'])))
{
	die();
}
$username=$_SESSION['username'];
$studentName="";
$studentEmail="";
$sql = "SELECT * FROM student_profile where username='$username'";
if($result = mysqli_query($db_found, $sql)){
    
        while($row = mysqli_fetch_array($result))
		{
			$studentName=$row['name'];
			$studentEmail=$row['email'];
           
        }
        
        mysqli_free_result($result);
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_found);
}
 

?>
<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<style>

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}
</style>
</head>
<body>
<div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
		<br>
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="color:FFFFFF">
                  <b>
                        Students Menu
                 </b>
                </li>
                <li>
                    <a href="profile.php">Profle</a>
                </li>
                <li>
                    <a href="synopsis.php">Synopsis</a>
                </li>
                <li>
                    <a href="project.php">Project</a>
                </li>
                <li>
                    <a href="schedule.php">Schedules</a>
                </li>
                <li>
                    <a href="task.php">Tasks</a>
                </li>
                <li>
                    <a href="../logout.php">Log Out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
       	<section class="container-fluid">

	<div class="">
		<div class="row">
			<div class="col-md-12 text-light " style="background: url(../images/ws.jpg);background-size:cover; height:650Px;">
			<h3 class="bg-warning text-light text-center" style="border-radius: 25px;" font-size="18px";>Profile :</h3>
				<div class="modal-content">
					<div class="modal-body">						
					<form method='post' action=''>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input class="form-control" name='name' type = 'text' placeholder="Student Name" value="<?php echo $studentName;?>"/>
					  </div>
					  <div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class="form-control" name = 'email' type = 'email' placeholder="Email Address" value="<?php echo $studentEmail; ?>"/>          
					  </div>
					   <div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class="form-control" name = 'oldpassword' type = 'password' placeholder="Old password" value=""/>          
					  </div>
					  <div class="form-group input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input class="form-control" type="password" name = 'newpassword' placeholder="New password" value=""/>     
					  </div>
				   
					  <div class="form-group">
						<input type="submit" name="submit" class="btn btn-def bg-warning" value="Upload Profile" />
							
					</div>
					</form>    
					</div>
				  </div>
			
			
			
			
			</div>
		
			
		</div>
	</div>
	</section>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$stud_name=$studentName;
	$name=$_POST['name'];
	$email=$_POST['email'];
	$oldpassword=$_POST['oldpassword'];
	$password=$_POST['newpassword'];
	if(($oldpassword == "") OR ($password == "") )
	{
	$sql2 = "UPDATE student_profile SET name='$name',email='$email' where username='$stud_name'";
	mysqli_query($db_found,$sql2);
	}
	else
	{
		if($oldpassword==$password)
		{
			
			$sql2 = "UPDATE student_profile SET name='$name',email='$email', password='$password' WHERE username='$stud_name'";
			mysqli_query($db_found,$sql2);
			
		}
		else{
			echo "Password Does Not Match";
		}
	}
}
?>