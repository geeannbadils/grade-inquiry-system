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
?>
<!DOCTYPE html>
<html>
<title>Teacher Registration Form</title>
<head><link rel="stylesheet" href="css/facultyreg.css" type="text/css"  /></head>
<body>
<div class="content3">
			<img src="images/hg.png"/>
			<p>REGISTRATION FORM (Teacher)</p>

								<form method="POST">
									<input type="text" name="prof_number" class="number" placeholder="Prof Number"></input><br>
									<input type="text" name="prof_name"  class="name" placeholder="Name"></input><br>
									<?php
									$prof_number=@$_POST['prof_number'];
									$prof_name=@$_POST['prof_name'];

									$register=@$_POST['register'];

									if(isset($register))
									{
										/*SELECTING THE PROF PROFILE TABLE IF THE USER ALREADY EXIST */
										$reg=mysqli_query($con,"SELECT * FROM prof_profile WHERE prof_no='$prof_number'");
										$count=mysqli_num_rows($reg);
											if(($prof_number!="")&&($prof_name!=""))
											{
												if($count>0)
												{
													echo "Already Exists!" ;
												}
												else
												{
														/* INSERT THE VALUES INTO PROF PROFILE*/
													mysqli_query($con,"INSERT INTO prof_profile VALUES ('$prof_number','$prof_name')") ;
													echo "New account added successfully";
													header("location: index.php");
												}
											}
											else
											{
												echo "Please fill up the empty field";
											}
									}

									?>

									<button name="register" class="addbutton">Add Record</button>
									</form>


</div>
</body>
</html>