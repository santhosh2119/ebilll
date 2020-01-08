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

$colname_Recordset1 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset1 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM cusers WHERE id = %s ", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);



$colname_Recordset2 = "-1";
if (isset($_SESSION['mobile'])) {
	$_SESSION['mobile'] =$row_Recordset1['mobile'];
  $colname_Recordset2 = $_SESSION['mobile'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = sprintf("SELECT * FROM custbill WHERE mobile = {$row_Recordset1['mobile']} ORDER BY id DESC", GetSQLValueString($colname_Recordset2, "text"));
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

                <a href="self.php" class="btn btn-simple"><i class="fa fa-plus"></i>Invoice</a>
            </li>           
 <li>
                <a href="search.php" class="btn btn-simple"><i class="fa fa-search"></i>Search</a>
            </li>
            <li>
                <a href="accounts.php" class="btn btn-simple"><i class="fa fa-file-text-o"></i>Accounts</a>
            </li>

          <li>
                <a href="profile.php" class="btn btn-simple"><i class="fa fa-user-circle-o"></i>Profile</a>
            </li>
<li>
                <a href="promotions.php" class="btn btn-simple"><i class="fa fa-bolt"></i>Promotions</a>
            </li>
           <li>
                <a href="logout.php" class="btn btn-simple"><i class="fa fa-power-off"></i>Log Out</a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>         
           
            
            <div class="section landing-section">
              <?php do { ?>
                <div class="container">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2" >
                    <div class="list-unstyled follows"  >
                      <div class="card-header" style="padding-top:0.5em;" >
                        <table width="100%" border="0" align="center" >
                          <tbody>
                            <tr >
                              <td  width="20%" align="center"  ><img src="../businesslogos/<?php echo $row_Recordset2['logo']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive" style="max-width: 6rem;"></td>
                              <td><h5><?php echo $row_Recordset2['businessname']; ?><br />
                                <small> <?php echo $row_Recordset2['invoiceno']; ?></small></h5></td>
                              <td align="right" style="padding-right:1em"><br />
								     <form method="POST" action="<?php echo $row_Recordset2['btype']; ?>view.php" name="form">
                                                 <input type="hidden" name="date" value="<?php echo $row_Recordset2['date']; ?>">
						 <input type="hidden" name="time" value="<?php echo $row_Recordset2['time']; ?>">
						<input type="hidden" name="usermobile" value="<?php echo $row_Recordset2['mobile']; ?>">
                                                <input type="hidden" name="unique" value="<?php echo $row_Recordset2['unique']; ?>">
                                                <input type="hidden" name="invoiceno" value="<?php echo $row_Recordset2['invoiceno']; ?>">
												<input type="hidden" name="ownerid" value="<?php echo $row_Recordset2['ownerid']; ?>">
                          <li class="active"> <button type="submit" name="veiw" class="btn btn-danger btn-fill"><i class="fa fa-angle-right" ></i></button></li></td>
							</form>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div></div>
                </div>
                <br>
                <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
					
					 </div>
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

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "<i class='fa fa-angle-down' ></i>see more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "<i class='fa fa-angle-up'></i>see less"; 
    moreText.style.display = "inline";
  }
}
</script>
    
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
