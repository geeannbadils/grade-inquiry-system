<!DOCTYPE html>
<html>
<title>FACULTY</title>
<head><link rel="stylesheet" href="css/faculty.css" type="text/css"  /></head>
<body>
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
			if($row['class']=='A')
				header("location:index.php");
}
if(isset($_POST['export']))
{
$_SESSION['subcode_export2']=@$_POST['sub_code'];
$_SESSION['section_export2']=@$_POST['section'];
    header("location:export2.php");

}
$class_number=$_SESSION['class_number'];
?>


<h1>COMPUTER ENGINEERING</h1>
<div class="prof">
			<img src="images/hg2.png"/>
			<?php
			$profile = mysqli_query($con,"SELECT * FROM prof_profile where prof_no='$class_number'");
			while($prof=mysqli_fetch_array($profile))
			{
			?>
			<p>Engr. <?php echo $prof['prof_name']; ?></p>
			<?php
			}
			?>
					<div class="all">
								<form method="POST">
									<select name="sub_code">
									<!--selecting the prof subject table to know what are the subjects handled by the teacher, the subjects will appear on the option menu -->
									<?php
									$h = mysqli_query($con,"SELECT * FROM prof_subject where prof_no='$class_number'");
									while($tr=mysqli_fetch_array($h))
									{

									?>
       									<option> <?php echo $tr['prof_subject']; ?> </option>
       								 <?php
									}
									?>
									</select>
									<select name="section">
										<option value="GE">GE</option>
										<option value="GF">GF</option>
									</select>
									<button name="view">View</button>
									<button name="export">Export</button>
									</form>
									<table>

									    	<tr>
									    		<th>Student Number</th>
            									<th>Student Name</th>
									            <th>Section</th>
									             <th>Subject</th>
									            <th>Grades</th>
    										</tr>
    								<!--after chooosing the subject and section, the students that are taking the subjects will appear by clicking the view button  -->

									<?php
									if(isset($_POST['submit']))
									{
	
										$_SESSION["grad"]=$_POST['grade'];
  										 $_SESSION["student_input"]=$_POST['student_no'];
   										 header("location:input.php");

									}
									
									if(isset($_POST['view']))
									{
										$subject_code=$_POST['sub_code'];
										$_SESSION['subject_code']=$subject_code;
										$section=$_POST['section'];
										$sql = mysqli_query($con,"SELECT * FROM prof where prof_no='$class_number' AND subject_code='$subject_code'");/* Selecting the prof table, to know what are the subjects that the teacher handled */
											while($row=mysqli_fetch_array($sql))
											{
												$s_number=$row['s_number'];
												$test=mysqli_query($con,"SELECT * FROM student where s_number='$s_number'  AND s_section='$section'");/*Select student table to get the section of the student */
												$check=mysqli_num_rows($test);
													if($check!=0)
													{
														while($row1=mysqli_fetch_array($test))
														{
																$test1="SELECT * FROM student_grade where subject_code='$subject_code' AND s_number='$s_number'";/* selecting the student grade table to view the grades that the teacher input */
																$grade_test=mysqli_query($con,$test1);


															
																?>						
																<form method="POST">
																<tr>
																<td><input type="text" name="student_no" value="<?php echo $row1['s_number']; ?>" readonly></td>
													        	<td><?php echo $row1['s_name']; ?></td> 
													            <td><?php echo $row1['s_section']; ?></td>
													             <td><?php echo $subject_code; ?></td>
													            <td align="center">
													            <?php 
													            /*if the teacher already input a grade it will appear on the screen*/
													            if(mysqli_num_rows($grade_test)>0)
													            {
													            	$row3=mysqli_fetch_array($grade_test);
													            	echo "".$row3['grade']."";
													            	echo "</form>";  
													            	echo "</tr>";
													            }
													           else
													           {
													            echo "<select name='grade'>";
													            
													            	/* IF THERE'S NO GRADE INPUTED THERE'S A OPTION WHERE YOU WILL CHOOSE A GRADE THEN IT WILL GO TO THE ISSET[SUBMIT] */
																	$grade = mysqli_query($con,"SELECT * FROM grade");
																	while($tr=mysqli_fetch_array($grade))
																	{
																	
													           			echo "<option> ".$tr['grade']."</option>";
													          	
													            	}
													            	 echo "</select>";
													            	
													            	echo"<input type='submit' name='submit' value='Input'></input></td>"; 
													            	echo"</form>"; 
													            	echo "</tr>";
													          
													            }
														}	
													}
												}
											}
													?>

												
    								</table>

    										<div class="out">
    										<form method="POST">
											<button name="logout">Logout</button>
											</form>
											
								
					</div>
	</div>
</body>
</html>