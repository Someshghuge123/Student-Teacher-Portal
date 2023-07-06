<?php
session_start();
if(!(isset($_SESSION['username'])))
{
	die();
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
<br>
	<div class="">
		<div class="row">
			<div class="col-md-4 bg-transparent">
				<h2 class="bg-warning text-light text-center" style="border-radius: 15px;">President Thought:</h2>
				<ul class="text-light"><br>
					<li>It does not matter how slow you go as you do not stop.</li>
					<br><br>
					<li>Success is when your"Signature"changes to "Autograph".</li>
					<br><br>
					<li>Suffering is the essence of success.</li>
					<br><br>
					<li>END  is not END means Effort Never Dies.</li>

				</ul>
			</div>

			<div class="col-md-8 text-light " style="background: url(../images/ws.jpg);background-size:cover; height:650Px;">
				
			<h3 class="bg-warning text-light text-center" style="border-radius: 25px;" font-size="18px";>Weekly Schedule:</h>


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