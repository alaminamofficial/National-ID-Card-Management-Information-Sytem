<?php
require_once("header_footer.php");
require_once("db.php");
PageHeader("National ID List");


?>
<script type="text/javascript">
		function checknum(a)
			{
				for(var i=0;i<a.length;i++)
				{
					if(isNaN(a[i])) 
					{
						alert("NID MUST BE NUMBERS!");
						document.getElementById("nidkey").value = "";
						return false;
					}
				}
				return true;
			}

		function idd()
			{
				var uid = checknum(document.getElementById("nidkey").value);
			}
		function iddd()
			{
				if(document.getElementById("nidkey").value.length != 17)
				{
					alert("Nid must be 17 digits");
					document.getElementById("nidkey").value = "";
				}
			}

</script>
<?php
$searchtable = "
<form action=\"index1.php\" method=\"post\">
<table align= \"center\">
	<tr>	
		<td> NID: </td>		
		<td><input type=\"text\" name=\"nidkey\" id=\"nidkey\" placeholder = \"Search..\" onkeyup=\"idd()\" onblur=\"iddd()\" maxlength=\"17\"/></td>		
	</tr>
	<tr>	
		<td> Name: </td>		
		<td><input type=\"text\" name=\"nkey\" placeholder = \"Search..\" /></td>		
	</tr>
	<tr>
		<td> Blood Group: </td>		
		<td><select name=\"bgkey\">
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
		<td> Age: </td>
		<!--<td><input type=\"number\" name=\"agekey\" placeholder = \"Search..\" min=\"1\" max=\"99\"/></td>-->
		<td><select name=\"agekey\">
				<option value=\"\">Select Age range</option>
				<option value=\"1\">15-24</option>
				<option value=\"2\">25-34</option>
				<option value=\"3\">35-44</option>
				<option value=\"4\">45-54</option>
				<option value=\"5\">55-64</option>
				<option value=\"6\">65-74</option>
				<option value=\"7\">75-84</option>
				<option value=\"8\">85-94</option>
				<option value=\"9\">95-104</option>
				</select></td>	
	</tr>
	<tr>
		<td> Gender: </td>	
		<td><select name=\"gkey\" id=\"gkey\">
				<option value=\"\">Select Gender</option>
				<option value=\"1\">Male</option>
				<option value=\"2\">Female</option>
			</select></td>
	<tr>		
		<td>
			<div></div>
		</td>
		<td>
			<input type=\"submit\" name=\"Submit\"  value=\"Search\" align = \"centre\"/>	
		</td>	
	</tr>
	<tr>
		<td><div></div></td>
		<td>
			<a href=\"reg1.php\">Register??</a>
		</td>
	</tr>	
</table>
</form>";
echo $searchtable;

