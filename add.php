<?php
include "session.php";

include "connect.php";
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

		$prof=$_SESSION["prof_no"];

		if(isset($_POST['add']))
		{
			$sub=$_POST['subject'];
			mysqli_query($con,"INSERT INTO prof_subject VALUES ('$prof','$sub')");
			header("location:index.php");

		}
		
?>

<!DOCTYPE html>
<html>
<title>Teacher Registration Form</title>
<head><link rel="stylesheet" href="css/facultyreg.css" type="text/css"  /></head>
<body>
<div class="content3">
			<img src="images/hg.png"/>
			<p>Add Subject</p>

			<form method="POST" >
				<select name="subject">
				 <?php
			 /*SELECTING THE SUBJECT TABLE , THEN THE SUBJECT CODE WILL BE ECHO USING OPTION*/
				$sub = mysqli_query($con,"SELECT * FROM subject");
				while($tr=mysqli_fetch_array($sub))
				{
				?>
	      			<option> <?php echo $tr ['subject_code']; ?> </option>
				<?php
		   		}
				?>
				</select>
				<input type="submit" name="add">
									
			</form>
</div>
</body>
</html>
							
