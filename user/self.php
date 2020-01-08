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
  $insertSQL = sprintf("INSERT INTO custbill (businessname, invoiceno, mobile, tamount, `unique`, btype, logo) VALUES (%s, %s, %s, %s, %s,  %s, %s)",
					   GetSQLValueString($_POST['storename'], "text"), 
                       GetSQLValueString($_POST['invoiceno'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['tamount'], "text"),
                       GetSQLValueString($_POST['unique'], "text"),
                       GetSQLValueString($_POST['btype'], "text"),
                       GetSQLValueString($_POST['logo'], "text"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($insertSQL, $ebils) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO myinvoice (usermobile, `unique`, invoiceno, transactionid, totalamount, paidamount, businessname, `date`, `time`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['unique'], "text"),
                       GetSQLValueString($_POST['invoiceno'], "text"),
                       GetSQLValueString($_POST['transcationid'], "text"),
                       GetSQLValueString($_POST['tamount'], "text"),
                       GetSQLValueString($_POST['pamount'], "text"),
                       GetSQLValueString($_POST['storename'], "text"),
                       GetSQLValueString($_POST['date'], "text"),
                       GetSQLValueString($_POST['time'], "text"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($insertSQL, $ebils) or die(mysql_error());

  $insertGoTo = "slefbill.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}



$colname_Recordset1 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset1 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT mobile FROM cusers WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset2 = $row_Recordset1['mobile'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = sprintf("SELECT * FROM custbill WHERE mobile = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
 




?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Ebils.in</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../assets/css/demo.css" rel="stylesheet" /> 
    <link href="../assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
      
</head>
<body>
    
    <nav class="navbar navbar-default" role="navigation-demo" id="demo-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="www.creative-tim.com">Vision Pest Control</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="btn btn-simple">Today's Bills</a>
            </li>
            <li>
                <a href="#" class="btn btn-simple">Monthly Bills</a>
            </li>
<li>
                <a href="#" class="btn btn-simple">Sign Up</a>
            </li>
           
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>         
   
            
            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Invoice</h2>
                          <form name="form" class="contact-form" action="<?php echo $editFormAction; ?>" method="POST">
                                <div class="row">
									<div class="col-md-6">
                                        <label>Store Name</label>
                                        <input class="form-control" placeholder="Store Name" name="storename" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Invoice No</label>
                                        <input class="form-control" name="invoiceno" placeholder="As You Like To Display" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Trancastion Id</label>
                                        <input class="form-control" placeholder="Trancastion Id Optional" name="transcationid" >
                                    </div>
    <div class="col-md-6">
                                        <label>Total Amount</label>
                                        <input class="form-control" placeholder="Total Amount" name="tamount" required>
                                    </div>
   <div class="col-md-6">
                                        <label>Paid Amount</label>
                                        <input class="form-control" placeholder="Paid Amount" name="pamount" required>
                                    </div>
								<input type="text"  name="unique"  value="<?php echo $row_Recordset2['unique'] +1;?>">
                                   
									<input type="hidden"  name="btype"  value="Self">
                                        <input type="hidden"  name="date"  value="<?php echo date("d.M.Y") ?>">
 <input type="hidden" name="time" value="<?php date_default_timezone_set('Asia/Kolkata');
echo date(" h:i:sa");?>"> 
						 <input type="text" name="mobile" value="<?php echo $_SESSION['usr_mobile']?>"/>			
        <input type="hidden" name="logo" value="user.jpeg">                          
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-danger btn-block btn-lg btn-fill">Generate Bill</button>
                                    </div>
                                </div>
                                <input type="hidden" name="MM_insert" value="form">
                            </form>
                        </div>
                    </div>
                    
               
    </div>
    
     <?php include 'footer.php';?>

</body>

<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="../assets/js/ct-paper-checkbox.js"></script>
<script src="../assets/js/ct-paper-radio.js"></script>
<script src="../assets/js/bootstrap-select.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>

<script src="../assets/js/ct-paper.js"></script>
    
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
