<?php
$id = $_GET['ID'];

include('../includes/config.php');

$sql = "SELECT * FROM student_synopsis WHERE id=$id";
if($result = mysqli_query($db_found, $sql)){
while ($row=mysqli_fetch_array($result))
{
	
                    
                   
                    $filename=$row['path'];
					echo $row['path'];
                   

                    
// Print headers

//header("Content-Disposition: attachment; filename=\\"'../'$filename\\"");
 
                   
}
}
else
{
	die('Could not delete record:' .mysqli_error());
}
?>