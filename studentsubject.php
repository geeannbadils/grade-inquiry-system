<?php

include "connect.php";
include "session.php";
if(isset($_SESSION["class_number"]))
{
	$num=$_SESSION["class_number"];
	$sql=mysqli_query($con,"SELECT * FROM login WHERE class_number='$num'");
				$row=mysqli_fetch_array($sql);
			if($row['class']=='T')
				header("location:faculty.php");
			if($row['class']=='A')
				header("location:index.php");
}
if(!isset($_SESSION["class_number"]))
header("location:login.php");


$class_number=$_SESSION['class_number'];

?>
<!DOCTYPE html>
<html>
<title>Student</title>
<head><link rel="stylesheet" href="css/grade.css" type="text/css"  /></head>
<body>
<h1>COMPUTER ENGINEERING</h1>
	<div class="content">
		<div class="sidebar">
				<img src="images/icon5.png" />
				<form action="student.php" method="POST">
				<button name="profile">PROFILE</button>
				</form>
				<form action="studentsubjects.php" method="POST">
				<button name="subjects">SUBJECTS</button>
				</form>
				<form action="studentgrade.php" method="POST">
				<button name="grades">GRADES</button>
				</form>
				<form action="student.php" method="POST">
				<button name="logout">LOGOUT</button>
				</form>
			</ul>
		</div>
			<div class="content2">
			<img src="images/hg2.png"/>
			<p class="text">SUBJECTS CURRENTLY ENROLLED</p>
				
							<table>
								<tr>
									<td>Subject Code</td>
									<td>Subject Description</td>
									<td>Semester</td>
									<td>Year</td>
								</tr>
								<!-- Selecting the student table to know the semester and year of the student after knowing the year and semester , select the subject table to determine what are the subjects that the student is currently enrolled with the use of the semester and year   -->
								<?php
									$sub="SELECT * FROM student where s_number='$class_number' ";
									$sql=mysqli_query($con,$sub);
									$row=mysqli_fetch_array($sql);
									$sem=$row['s_sem'];
									$year=$row['s_year'];
									
									$i = mysqli_query($con,"SELECT * from subject where subject_semester='$sem' AND subject_year='$year'");
									while($tr=mysqli_fetch_array($i))
									{
									?>
        						<tr>
        							<td><?php echo $tr[0]; ?></td>
            						<td><?php echo $tr[1]; ?></td>
            						<td><?php echo $tr[2]; ?></td>
           							<td><?php echo $tr[3]; ?></td>
           						</tr>
       								<?php
									}
									?>
							</table>
					
			</div>
		</div>
	</div>



</body>
</html>