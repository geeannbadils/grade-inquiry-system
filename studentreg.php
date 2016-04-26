<?php
include "connect.php";
include"session.php";
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
?>
<!DOCTYPE html>
<html>
<title>Student Registration Form</title>
<head><link rel="stylesheet" href="css/register.css" type="text/css"  /></head>
<body>
<div class="content3">
			<img src="images/hg.png"/>
			<p>REGISTRATION FORM (STUDENT)</p>
								<form method="POST">
									<input type="text" name="student_user"  class="user" placeholder="Username"></input>
									<input type="password" name="student_pass"  class="pass" placeholder="Password"></input>
									<input type="text" name="class"  class="class" placeholder="Class"></input><br><br>
									<input type="text" name="student_number" class="number" placeholder="Student Number"></input><br>
									<input type="text" name="student_name"  class="bigname" placeholder="Name"></input><br>
									<input type="text" name="student_semester"  class="sameline" placeholder="Semester"></input>
									<input type="text" name="student_year"  class="sameline" placeholder="Year"></input>
									<input type="text" name="student_section"  class="sameline" placeholder="Section"></input>							
									<input type="text" name="student_gender"  class="sameline" placeholder="Gender"></input><br>
									<input type="text" name="student_contact"  class="line2" placeholder="Contact No."></input><br>
									<input type="text" name="student_email"  class="line3" placeholder="E-mail Address"></input><br>
									<input type="text" name="student_address"  class="line4" class="long" placeholder="Address"></input><br>
									<input type="text" name="student_guardian"  class="line5" placeholder="Guardian Name"></input><br>
									<input type="text" name="student_guardian_contact" class="line6" placeholder="Guardian Contact No."></input><br><br>
									<button name="register" class="addbutton">Add Record</button>
									<?php
									$username=@$_POST['student_user'];
									$pw=@$_POST['student_pass'];
									$class=@$_POST['class'];
									$student_number=@$_POST['student_number'];
									$student_name=@$_POST['student_name'];
									$student_year=@$_POST['student_year'];
									$student_sem=@$_POST['student_sem'];
									$student_section=@$_POST['student_section'];
									$student_gender=@$_POST['student_gender'];
									$student_contact=@$_POST['student_contact'];
									$student_email=@$_POST['student_email'];
									$student_address=@$_POST['student_address'];
									$student_guardian=@$_POST['student_guardian'];
									$student_guardian_contact=@$_POST['student_guardian_contact'];
									$register=@$_POST['register'];

									if(isset($register))
									{
										/* SELECTING THE LOGIN TABLE TO CHECK IF THE REGISTERED USERNAME EXIST*/
										$reg=mysqli_query($con,"SELECT * FROM login WHERE username='".$username."'");
										$count=mysqli_num_rows($reg);
											
												if($count>0)
												{
													echo "Username exists!" ;
												}
												else
												{
													/* INSERTING THE VALUES INTO LOGIN AND STUDENT TABLE */
													mysqli_query($con,"INSERT INTO login values ('$student_number','$username','$pw','$class')");
													mysqli_query($con,"INSERT INTO student VALUES ('$student_number','$student_name','$student_year','$student_sem','$student_section','$student_gender','$student_contact','$student_email','$student_address','$student_guardian','$student_guardian_contact')") ;
													echo "<br><br>New account added successfully";
													header("location:index.php");
												}
											}
											
									
									?>
									

								</form>
					</div>
			</div>
	</div>
</body>
</html>