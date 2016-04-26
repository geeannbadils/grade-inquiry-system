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
	
		if(isset($_POST['save']))
		{
			$student_number=@$_POST['student_number'];
			$student_name=@$_POST['student_name'];
			$student_sem=@$_POST['student_sem'];
			$student_year=@$_POST['student_year'];
			$student_section=@$_POST['student_section'];
			$student_gender=@$_POST['student_gender'];
			$student_contact=@$_POST['student_contact'];
			$student_email=@$_POST['student_email'];
			$student_address=@$_POST['student_address'];
			$student_guardian=@$_POST['student_guardian'];
			$student_guardian_contact=@$_POST['student_guardian_contact'];

				/* UPDATING the student table */									


				$up="UPDATE student SET s_name='$student_name',s_sem='$student_sem',s_year='$student_year', s_section='$student_section' ,s_gender='$student_gender',s_contact='$student_contact',s_email='$student_email',s_address='$student_address',s_guardianname='$student_guardian',s_guardiancontact='$student_guardian_contact' where s_number='$student_number'";
				$res=mysqli_query($con,$up);
					if(mysqli_affected_rows($con)>0)
						{
							echo "<BR>File has been updated.";
							header("location:index.php");
						}
					else
						{
							echo "<BR>No file has been updated.";
							header("location:index.php");
						}
				
		}
										
			/* to fetch the student infos to be viewed on the input */					 	
	$edit=$_SESSION['student_edit'];

	    $sql=mysqli_query($con,"SELECT * FROM student WHERE s_number='$edit'");
		$row=mysqli_fetch_array($sql);
	
	?>
<!DOCTYPE html>
<html>
<title>Student Registration Form</title>
<head><link rel="stylesheet" href="css/register.css" type="text/css"  /></head>
<body>
<div class="content3">
			<img src="images/hg.png"/>
			<p>EDIT FORM (STUDENT)</p>
								<form method="POST">
									<input type="text" name="student_number" class="number" readonly="yes" VALUE="<?php echo $row['s_number']; ?>"></input><br>
									<input type="text" name="student_name"  class="bigname" VALUE="<?php echo $row["s_name"]; ?>"></input><br>
									<input type="text" name="student_sem"  class="sameline" VALUE="<?php echo $row["s_sem"]; ?>"></input>
									<input type="text" name="student_year"  class="sameline" VALUE="<?php echo $row["s_year"]; ?>"></input>
									<input type="text" name="student_section"  class="sameline" VALUE="<?php echo $row["s_section"]; ?>"></input>						
									<input type="text" name="student_gender"  class="sameline" VALUE="<?php echo $row["s_gender"]; ?>"></input><br>
									<input type="text" name="student_contact"  class="line2" VALUE="<?php echo $row["s_contact"]; ?>"></input><br>
									<input type="text" name="student_email"  class="line3" VALUE="<?php echo $row["s_email"]; ?>"></input><br>
									<input type="text" name="student_address"  class="line4" class="long" VALUE="<?php echo $row["s_address"]; ?>"></input><br>
									<input type="text" name="student_guardian"  class="line5" VALUE="<?php echo $row["s_guardianname"]; ?>"></input><br>
									<input type="text" name="student_guardian_contact" class="line6" VALUE="<?php echo $row["s_guardiancontact"]; ?>"></input><br><br>
									<button name="save" class="addbutton">SAVE</button>
								</form>
	</div>
</body>
</html>