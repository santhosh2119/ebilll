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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO gym (ownerid, invoiceno, cname, mobile, course, joindate, enddate, tamount, paidamount, `date`, `time`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ownerid'], "text"),
                       GetSQLValueString($_POST['invoiceno'], "text"),
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['course'], "text"),
                       GetSQLValueString($_POST['joindate'], "text"),
                       GetSQLValueString($_POST['enddate'], "text"),
                       GetSQLValueString($_POST['tamount'], "text"),
                       GetSQLValueString($_POST['pamount'], "text"),
                       GetSQLValueString($_POST['date'], "text"),
                       GetSQLValueString($_POST['time'], "text"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($insertSQL, $ebils) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO custbill (businessname, ownerid, invoiceno, mobile, tamount, btype, logo) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['businessname'], "text"),
                       GetSQLValueString($_POST['ownerid'], "text"),
                       GetSQLValueString($_POST['invoiceno'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['tamount'], "text"),
                       GetSQLValueString($_POST['btype'], "text"),
                       GetSQLValueString($_POST['logo'], "text"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($insertSQL, $ebils) or die(mysql_error());
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

  $insertGoTo = "gymbills.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}




$colname_Recordset2 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset2 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = sprintf("SELECT * FROM busers WHERE id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);



$colname_Recordset1 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset1 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = "SELECT * FROM {$row_Recordset2['btpye']} WHERE ownerid = $colname_Recordset1 ORDER BY invoiceno DESC";
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


?>


<?php 

$exp_date= $row_Recordset2['expirydate'];
$today_date=date("d.M.Y");

$exp = strtotime($exp_date);
$td = strtotime($today_date);

if($td > $exp) {
	 header('Location: ../expire.php');
	
	
}
	

?>
<?php
if($row_Recordset2['name']==NULL||$row_Recordset2['city']==NULL||$row_Recordset2['businessname']==NULL||$row_Recordset2['district']==NULL||$row_Recordset2['state']==NULL||$row_Recordset2['pincode']==NULL||$row_Recordset2['note']==NULL) {
	 header('Location: ../editprofile.php');
	
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
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      
</head>
<body>
    
    <nav class="navbar navbar-default navbar-fixed-top"  role="navigation-demo" id="demo-navbar" >
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Ebils</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
 <li>

                <a href="<?php echo $row_Recordset2['btpye']; ?>.php" class="btn btn-simple"><i class="fa fa-plus"></i>Invoice</a>
            </li>           
 <li>
                <a href="../search.php" class="btn btn-simple"><i class="fa fa-search"></i>Search</a>
            </li>
            <li>
                <a href="../accounts.php" class="btn btn-simple"><i class="fa fa-file-text-o"></i>Accounts</a>
            </li>
<li>
                <a href="../promotions.php" class="btn btn-simple"><i class="fa fa-bolt"></i>Promotions</a>
            </li>
          <li>
                <a href="../profile.php" class="btn btn-simple"><i class="fa fa-user-circle-o"></i>Profile</a>
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
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Invoice</h2>
                            <form method="POST" action="<?php echo $editFormAction; ?>" name="form" class="contact-form" >
       
                                   <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control"  placeholder="Name" name="cname"  required/>
                                    </div>
                                    
                                        <input type="hidden"  name="date"  value="<?php echo date("d.M.Y") ?>">
                                    
    <div class="col-md-6">

                                        <label>Mobile</label>
                                        <input class="form-control" placeholder="Mobile" name="mobile" maxlength="10" pattern="[0-9]{10}" required/>
                                    </div>

                                     
                                        <input type="hidden" name="time" value="<?php date_default_timezone_set('Asia/Kolkata');
echo date(" h:i:sa");?>"> 
    <input type="hidden" name="ownerid" value="<?php echo $_SESSION['usr_id']?>"/>
 	<input type="hidden" name="businessname" value="<?php echo $row_Recordset2['businessname']; ?>"/>

    <input type="hidden" name="invoiceno" value="<?php echo $row_Recordset1['invoiceno']+1; ?>" >
     <input type="hidden" name="btype" value="<?php echo $row_Recordset2['btpye']; ?>" >
	 <input type="hidden" name="logo" value="<?php echo $row_Recordset2['logo']; ?>" >
 
<br>
<div class="col-md-6">
                                        <label>Fitness Name</label>
                                        <input class="form-control" placeholder="Shoulders, Arms, 6 packs..." name="course" required/>
                                    </div> 

                                 
                                   
<div class="col-md-6">
                                        <label>Fitness Starts From</label>
                                        <input class="form-control" placeholder="dd/mm/yyyy" name="joindate" required/>
                                    </div>
<div class="col-md-6">
                                        <label>Fitness Ends At</label>
                                        <input class="form-control" placeholder="dd/mm/yyyy"  name="enddate" required/>
                                    </div>
<div class="col-md-6">
                                        <label>Total Amount</label>
                                        <input class="form-control" placeholder="Total Amount" pattern="^[0-9]*$" name="tamount" required/>
                                    </div>
<div class="col-md-6">
                                        <label> Paid Amount</label>
                                        <input class="form-control" placeholder="Paid Amount" pattern="^[0-9]*$" name="pamount" required/>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-danger btn-block btn-lg btn-fill" name="gbill" type="submit">Generate Bill  <i class="fa fa-long-arrow-right"></i></button>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="MM_insert" value="form">
                            </form>
                        </div>
                    </div>
                    
                </div>
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
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="assets/js/ct-paper-checkbox.js"></script>
<script src="assets/js/ct-paper-radio.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>

<script src="assets/js/ct-paper.js"></script>
<script>

    $( "#slider-range" ).slider({
    	range: true,
    	min: 0,
    	max: 500,
    	values: [ 75, 300 ],
    });
    $( "#slider-default" ).slider({
    		value: 70,
    		orientation: "horizontal",
    		range: "min",
    		animate: true
    });
    $('.btn-tooltip').tooltip('show');
    $('.radio').on('toggle', function() { });
            
</script>
    
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
