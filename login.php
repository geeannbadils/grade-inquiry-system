<?php 
include"connect.php";
session_start();
if(isset($_SESSION["class_number"]))
{
	$num=$_SESSION["class_number"];
	$sql=mysqli_query($con,"SELECT * FROM login WHERE class_number='$num'");
				$row=mysqli_fetch_array($sql);
			if($row['class']=='S')
				header("location:student.php");
			if($row['class']=='T')
				header("location:faculty.php");
			if($row['class']=='A')
				header("location:index.php");
}
?>

<html>
<title>Login</title>
<head><link rel="stylesheet" href="css/login.css" type="text/css"  /></head>

<body>

<div class="header">
		<img src="images/logo.png" /><h2>COMPUTER ENGINEERING<br>(Grade Inquiry System)</h2><br>
		<hr>
</div>
<div class="all">
	<div class="box">
		<p>LOGIN HERE!</p>
		<form method="POST">

				<input required="required"type="text" name="username" placeholder="Username"><br><br>
				<input required="required"type="password" name="password" placeholder="Password"><br><br>
				<button name="login">Login</button>
				<?php
				

$login=@$_POST['login'];

if(isset($login))
{

		$user=@$_POST['username'];
		$pw=@$_POST['password'];
		$sql=mysqli_query($con,"SELECT * FROM login WHERE username='$user'");
		$count=mysqli_num_rows($sql);
		if($count==0){
			echo"<br><br>User does not exist";
		}
		else
		{
			$row=mysqli_fetch_array($sql);
			$check=$row["password"];
			
			if($check==$pw)
			{
				
				$sql=mysqli_query($con,"SELECT * FROM login WHERE username='$user'");
				$row=mysqli_fetch_array($sql);
				$_SESSION['class_number']=$row['class_number'];
					if($row['class']=='A')
					{
						header("location: index.php");					
					}
					if($row['class']=='T')
					{
						header("location: faculty.php");					
					}	
					if($row['class']=='S')
					{
						header("location: student.php");					
					}					
					
		
			}
			else
			{	
				echo "<br><br>Wrong Password";
			}

		}

}
?>
			</form>
	</div>
</div>
</body>
</html>