		
<?php
include"connect.php";
include "session.php";


												$filename = "list.xls"; // File Name
												 
												// Download file
												header("Content-Disposition: attachment; filename=\"$filename\""); 
												header("Content-Type: application/vnd.ms-excel");
												 
												// Write data to file
												$flag = false;
												$h = mysqli_query($con,"SELECT * FROM student");
												while($tr=mysqli_fetch_array($h)) 
												{
												    if(!$flag) 
												    {
												      // display field/column names as first row
												      echo implode("\t", array_keys($tr)) . "\r\n";
												      $flag = true;
												    }
												    else
												    {

												    echo "\t".$tr['s_number'] . "\t";
												    echo $tr['s_name'] . "\t\t";
												    echo $tr['s_sem'] . "\t\t";
												    echo $tr['s_year'] . "\t\t";
												    echo $tr['s_section'] . "\t\t";
												    echo $tr['s_gender'] . "\t\t";
												    echo $tr['s_contact'] . "\t\t";
												    echo $tr['s_email'] . "\t\t";
												    echo $tr['s_address'] . "\t\t";
												    echo $tr['s_guardianname'] . "\t\t";
												    echo $tr['s_guardiancontact'] . "\n";
													}
												  
												}
										

								

?>