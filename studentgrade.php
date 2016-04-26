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
$class_number=$_SESSION['class_number'];


?>
<!DOCTYPE html>
<html>
<title>Student</title>
<head><link rel="stylesheet" href="css/studentgrade.css" type="text/css"  /></head>
<body>
<h1>COMPUTER ENGINEERING</h1>
	<div class="content">
		<div class="sidebar">
				<img src="images/icon5.png"  />
				<form action="student.php" method="POST">
				<button name="profile">PROFILE</button>
				</form>
				<form action="studentsubject.php" method="POST">
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
			<p class="text">SUBJECTS GRADE</p>
			<form method="post" action="export.php">
				<button name="export" >Export</button>

				<?php
				if(isset($_POST['export']))
				{
					header("location:export.php");
				}
				?>
			</form>
							<table>
								<tr>
									<td>Subject Code</td>
									<td>Grade</td>
								</tr>
								<!-- -->
								<?php
									$grade="SELECT * FROM student_grade where s_number = '$class_number' ";
									$sql=mysqli_query($con,$grade);
									$row=mysqli_fetch_array($sql);
									$code=$row['subject_code'];
									$grade=$row['grade'];
									
									$g = mysqli_query($con,"SELECT * from student_grade where s_number = '$class_number' ");
									while($tr=mysqli_fetch_array($g))
									{
								?>
        						<tr>
        							<td><?php echo $tr[1]; ?></td>
        							<td><?php echo $tr[2]; ?></td>
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