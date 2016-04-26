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
<head><link rel="stylesheet" href="css/student.css" type="text/css"  /></head>
<body>
<h1>COMPUTER ENGINEERING</h1>
	<div class="content">
		<div class="sidebar">
			<img src="images/icon5.png" />
				
				<form action="student.php" method="POST">
				<button name="profile">PROFILE</button>
				</form>
				<form action="studentsubject.php" method="POST">
				<button name="subjects">SUBJECTS</button>
				</form>
				<form action="studentgrade.php" method="POST">
				<button name="grades">GRADES</button>
				</form>
				<form method="POST">
				<button name="logout">LOGOUT</button>
				</form>
				<!--selecting the student table to fetch the info's of the student -->
				<?php
					$class_number=$_SESSION['class_number'];
					$sql=mysqli_query($con,"SELECT * FROM student WHERE s_number='$class_number'");
					$row=mysqli_fetch_array($sql);
				?>
									
		</div>
			<div class="content2">
				<img src="images/hg2.png"/>
			<p class="text">STUDENT PROFILE</p>
				<form method="POST">
					Student No.<input type="text" name="student_number" readonly="yes" class="number" value=" <?php echo $row["s_number"]; ?>"></input><br>
					Name<input type="text" name="student_name" readonly="yes" class="bigname" value="<?php echo $row["s_name"]; ?>"></input><br>
					Year&nbsp&nbsp&nbsp<input type="text" name="student_year" readonly="yes" class="sameline" value="<?php echo $row["s_year"]; ?>"></input>&nbsp&nbsp&nbsp&nbsp&nbsp
					Section<input type="text" name="student_section" readonly="yes" class="sameline1" value="<?php echo $row["s_section"]; ?>"></input>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp					
					Gender<input type="text" name="student_gender" readonly="yes" class="sameline2" value="<?php echo $row["s_gender"]; ?>"></input><br>
					Contact No.<input type="text" name="student_contact" readonly="yes" class="line2" value="<?php echo $row["s_contact"]; ?>"></input><br>
					E-mail Address<input type="text" name="student_email" readonly="yes" class="line3" value="<?php echo $row["s_email"]; ?>"></input><br>
					Address<input type="text" name="student_address" readonly="yes" class="line4"  value="<?php echo $row["s_address"]; ?>"></input><br>
					Guardian Name<input type="text" name="student_guardian" readonly="yes" class="line5" value="<?php echo $row["s_guardianname"]; ?>"></input><br>
				Contact No.<input type="text" name="student_guardian_contact" readonly="yes" class="line6" value="<?php echo $row["s_guardiancontact"]; ?>"></input>
				</form>
			</div>
	</div>

</body>
</html>