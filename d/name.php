<?php
$connect = mysqli_connect("localhost", "root", "", "ebils");
$number = count($_POST["name"]);
$numbers = count($_POST["fname"]);
$cname=$_POST['cname'];
if($number > 1||$numbers > 1)
{
	for($i=0; $i<$number; $i++)
		for($i=0; $i<$numbers; $i++)
	{
		if(trim($_POST["name"][$i] != '')||trim($_POST["fname"][$i] != ''))
		{
				$sql = "INSERT INTO tbl_name(name,fname) VALUES('".mysqli_real_escape_string($connect,$_POST["name"][$i])."','".mysqli_real_escape_string($connect,$_POST["fname"][$i])."')";
			mysqli_query($connect, $sql);
		}
	}
	$sql = "INSERT INTO pestcontrol(cname) VALUES('".mysqli_real_escape_string($connect,$_POST["cname"])."')";
			mysqli_query($connect, $sql);
	{
	echo "Data Inserted";
}
}
else
{
	echo "Please Enter Name";
}

?>