<?php
session_start();
include ('../includes/config.php');

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
// Close connection
//mysqli_close($db_found);
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
			<h3 class="bg-warning text-light text-center" style="border-radius: 25px;" font-size="18px";>Synopsis :</h3>
				<div class="modal-content">
					<div class="modal-body">
						<form method='post' action='' enctype="multipart/form-data">
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<label style="color:000000">Upload Synopsis</label>
								<input type="file" class="btn btn-def" name="file" id="file"/>
							</div>

							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-def bg-warning" value="Upload Synopsys" />
							</div>
						</form>
					</div>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Date</th>
								   <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								
							$sql = "SELECT * FROM student_synopsis where student_id='$getID'";
							//	$result=mysqli_query($db_found,$sql); //rs.open sql,con
							if($result = mysqli_query($db_found, $sql)){
							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['date']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td class="center">
									<a class="btn btn-info" href="edit_supplier.php?sID=<?php echo $row['id']; ?>">View
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirmDel()" href="delete_supplier.php?delID=<?php echo $row['id'];?>">
									Delete	<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							}else{
										echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_found);
									}
							?>
						  </tbody>
					  </table>  
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
$stud_id=$getID;
$file=$_FILES['file'];
$name = $file['name'];
$path = "upload/" . basename($name);
if (move_uploaded_file($file['tmp_name'], $path)) {
	$sql2 = "INSERT INTO student_synopsis (student_id,path) VALUES ('$stud_id','$path')";
	mysqli_query($db_found,$sql2);
	header("Location: synopsis.php");
    // Move succeed.
} else {
	echo "Error in uploading photo";
    // Move failed. Possible duplicate?
}
}
?>
