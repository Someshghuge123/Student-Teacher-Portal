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
			<h3 class="bg-warning text-light text-center" style="border-radius: 25px;" font-size="18px";>Schedules :</h3>
				<div class="modal-content">
					<div class="modal-body">
						<form  method='post' action=''>
						<table style="table-layout:fixed;" class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
								  <th style="width: 150px">Req. Gathering</th>
								   <th style="width: 150px">Analysis</th>
								  <th style="width: 150px">Planing</th>
								  <th style="width: 150px">Designing</th>
								  <th style="width: 150px">Coding</th>
								  <th style="width: 150px">Testing</th>
								  <th style="width: 150px">Complete</th>
								  
							  </tr>
						  </thead>
						  <tbody >
							<!--open of while -->
							<tr>
								<td style="width: 150px"><input style="width: 130px" type="date" name="req_gathering"></td>
								<td style="width: 150px"><input style="width: 130px" type="date" name="analysis"></td>
								<td style="width: 100px"><input style="width: 130px" type="date" name="planning"></td>
								<td style="width: 100px"><input style="width: 130px" type="date" name="designing"></td>
								<td style="width: 100px"><input style="width: 130px" type="date" name="coding"></td>
								<td style="width: 100px"><input style="width: 130px" type="date" name="testing"></td>
								<td style="width: 100px"><input style="width: 130px" type="date" name="complete"></td>
								
							
							</tr>

						  </tbody>
					  </table> 
					  <div class="form-group">
								<input type="submit" name="submit" class="btn btn-def bg-warning" value="Upload Project Schedules" />
							</div>
						</form>
						<p style="color:#000000"><b>Note :</b> Student Have to re-selecte all schedule date.Only one phase date selection is not acceptable</p> 
						</div>
						</div></br>
						<div class="modal-content">
					<div class="modal-body">
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
									<th class="bg-warning">Last Updated Date</th>
								  <th>Req. Gathering</th>
								   <th>Analysis</th>
								  <th>Planing</th>
								  <th>Designing</th>
								  <th>Coding</th>
								  <th>Testing</th>
								  <th>Complete</th>
								  
							  </tr>
						  </thead>
						  <tbody>
							<?php
								
							$sql = "SELECT * FROM student_project_schedule where student_id='$getID'";
							//	$result=mysqli_query($db_found,$sql); //rs.open sql,con
							if($result = mysqli_query($db_found, $sql)){
							while ($row=mysqli_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td class="bg-warning"><?php echo $row['date']; ?></td>
								<td><?php echo $row['requirement_gathering']; ?></td>
								<td><?php echo $row['analysis']; ?></td>
								<td><?php echo $row['planning']; ?></td>
								<td><?php echo $row['designing']; ?></td>
								<td><?php echo $row['coding']; ?></td>
								<td><?php echo $row['testing']; ?></td>
								<td><?php echo $row['complete']; ?></td>
							
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
	$req_gathering=$_POST['req_gathering'];
	$planning=$_POST['planning'];
	$analysis=$_POST['analysis'];
	$designing=$_POST['designing'];
	$coding=$_POST['coding'];
	$testing=$_POST['testing'];
	$complete=$_POST['complete'];
	$sql2 = "INSERT INTO student_project_schedule (student_id,requirement_gathering,analysis,planning,designing,coding,testing,complete) VALUES ('$stud_id','$req_gathering','$analysis','$planning','$designing','$coding','$testing','$complete')";
	mysqli_query($db_found,$sql2);
}
?>
