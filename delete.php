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
$delete=$_SESSION['student_delete'];
/*USING THE SESSION CLASS NUMBER,  IF YOU CLICK THE DELETE BUTTON THE STUDENT ACCOUNT WILL BE DELETED */


		$dele="DELETE FROM student where s_number='$delete'";
		$res=mysqli_query($con,$dele);
			
		if(mysqli_affected_rows($con)>0)
		{
		echo "File has been deleted.";
		header("location:index.php");
			}
			else{
				echo "No file has been deleted.";
				header("location:index.php");
				}

?>