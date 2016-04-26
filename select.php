<?php
include "connect.php";
include "session.php";
if(isset($_SESSION["class_number"]))
{
	$num=$_SESSION["class_number"];
	$sql=mysqli_query($con,"SELECT * FROM login WHERE class_number='$num'");
				$row=mysqli_fetch_array($sql);
			if($row['class']=='S')
				header("location:student.php");
			if($row['class']=='T')
				header("location:faculty.php");
}

if(isset($_POST['submit']))
{
	$prof_num=$_SESSION["prof_no"];
	$sub=$_POST['SUBJECT'];
	$sec=$_POST['section'];
	$year=$_POST['year'];

	$sql="SELECT * FROM student where s_section='$sec' and s_year='$year'";
	$insert=mysqli_query($con,$sql);
	while($ty=mysqli_fetch_array($insert))
	{
		$student_no=$ty['s_number'];
		mysqli_query($con,"INSERT into prof VALUES ('','$prof_num','$sub','$student_no')");
		header("location:index.php");
	}
}

?>
<!DOCTYPE html>
<html>
<title></title>
<head><link rel="stylesheet" href="css/addsubject.css" type="text/css"  /></head>
<body>
<div class="content3">
			<img src="images/hg.png"/>
			<p>Add Student</p>

								<form method="POST">
									<select name="SUBJECT">
									<?php
									$prof_no=$_SESSION["prof_no"];
									$h = mysqli_query($con,"SELECT * FROM prof_subject where prof_no='$prof_no'");
									while($tr=mysqli_fetch_array($h))
									{
       										echo "<option>".$tr['prof_subject']."</option>";
									}
									?>
									</select>
						
									
									<select name="section">
										<option>GE</option>3
										<option>GF</option>
									</select>
									<select name="year">
									<option>I</option>
									<option>II</option>
									<option>III</option>
									<option>IV</option>
									<option>V</option>
									</select>
									<input type="submit" name="submit" value="submit">
									</form>

</div>
</body>
</html>