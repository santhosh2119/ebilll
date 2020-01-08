<?php
session_start();
 
if(!isset($_SESSION['usr_id'])){
    header('Location: ../login.php');
    exit;
} else {
    // Show users the page!
}

?>



<?php require_once('../../Connections/ebils.php'); ?>
<?php
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

$colname_Recordset1 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset1 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT btpye FROM busers WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = "SELECT * FROM services ORDER BY pname ASC";
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

if ($row_Recordset1['btpye']!= 'selectb') {
	header('Location: ../btype.php');
 
}


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}





if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE busers SET btpye=%s WHERE id=%s",
                       GetSQLValueString($_POST['btype'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($updateSQL, $ebils) or die(mysql_error());

  $updateGoTo = "../btype.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}



?>




<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../../assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Ebils</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="../../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../../assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../../assets/css/demo.css" rel="stylesheet" /> 
    <link href="../../assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
     <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
   <script src="https://kit.fontawesome.com/1c63e7c4f2.js" crossorigin="anonymous"></script> 
</head>
<body>
    
    <nav  class="navbar navbar-default  navbar-fixed-top"   id="demo-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="www.ebils.in">Ebils</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
           
            <li>
                <a href="../terms.php" class="btn btn-simple"><i class="fa fa-file-text-o"></i>Terms</a>
            </li>
            <li>
                <a href="../logout.php" class="btn btn-simple"><i class="fa fa-power-off"></i>Log Out</a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>         
            </div>
            
            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" >
							  <h2 class="text-center">Select Your Business </h2>
                           
                          <form method="POST" action="<?php echo $editFormAction; ?>" name="form">
                           
							  <label class="radio">
                                
                              <input type="radio" name="btype" data-toggle="radio" id="optionsRadios1" value="selectb" checked>
                                
                              &nbsp;<i class="fa fa-meh-o"></i>&nbsp; Can't Choose Now
                                
                            </label> 
							  <?php do { ?>
							  
							   <div class="row">
                                    <div class="col-md-6">
										
										
                            <label class="radio">
                                
                              <input type="radio" name="btype" data-toggle="radio" id="optionsRadios<?php echo $row_Recordset2['id']+1; ?>" value="<?php echo $row_Recordset2['pvalue']; ?>">
                                
                             &nbsp; <i class="<?php echo $row_Recordset2['picon']?>"></i>&nbsp;<?php echo $row_Recordset2['pname']; ?>
                                
                            </label> 
									
								   </div>
							  </div>
                              <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
<input type="hidden" name="id" value="<?php echo ($_SESSION['usr_id']);?>">
 <br>
                            <button class="btn btn-primary btn-fill" type="submit">Submit</button>
                            
                            <input type="hidden" name="MM_update" value="form">
                          
                            </form>
                            
                        </div>
 
                    </div>
                    
                </div>
     
				<br>
	</div>
	</div>
</div>
     <?php include '../footer.php';?>

</body>

<script src="../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="../../bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="../../assets/js/ct-paper-checkbox.js"></script>
<script src="../../assets/js/ct-paper-radio.js"></script>
<script src="../../assets/js/bootstrap-select.js"></script>
<script src="../../assets/js/bootstrap-datepicker.js"></script>

<script src="../../assets/js/ct-paper.js"></script>
    
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
