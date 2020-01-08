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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE busers SET name=%s, mobile=%s, businessname=%s, city=%s, district=%s, `state`=%s, pincode=%s, GST=%s, note=%s WHERE id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['businessname'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['district'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['pincode'], "text"),
                       GetSQLValueString($_POST['GST'], "text"),
                       GetSQLValueString($_POST['note'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($updateSQL, $ebils) or die(mysql_error());

  $updateGoTo = "profile.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset1 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM busers WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Ebils</title>

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

                <a href="../business/<?php echo $row_Recordset1['btpye']; ?>/<?php echo $row_Recordset1['btpye']; ?>.php" class="btn btn-simple"><i class="fa fa-plus"></i>Invoice</a>
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
                 
						  <div class="container">
                <div class="avatar">
                    <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                        <div class="avatar" align="center">
                            <img src="businesslogos/<?php echo $row_Recordset1['logo']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive" style="max-height: 10em">
                        </div>
                        <div class="name">
                            <h4><?php echo $row_Recordset1['businessname']; ?><br /><small><?php echo $row_Recordset1['btpye']; ?></small></h4>
                        </div>
                    </div>
                </div></div>
                        <div class="col-md-8 col-md-offset-2">
                           
                          <form name="form" class="contact-form" action="<?php echo $editFormAction; ?>" method="POST">
                                <div class="row">
									<div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" placeholder="Your Name" name="name" value="<?php echo $row_Recordset1['name']; ?>" required/>
                                    </div>
										<div class="col-md-6">
                                        <label>Mobile</label>
                                        <input class="form-control" placeholder="Your Mobile" name="mobile" value="<?php echo $row_Recordset1['mobile']; ?>" required/>
                                    </div>
									<div class="col-md-6">
                                        <label>Name of Business</label>
                                        <input class="form-control" placeholder="Your Shop Name" name="businessname" value="<?php echo $row_Recordset1['businessname']; ?>" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" name="city" placeholder="Your City"  value="<?php echo $row_Recordset1['city']; ?>"required/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>District</label>
                                        <input class="form-control" placeholder=" Your District" name="district"  value="<?php echo $row_Recordset1['district']; ?>">
                                    </div>
    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control" placeholder="Your State" name="state"  value="<?php echo $row_Recordset1['state']; ?>"required>
                                    </div>
									 <div class="col-md-6">
                                        <label>Pincode</label>
                                        <input class="form-control" placeholder="Your Pincode" name="pincode"  value="<?php echo $row_Recordset1['pincode']; ?>" maxlength=""required>
                                    </div>
   <div class="col-md-6">
                                        <label>GST</label>
                                        <input class="form-control" placeholder="Your GST No" name="GST" value="<?php echo $row_Recordset1['GST']; ?>" >
                                    </div>
									 <div class="col-md-6">
                                        <label>Note</label>
                                        <input class="form-control" placeholder="Exchange Not Avaliable ........" name="note"  value="<?php echo $row_Recordset1['note']; ?>"required>
                                    </div>
							
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>"> 
									
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-danger btn-block btn-lg btn-fill">Update</button>
                                    </div>
                                </div>
                                <input type="hidden" name="MM_insert" value="form">
                                <input type="hidden" name="MM_update" value="form">
                            </form>
                        </div>
                    </div>
                    
               
    </div>  </div>  </div>  </div>
    
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
?>
