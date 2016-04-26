<?php
include"connect.php";
include "session.php";
					$filename = "studentlist.xls"; // File Name
												 
				// Download file
				header("Content-Disposition: attachment; filename=\"$filename\""); 
				header("Content-Type: application/vnd.ms-excel");
												 
			// Write data to file
				echo "\t\t Student Number \t\tName \t\t Section \t\t Course \t\t Grade \n";
				$subject_code=$_SESSION['subcode_export2'];
				$class_number=$_SESSION['class_number'];
				$section=$_SESSION['section_export2'];
				$sql = mysqli_query($con,"SELECT * FROM prof where prof_no='$class_number' AND subject_code='$subject_code'");
				while($row=mysqli_fetch_array($sql))
				{
					$s_number=$row['s_number'];
					$test=mysqli_query($con,"SELECT * FROM student where s_number='$s_number'  AND s_section='$section'");
					$check=mysqli_num_rows($test);
					if($check!=0)
					{
						$flag = false;
						while($row1=mysqli_fetch_array($test))
						{
							$test1="SELECT * FROM student_grade where subject_code='$subject_code' AND s_number='$s_number'";
							$grade_test=mysqli_query($con,$test1);
							echo "\t\t".$row1['s_number']."\t\t";
							echo $row1['s_name']."\t\t";
							echo $section."\t\t";
							echo $subject_code."\t\t";								   					
							if(mysqli_num_rows($grade_test)>0)
							{
							$row3=mysqli_fetch_array($grade_test);
							echo $row3['grade']."\n";
			  			}
			  			else
			  			{
							echo "no grade \n";
		          }	   
						}
				  }
				}
?>