if(isset($_POST["Submit"]))
{
	$nidkey = trim($_POST["nidkey"]);
	$nkey = trim($_POST["nkey"]);
	$bgkey = trim($_POST["bgkey"]);
	$agekey = trim($_POST["agekey"]);
	$gkey = trim($_POST["gkey"]);
	//$option = trim($_POST["search"]);
	
	if($agekey == 1)
				{
					$ar1 = 15;
					$ar2 = 24;
				}
				
				else if($agekey == 2)
				{
					$ar1 = 25;
					$ar2 = 34;
				}
				else if($agekey == 3)
				{
					$ar1 = 35;
					$ar2 = 44;
				}
				else if($agekey == 4)
				{
					$ar1 = 45;
					$ar2 = 54;
				}
				else if($agekey == 5)
				{
					$ar1 = 55;
					$ar2 = 64;
				}
				else if($agekey == 6)
				{
					$ar1 = 65;
					$ar2 = 74;
				}
					
				else if($agekey == 7)
				{
					$ar1 = 75;
					$ar2 = 84;
				}
				else if($agekey == 8)
				{
					$ar1 = 85;
					$ar2 = 94;
				}
				else if($agekey == 9)
				{
					$ar1 = 95;
					$ar2 = 104;
				}
	
	if($nidkey != "")
	{
		$q = "select * from user where Nid='$nidkey' ";
	}
	else
	{
		
		//echo "<script type='text/javascript'>alert('inside no nid')</script>";
		if($agekey == "" && $bgkey == "" && $gkey == "")
		{
			$q = "select * from user where Name LIKE '%$nkey%' ";
		}
		else if($nkey == "" && $bgkey == "" && $gkey == "")
		{
			$q = "select * from user where Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else if($agekey == "" && $nkey == "" && $gkey == "")
		{
			$q = "select * from user where Blood_Group='$bgkey' ";
		}
		else if($agekey == "" && $bgkey == "" && $nkey == "")
		{
			$q = "select * from user where Gender='$gkey' ";
		}
		else if($agekey == "" && $nkey == "")
		{
			$q = "select * from user where Gender ='$gkey' AND Blood_Group = '$bgkey' ";
		}
		else if($bgkey == "" && $gkey == "")
		{
			$q = "select * from user where Name LIKE '%$nkey%' AND Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else if($nkey == "" && $gkey == "")
		{
			$q = "select * from user where Blood_Group= '$bgkey' AND Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else if($agekey == "" && $bgkey == "")
		{
			$q = "select * from user where Gender='$gkey' AND Name LIKE '%$nkey%' ";
		}
		else if($agekey == "" && $gkey == "")
		{
			$q = "select * from user where Name LIKE '%$nkey%' AND Blood_Group= '$bgkey' ";
		}
		else if($nkey == "" && $bgkey == "")
		{
			$q = "select * from user where Gender='$gkey' AND Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else if($gkey == "")
		{
			$q = "select * from user where Name LIKE '%$nkey%' AND Blood_Group= '$bgkey' AND Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else if($bgkey == "")
		{
			$q = "select * from user where Name LIKE '%$nkey%' AND Gender= '$gkey' AND Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else if($nkey == "")
		{
			$q = "select * from user where Gender='$gkey' AND Blood_Group= '$bgkey' AND Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else if($agekey == "")
		{
			$q = "select * from user where Name LIKE '%$nkey%' AND Blood_Group= '$bgkey' AND Gender='$gkey' ";
		}
		else if($agekey != "" && $bgkey != "" && $gkey != "" && $nkey != "")
		{
			$q = "select * from user where Name LIKE '%$nkey%' AND Blood_Group= '$bgkey' AND Gender='$gkey' AND Age BETWEEN ".$ar1." AND ".$ar2;
		}
		else
			echo "<script type='text/javascript'>alert('No Search option Selected')</script>";
		
	}
	
	$rs = mysql_query($q);
	$searchResult = "
	<table width=\"100%\" border=\"1\">
		
		<tr>
			<td>SL No.</td>
			<td>Name</td>
			<td>Gender</td>
			<td>Father's Name</td>
			<td>Mother's Name</td>
			<td>Date Of Birth</td>
			<td>Age</td>
			<td>Blood Group</td>
			<td>NID</td>
			<td>Image</td>
		</tr>";	
		$count=0;
			while($d = mysql_fetch_assoc($rs))
			{
				$count++;
				$n="images/".$d["Image"];
				if($d["Gender"] == 1)
				{
					$gen = "Male";
				}
				else if ($d["Gender"] == 2)
					$gen = "Female";
				
				if($d["Blood_Group"] == 1)
				{
					$bg = "A+";
				}
				else if($d["Blood_Group"] == 2)
					$bg = "A-";
				else if($d["Blood_Group"] == 3)
					$bg = "AB+";
				else if($d["Blood_Group"] == 4)
					$bg = "AB-";
				else if($d["Blood_Group"] == 5)
					$bg = "B+";
				else if($d["Blood_Group"] == 6)
					$bg = "B-";
				else if($d["Blood_Group"] == 7)
					$bg = "O+";
				else if($d["Blood_Group"] == 8)
					$bg = "O-";
				
				
	$searchResult .= "
				<tr>
					<td>".$count."</td>
					<td>".$d["Name"]."</td>
					<td>".$gen."</td>
					<td>".$d["Fathers_Name"]."</td>
					<td>".$d["Mothers_Name"]."</td>
					<td>".$d["Date_of_Birth"]."</td>
					<td>".$d["Age"]."</td>
					<td>".$bg."</td>
					<td>".$d["Nid"]."</td>
					<td width= \"100\" height=\"100\">
							<img src = ".$n." height= \"100\" width= \"100\">
					</td>
				</tr>";
			}
		$searchResult .= "</table>";
		echo $searchResult;
	
}

else
{
	$q = "select * from user";
	$rs = mysql_query($q);
	$allResult = "
	<table width=\"100%\">
		<tr>
			<td valign=\"top\" width=\"25%\">";

			while($d = mysql_fetch_assoc($rs))
			{ 
				$n="images/".$d["Image"];
				if($d["Gender"] == 1)
				{
					$gen = "Male";
				}
				else
					$gen = "Female";
				
				if($d["Blood_Group"] == 1)
				{
					$bg = "A+";
				}
				else if($d["Blood_Group"] == 2)
					$bg = "A-";
				else if($d["Blood_Group"] == 3)
					$bg = "AB+";
				else if($d["Blood_Group"] == 4)
					$bg = "AB-";
				else if($d["Blood_Group"] == 5)
					$bg = "B+";
				else if($d["Blood_Group"] == 6)
					$bg = "B-";
				else if($d["Blood_Group"] == 7)
					$bg = "O+";
				else 
					$bg = "O-";
		
		$allResult .= "
				<table width = \"700\" border = \"1\">
					<tr>
						<td width= \"175\" height=\"200\">
							<img src = ".$n." height= \"200\" width= \"175\">
						</td>
						<td>Name: ".$d["Name"]."<br>Gender: ".$gen."<br>Father's Name: ".$d["Fathers_Name"]."<br>Mother's Name: ".$d["Mothers_Name"]."<br>Date of Birth: ".$d["Date_of_Birth"]."<br>Blood Group: ".$bg."<br>NID: ".$d["Nid"]."
						</td>
					</tr>	
				</table>";
			}
}
		$allResult .= "
			</td>
		</tr>
	</table>";
	
	echo $allResult;


PageFooter();

?>