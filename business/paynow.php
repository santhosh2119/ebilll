
<?php
session_start();
 
if(!isset($_SESSION['usr_id'])){
    header('Location: login.php');
    exit;
} else {
    // Show users the page!
}
?>


<?php require_once('../Connections/ebils.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO paidamount (ownerid, invoiceno, pamount, `date`, `time`) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ownerid'], "text"),
                       GetSQLValueString($_POST['invoiceno'], "text"),
                       GetSQLValueString($_POST['pamount'], "text"),
                       GetSQLValueString($_POST['date'], "text"),
                       GetSQLValueString($_POST['time'], "text"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($insertSQL, $ebils) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
	
	$amount=$_POST['pamount'];
	$sno=$_POST['sno'];
	$amount1=$_POST['paidamount'];
	$total=$amount+$amount1;
	
  $updateSQL = "UPDATE pestcontrol SET paidamount= $total WHERE sno=$sno";

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($updateSQL, $ebils) or die(mysql_error());

  $updateGoTo = "login.html";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}


$colname_Recordset1 = "-1";
if (isset($_POST['veiw'])) {
  $colname_Recordset1 = $_POST['invoiceno'];
	$colname_Recordset3 = $_SESSION['usr_id'];
}

mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM pestcontrol WHERE (invoiceno = $colname_Recordset1 AND ownerid = $colname_Recordset3)");
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset2 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = sprintf("SELECT btpye FROM busers WHERE id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Paper Kit by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../assets/css/demo.css" rel="stylesheet" /> 
    <link href="../assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
     <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
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

                <a href="../business/<?php echo $row_Recordset2['btpye']; ?>/<?php echo $row_Recordset2['btpye']; ?>.php" class="btn btn-simple"><i class="fa fa-plus"></i>Invoice</a>
            </li>           
 <li>
                <a href="search.php" class="btn btn-simple"><i class="fa fa-search"></i>Search</a>
            </li>
            <li>
                <a href="accounts.php" class="btn btn-simple"><i class="fa fa-file-text-o"></i>Accounts</a>
            </li>
<li>
                <a href="promotions.php" class="btn btn-simple"><i class="fa fa-bolt"></i>Promotions</a>
            </li>
          <li>
                <a href="profile.php" class="btn btn-simple"><i class="fa fa-user-circle-o"></i>Profile</a>
            </li>
           <li>
                <a href="logout.php" class="btn btn-simple"><i class="fa fa-power-off"></i>Log Out</a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>         
            </div>
 <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">We Love to help You</h2>
                                   <form method="POST" action="<?php echo $editFormAction; ?><?php echo $editFormAction; ?>" name="form" class="contact-form" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Amount</label>
                                        <input class="form-control" placeholder="Amount" name="pamount">
                                    </div>
<input type="text" name="ownerid" value="<?php echo $_SESSION['usr_id'];?>">
<input type="text" name="paidamount" value="<?php echo $row_Recordset1['paidamount']; ?>">									
									<input type="text" name="invoiceno" value="<?php echo $row_Recordset1['invoiceno']; ?>" >
									<input type="text" name="sno" value="<?php echo $row_Recordset1['sno']; ?>">
                                       <input type="hidden"  name="date"  value="<?php echo date("d.M.Y") ?>">
                                    
                                    
                                     <input type="hidden" name="time" value="<?php date_default_timezone_set('Asia/Kolkata');
echo date(" h:i:sa");?>"> 
 <div class="col-md-6">
                                      
    
                                    </div>
                                </div>
                               
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-danger btn-block btn-lg btn-fill" type="submit" name="done">Paid</button>
                                    </div>
                                    <input type="hidden" name="MM_insert" value="form">
                                    <input type="hidden" name="MM_update" value="form">
</div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div> 
  <?php include 'footer.php';?>
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="../assets/js/ct-paper-checkbox.js"></script>
<script src="../assets/js/ct-paper-radio.js"></script>
<script src="../assets/js/bootstrap-select.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>

<script src="../assets/js/ct-paper.js"></script>
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="assets/js/ct-paper-checkbox.js"></script>
<script src="assets/js/ct-paper-radio.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>

<script src="assets/js/ct-paper.js"></script>
<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
?>
