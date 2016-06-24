<?php
require_once("header_footer.php");
require_once("db.php");
PageHeader("Successful Entry");

	$uname = $_SESSION["name"];
	$fname = $_SESSION["fname"];
	$mname = $_SESSION["mname"];
	$dob = $_SESSION["dob"];
	$bgroup = $_SESSION["bgroup"];
	$nid = $_SESSION["nid"];
	$img= $_SESSION["image"];
	$gen= $_SESSION["gender"];

	$s= "images/".$img;
	if($gen == 1)
	{
		$gender = "Male";
	}
	else
		$gender = "Female";
	
	if($bgroup == 1)
	{
		$bg = "A+";
	}
	else if($bgroup == 2)
		$bg = "A-";
	else if($bgroup == 3)
		$bg = "AB+";
	else if($bgroup == 4)
		$bg = "AB-";
	else if($bgroup == 5)
		$bg = "B+";
	else if($bgroup == 6)
		$bg = "B-";
	else if($bgroup == 7)
		$bg = "O+";
	else 
		$bg = "O-";



	
$viewtable = "<table width=\"800\" >";
$viewtable .= "
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<img src=".$s." height= \"200\" width= \"175\" border=\"1\">
						</td>
					</tr>
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td valign=\"top\" width=\"25%\">
						
							<table border= \"1\" height = \"200\" width = \"620\">
								<tr>
									<td>
									Name: ".$uname."
									</td>
								</tr>
								<tr>
									<td>
										Gender: ".$gender."
									</td>
								</tr>
								<tr>
									<td>
										Father's Name: ".$fname."
									</td>
								</tr>
								<tr>
									<td>
										Mother's Name: ".$mname."
									</td>
								</tr>
								<tr>
									<td>
										Date Of Birth: ".$dob."
									</td>
								</tr>
								<tr>
									<td>
										Blood Group: ".$bg."
									</td>
								</tr>
								<tr>
									<td>
										NID: ".$nid."
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
	<a href= index1.php> GO Back To Home Page</a>";
echo $viewtable;
PageFooter();
?>