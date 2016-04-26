<?php

include "connect.php";
include "session.php";
if(isset($_SESSION["class_number"]))
{
	$num=$_SESSION["class_number"];
	$sql=mysqli_query($con,"SELECT * FROM login WHERE class_number='$num'");
				$row=mysqli_fetch_array($sql);
			if($row['class']=='T')
				header("location:faculty.php");
			if($row['class']=='A')
				header("location:index.php");
}
$class_number=$_SESSION['class_number'];


?>

						

								<?php
								require("fpdf/fpdf.php");
									$pdf=new FPDF();
									
									
									$pdf->AddPage('p','LEGAL');
									$pdf->SetTitle('GRADE');

									
									$pdf->SetFont('Times','',12);	
									$pdf->Cell(0,20,'',0,1,'C');
									$pdf->SetFont('Times','B',12);	
									$pdf->Cell(0,5,'Southern Luzon State University',0,1,'C');
									$pdf->SetFont('Times','',12);
									$pdf->Cell(0,5,'Lucban, Quezon',0,1,'C');
									$pdf->Ln(5);

									$pdf->SetFont('Times','',20);
									$pdf->Cell(0,5,'List  Of Your Grade',0,1,'C');
									$pdf->Ln(5);

									$pdf->SetFont('Times','',14);
								     $pdf->Ln(5);
								    $pdf->Cell(100,15,"Subject Code",0,0,'C');
								    $pdf->Cell(80,15,"Grade",0,0,'C');
								    $pdf->Ln(10);
									$grade="SELECT * FROM student_grade where s_number = '$class_number' ";
									$sql=mysqli_query($con,$grade);
									while($tr=mysqli_fetch_array($sql))
									{
								
        						
       								
       									$pdf->SetFont('Times','',14);
									    $pdf->Cell(100,15,$tr[1],0,0,'C');
									    $pdf->Cell(80,15,$tr[2],0,0,'C');
									    $pdf->Ln(10);
									   

     
 										$pdf->SetFont('Times','',9);
 										
									
								
									}
									$pdf->Output();
									?>

							</table>
					
			</div>
		</div>
	</div>



</body>
</html>