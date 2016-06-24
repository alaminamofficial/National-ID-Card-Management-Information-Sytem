<?php
require_once("header_footer.php");
require_once("db.php");
PageHeader("National ID Form");
?>


<script type="text/javascript">
		function checknum(a)
			{
				for(var i=0;i<a.length;i++)
				{
					if(isNaN(a[i])) 
					{
						alert("NID MUST BE NUMBERS!");
						document.getElementById("nid").value = "";
						return false;
					}
				}
				return true;
			}

		function idd()
		{
			var uid = checknum(document.getElementById("nid").value);
			
		}
		function iddd()
		{
			if(document.getElementById("nid").value.length != 17)
			{
				alert("Nid must be 17 digits");
				document.getElementById("id").value = "";
			}
		}

</script>
<?php

//upload image in directory
function upload_img()
{
    if (file_exists("images/" . $_FILES["image"]["name"])){
        echo "<script type='text/javascript'>alert('Name already exists')</script>";
    }
    else{
         move_uploaded_file($_FILES["image"]["tmp_name"],"images/"  . $_FILES["image"]["name"]);
    }
}

if(isset($_POST["Submit"]))
{
	$uname = trim($_POST["name"]);
	$fname = trim($_POST["fname"]);
	$mname = trim($_POST["mname"]);
	$dob = trim($_POST["dob"]);
	$bgroup = trim($_POST["bGroup"]);
	$nid = trim($_POST["nid"]);
	$gender = trim($_POST["gender"]);
	$imSize = 100000;
	 
    $age = (date('Y') - date('Y',strtotime($dob)));
    //echo "<script type='text/javascript'>alert('".$age."')</script>";

	//convert date of birth	
	$day= substr($dob,8,2);
	$mon= substr($dob,5,2);
	$year= substr ($dob,0,4);

	switch($mon)
	{
		case "01":
				$mon="JAN";
				break;
		case "02":
				$mon="FEB";
				break;
		case "03":
				$mon="MAR";
				break;
		case "04":
				$mon="APR";
				break;
		case "05":
				$mon="MAY";
				break;
		case "06":
				$mon="JUN";
				break;
		case "07":
				$mon="JUL";
				break;
		case "08":
				$mon="AUG";
				break;
		case "09":
				$mon="SEP";
				break;
		case "10":
				$mon="OCT";
				break;
		case "11":
				$mon="NOV";
				break;
		case "12":
				$mon="DEC";
				break;
	}
	$dob= $day." ".$mon." ".$year;
	echo "<script type='text/javascript'>alert('".$dob."')</script>";
//input field validation	
	if($uname == "")
	{
		$unameErr = "* Name can not be left empty";
		echo "<script type='text/javascript'>alert('".$unameErr."')</script>";
	}
		
	else if(!(preg_match("/^[a-zA-Z ]*$/", $uname)))
	
	{
		$unameErr = "* Name can contain only characters and white space";
		echo "<script type='text/javascript'>alert('".$unameErr."')</script>";
	}
	if($fname == "")
	{
		$fnameErr = "* Father's name can not be left empty";
		echo "<script type='text/javascript'>alert('".$fnameErr."')</script>";
	}
		
	else if(!(preg_match("/^[a-zA-Z ]*$/", $fname)))
	
		{
			$unameErr = "* Name can only characters and white space";
			echo "<script type='text/javascript'>alert('".$fnameErr."')</script>";
		}
	
	if($mname == "")
	{
		$mnameErr = "* Mother's name can not be left empty";
		echo "<script type='text/javascript'>alert('".$mnameErr."')</script>";
	}
		
	
	else if(!(preg_match("/^[a-zA-Z ]*$/", $fname)))
	
		{
			$unameErr = "* Name can only characters and white space";
			echo "<script type='text/javascript'>alert('".$fnameErr."')</script>";
		}
	
	if($dob == "")
	{
		$dobErr = "* Date of Birth can not be left empty";
		echo "<script type='text/javascript'>alert('".$dobErr."')</script>";
	}
	if($gender == "")
	{
		$gErr = "* Gender can not be left empty";
		echo "<script type='text/javascript'>alert('".$gErr."')</script>";
	}
	
	if($bgroup == "")
	{
		$bgroupErr = "* Blood Group can not be left empty";
		echo "<script type='text/javascript'>alert('".$bgroupErr."')</script>";
	}
	if($nid == "")
	{
		$nidErr = "* Nid can not be left empty";
		echo "<script type='text/javascript'>alert('".$nidErr."')</script>";
	}
	
//image upload
	
	if(isset($_FILES['image']))
        {
			if($imSize < $_FILES["image"]["size"])
			{
				echo "<script type='text/javascript'>alert('Image Size too large, Please Choose an Image of 100 Kb or below')</script>";
				$imgError="error";
			}
			else
				upload_img();
		}
     else
        {
            echo "<script type='text/javascript'>alert('no image found')</script>";
			$imgError="error";
        }

//Insert into DB

	if(@$unameErr == "" && @$fnameErr == "" && @$mnameErr == "" && @$dobErr == "" && @$bgroupErr == "" && @$nidErr == "" && @$imgError == "" && @$gErr == "")
	{
		$n=  $_FILES["image"]["name"];
		//$uname= mysql_real_escape_string($uname);
		$q = "insert into user(Name, Fathers_Name, Mothers_Name, Date_of_Birth,Blood_Group,Age,Gender,Nid,Image) values('$uname','$fname','$mname','$dob','$bgroup','$age','$gender','$nid','$n')";
		$r = mysql_query($q);
		if($r)
		{
			echo "<script type='text/javascript'>alert('Successfully saved data')</script>";
			$_SESSION["name"] = $uname;
			$_SESSION["fname"] = $fname;
			$_SESSION["mname"] = $mname;
			$_SESSION["dob"] = $dob;
			$_SESSION["bgroup"] = $bgroup;
			$_SESSION["nid"] = $nid;
			$_SESSION["image"] = $n;
			$_SESSION["gender"] = $gender;
			
			header('Location: view1.php');
		}
			
		else
		{
			echo "<script type='text/javascript'>alert('Error!')</script>";
			//header('Location: view1.php');
		}
			
	}
	
}




