<?php
error_reporting(0);
session_start();
function PageHeader($title)
{
$pageheader="

	<html>
		<head>
			<title>.$title.</title>
		</head>
		<body>
		<table width=\"800\" align=\"center\">
		<tr>
			<td>
				<div align=\"center\">
					<h1>.$title.</h1>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<hr />
				<br />";

echo $pageheader;

}
function PageFooter()
{
$pagefooter="
			<br />
			<hr />
		</td>
	</tr>
	<tr>
		<td>
			<div align=\"center\"><i>Copyright 2016, EDUSMART</i></div>
		</td>
	</tr>
	</table>
	</body>
	</html>";
echo $pagefooter;

}
?>
