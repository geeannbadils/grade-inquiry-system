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

if(isset($_POST['add']))
{
    $_SESSION["prof_no"]=$_POST['prof_no'];
    header("location:add.php");

}
if(isset($_POST['add2']))
{
    $_SESSION["prof_no"]=$_POST['prof_no'];
    header("location:select.php");

}
if(isset($_POST['edit'])){
$_SESSION['student_edit']=$_POST['student_no'];;
    header("location:edit.php");

}
if(isset($_POST['delete'])){
$_SESSION['student_delete']=$_POST['student_no'];
    header("location:deleterecord.php");

}
if(isset($_POST['export'])){
$_SESSION['student_export']=$_POST['student_no'];
    header("location:export1.php");

}

$logout=@$_POST['logout'];
if(isset($logout)){
    session_unset();
    session_destroy();
    header("location: login.php");
}

 ?>


<!DOCTYPE>
<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="css/adminpage.css" />

</head>
<body>
<h1>GRADE INQUIRY SYSTEM</h1>
    
        <div class="add">
            
            <form method="POST" action="facultyreg.php">
                <button name="addteacher"> Add Teacher Record </button>
            </form>
            <form method="POST" action="studentreg.php">
                <button name="addStudent"> Add Student Record </button>
            </form>
        </div>
        <div class="button">
        <form method="POST" >
                <button name="export" class="logout">Export</button>
            </form>
         <form method="POST" >
                <button name="logout" class="logout"> Logout </button>
            </form>
        </div>
        
   <div class="table"> 
	<table>
    	<tr>
            <th>Student No.</th>
            <th>Student Name</th>
            <th>Semester</th>
            <th>Year</th>
            <th>Section</th>
            <th>Gender</th>
            <th>Option</th>
    	</tr>
        <?php
			/* SELECTING THE STUDENT TABLE TO BE VIEWED ON THE TABLE ON THE WEBSITE */
			$h = mysqli_query($con,"SELECT * FROM student");
			while($tr=mysqli_fetch_array($h))
			{
		?>
        <form method="POST">
        <tr>
        	<td><input name="student_no" value="<?php echo $tr[0]; ?>" readonly></td>
            <td><?php echo $tr[1]; ?></td>
            <td><?php echo $tr[2]; ?></td>
            <td><?php echo $tr[3]; ?></td>
            <td><?php echo $tr[4]; ?></td>
            <td><?php echo $tr[5]; ?></td>
            <td align="center"><input type="submit" name="delete" value="Delete" > <input type="submit" name="edit" value="Edit" > </td>    
        </tr>
        </form>
        <?php
			}
		?>
     </table>
   </div>
   <div class="table2">
   <table>
        <tr>
            <th>Prof Number</th>
            <th>Prof Name</th>
            <th>Option</th>
        </tr>
        <?php
            
            $prof = mysqli_query($con,"SELECT * FROM prof_profile");
            while($tr=mysqli_fetch_array($prof))
            {
        ?>
        <form method="POST">
        <tr>
            <td><input name="prof_no" value="<?php echo $tr[0]; ?>" readonly></td>
            <td><?php echo $tr[1]; ?></td>
            <td align="center"><input type="submit" name="add" value="Add Subject" ><input type="submit" name="add2" value="Add Student" ></td>    
        </tr>
        </form>
        <?php
            }
        ?>
     </table>
     </div>

</body>
</html>
