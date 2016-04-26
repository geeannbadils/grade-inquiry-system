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

$in=$_SESSION["grad"];
$s_number=$_SESSION["student_input"];
$subject_code=$_SESSION["subject_code"];

		mysqli_query($con,"INSERT INTO student_grade VALUES ('$s_number','$subject_code','$in')");
		header("location:faculty.php")
		

?>

