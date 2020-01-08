<?php require_once('../Connections/ebils.php'); ?>
<?php
if(mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$connect = mysqli_connect("localhost", "root", "", "ebils");
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_name")) {
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
	
}
}


?>
<html>
	<head>
		<title>Webslesson Demo - Dynamically Add or Remove input fields in PHP with JQuery</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<h2 align="center"><a href="http://www.webslesson.info/2016/02/dynamically-add-remove-input-fields-in-php-with-jquery-ajax.html" title="Dynamically Add or Remove input fields in PHP with JQuery">Dynamically Add or Remove input fields in PHP with JQuery</a></h2><br />
			<div class="form-group">
				<form method="POST" action="<?php echo $editFormAction; ?>" name="add_name" id="add_name">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="text" name="cname" placeholder="c Name" class="form-control name_list" /></td>
								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
								<td><input type="text" name="fname[]" placeholder="Enter  Name" class="form-control name_list" /></td>
							  <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
						<input type="submit"  class="btn btn-info" value="Submit" />
					</div>
					<input type="hidden" name="MM_insert" value="add_name">
				</form>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td id="row'+i+'"><input type="text" name="fname[]" placeholder="Enter  Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
	
</script>




