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
if (isset($_POST['search'])) {
  $colname_Recordset1 = $_POST['search'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = "SELECT * FROM {$row_Recordset2['btpye']} WHERE ((ownerid={$_SESSION['usr_id']} AND mobile = $colname_Recordset1 ) OR (ownerid={$_SESSION['usr_id']} AND invoiceno = $colname_Recordset1 ) ) ";
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
	
	<title>Vision Pest Control</title>

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
   
           
<form method="POST"  name="form" class="contact-form" >
              
            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" >
                          

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Inovice Number (or) Mobile</label>
                                        <input class="form-control" placeholder="Inovice Number or Mobile"   type=" number"  name="search"  required/>
                                    </div>

                              
                                    <div class="col-md-6">
                                    
                                      <button class="btn btn-danger btn-block btn-lg btn-fill" type="submit" >Search</button>
                                    </div>
</div></form>
                  
                              <br><br><br>

                              <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
                                <?php do { ?>
                                  
                                   <div id="my-tab-content" class="tab-content" align="center">
                        <div class="tab-pane active" id="follows">
                            <div class="row">
                                <div class="col-md-12 col-md-offset- 2"  >
                                    <ul class="list-unstyled follows  "  >
                                        <li>
                                            <div class="row"  >
                                                <div class="col-md-2 col-md-offset-0 col-xs-3 col-xs-offset-0" align="left" >
                                                   
                                                    <img src="businesslogos/<?php echo $row_Recordset2['logo']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive" >
                                                </div>
                                                <div class="col-md-7 col-xs-4" align="left">
                                                    <h6>Name: <?php echo $row_Recordset1['cname']; ?><br />
                                     <small>Invoice: <?php echo $row_Recordset1['invoiceno']; ?></small><br />
                                    
                                      <small>Mobile: <?php echo $row_Recordset1['mobile']; ?></small><br />
                                      <small>Total:  <?php echo $row_Recordset1['tamount']; ?></small><br />
                                       </h6>
                                                </div>
                                                <form method="POST" action="../business/<?php echo $row_Recordset2['btpye']; ?>/<?php echo $row_Recordset2['btpye']; ?>view.php" name="form">
                                                
                                                
                                                <input type="hidden" name="invoiceno" value="<?php echo $row_Recordset1['invoiceno']; ?>">
												<input type="hidden" name="ownerid" value="<?php echo $_SESSION['usr_id']?>">
                                                <div class="col-md-3 col-xs-2">
                                                    <div class="unfollow" rel="tooltip" title="View">
                                                      <button type="submit" name="view"  btn class="btn btn-sm btn-fill btn-icon"  ><i class="fa fa-long-arrow-right"></i></btn></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        </form>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                 
											
                                                                        
                      
                                <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
<?php } // Show if recordset not empty ?>
                              <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
  <div align="center"> <img src="../images/NO DATA.svg" width="50%"></div>
  <?php } // Show if recordset empty ?>
</div>

                            </form>
                  </div>

              </div>  </div>

              </div>
                    
</div></body>
                    
</div>
            </div>
        </div>     
    </div>
    
    
    <?php include 'footer.php';?>
</body></html>
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
