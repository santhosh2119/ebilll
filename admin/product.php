

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
  $insertSQL = sprintf("INSERT INTO services (pname, pvalue, picon, `date`, `time`) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['pname'], "text"),
                       GetSQLValueString($_POST['pvalue'], "text"),
                       GetSQLValueString($_POST['picon'], "text"),
                       GetSQLValueString($_POST['date'], "text"),
                       GetSQLValueString($_POST['time'], "text"));

  mysql_select_db($database_ebils, $ebils);
  $Result1 = mysql_query($insertSQL, $ebils) or die(mysql_error());

  $insertGoTo = "product.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
          <a class="navbar-brand" href="../business/www.ebils.in">Ebils</a>
        </div>

    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="btn btn-simple">Business</a>
            </li>
            <li>
                <a href="#" class="btn btn-simple">User</a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-facebook"></i></a>
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
                            <h2 class="text-center">Update Service</h2>
                      <form method="POST" action="<?php echo $editFormAction; ?>" name="form" class="contact-form" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>service</label>
                                        <input class="form-control" placeholder="Service Name" name="pname">
                                    </div>
 <div class="col-md-6">
                                        <label>database</label>
                                        <input class="form-control" placeholder="Service Value Data" name="pvalue">
                                    </div>
                                    <div class="col-md-6">
                                        <label>icon</label>
                                        <input class="form-control" placeholder="Service icon" name="picon">
                                    </div>
                                       <input type="hidden"  name="date"  value="<?php echo date("d.M.Y") ?>">
                                    
                                    
                                     <input type="hidden" name="time" value="<?php date_default_timezone_set('Asia/Kolkata');
echo date(" h:i:sa");?>"> 
 <div class="col-md-6">
                                      
    
                                    </div>
                                </div>
                               
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-danger btn-block btn-lg btn-fill" type="submit" name="done">Send Message</button>
                                    </div>
                                    <input type="hidden" name="MM_insert" value="form">
</div>
                            </form>
                  </div>
   </div>
                    
</div>
            </div> <footer class="footer-demo section-dark">
        <div class="container">
            <nav class="pull-left">
                <ul>
    
                    <li>
                        <a href="http://www.ebils.in">
                            Ebils
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com"><i class="fa fa-facebook" ></i>
                           Facebook
                        </a>
                    </li>
 <li>
                        <a href="http://blog.creative-tim.com"><i class="fa fa-instagram" ></i>
                          Instagram
                        </a>
                    </li>
 <li>
                        <a href="http://blog.creative-tim.com"><i class="fa fa-file-image-o" ></i>
  Freepik
                        </a>
                    </li>
                    <li>
                        <a href="../business/contact.php"><i class="fa fa-envelope-o" ></i>
                           Contact Us
                        </a>
                    </li>


                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2019, made with <i class="fa fa-heart heart"></i> by Tapinn
            </div>
        </div>
    </footer>
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="../assets/js/ct-paper-checkbox.js"></script>
<script src="../assets/js/ct-paper-radio.js"></script>
<script src="../assets/js/bootstrap-select.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>

<script src="../assets/js/ct-paper.js"></script>
<script src="../business/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../business/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="../business/bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="../business/assets/js/ct-paper-checkbox.js"></script>
<script src="../business/assets/js/ct-paper-radio.js"></script>
<script src="../business/assets/js/bootstrap-select.js"></script>
<script src="../business/assets/js/bootstrap-datepicker.js"></script>

<script src="../business/assets/js/ct-paper.js"></script>