$regtable = "
<fieldset>
<legend>Form</legend>
<form action=\"reg1.php\" method=\"post\" name=\"form\" enctype=\"multipart/form-data\">
<table align=\"center\">
	<tr>
		<th align=\"right\">Name :</th>
		<td><input type=\"text\" name=\"name\"/></td>
	</tr>
	<tr>
		<th align=\"right\">Father's Name :</th>
		<td><input type=\"text\" name=\"fname\" /></td>
	</tr>
	<tr>
		<th align=\"right\">Mother's Name :</th>
		<td><input type=\"text\" name=\"mname\" /></td>
	</tr>
	<tr>
		<th align=\"right\">Gender :</th>
		<td><select name=\"gender\" id=\"gender\">
				<option value=\"\">Select Gender</option>
				<option value=\"1\">Male</option>
				<option value=\"2\">Female</option>
				
				
				</select></td>
	</tr>
	<tr>
		<th align=\"right\">Date Of Birth :</th>
		<td><input type=\"date\"  name=\"dob\" /></td>
	</tr>
	<tr>
		<th align=\"right\">Blood Group :</th>
		<td><select name=\"bGroup\">
				<option value=\"\">Select Group</option>
				<option value=\"1\">A+</option>
				<option value=\"2\">A-</option>
				<option value=\"3\">AB+</option>
				<option value=\"4\">AB-</option>
				<option value=\"5\">B+</option>
				<option value=\"6\">B-</option>
				<option value=\"7\">O+</option>
				<option value=\"8\">O-</option>
				</select></td>
	</tr>
	<tr>
		<th align=\"right\">NID :</th>
		<td><input type=\"text\" name=\"nid\" id=\"nid\" onkeyup=\"idd()\" onblur=\"iddd()\" maxlength=\"17\"/></td>
	</tr>
	<tr>
		<th align=\"right\">Upload Image :</th>
		<td>
			<input type=\"file\" name=\"image\" accept=\"image/jpeg\"/>
			<font size= \"2\">*Maximum 1000kb</font>
		</td>
	</tr>
	<tr>
		<th align=\"right\">&nbsp;</th>
		<td>
			<input type=\"submit\" name=\"Submit\" value=\"Submit\" />
		</td>
	</tr> 
	<tr>
		<td><a href= \"index1.php\">Go Back To Home Page</a></td>
	</tr>
</table>
</form>
</fieldset>";

echo $regtable;

PageFooter();


?>