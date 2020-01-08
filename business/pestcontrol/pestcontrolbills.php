
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
$query_Recordset1 = "SELECT * FROM pestcontrol WHERE ownerid = $colname_Recordset1 ORDER BY invoiceno DESC";
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset2 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = sprintf("SELECT * FROM busers WHERE id = $colname_Recordset2", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset3 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset3 = sprintf("SELECT * FROM paidamount WHERE (ownerid = %s AND invoiceno=  {$row_Recordset1['invoiceno']})", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $ebils) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset4 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset4 = sprintf("SELECT sum(pamount) FROM paidamount WHERE(ownerid = %s AND invoiceno=  {$row_Recordset1['invoiceno']})", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysql_query($query_Recordset4, $ebils) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);


?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
 
<link href="../../bootstrap3/css/invoice.css" rel="stylesheet" />


<script src='../java/jquery.js'></script>
	<script src="../java/jQuery.print.js"></script>
	<script>
		// here we will write our custom code for printing our div
		$(function(){
			$('#print').on('click', function() {
                //Print ele2 with default options
                $.print(".print_div");
            });
		});
	</script>




<script>
window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>
</head>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" /> 
	<link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>
                                Ebils/Invoice #:<?php echo $row_Recordset1['invoiceno']; ?>  </title>

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

                <a href="<?php echo $row_Recordset2['btype']; ?>.php" class="btn btn-simple"><i class="fa fa-plus"></i>Invoice</a>
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
   
         <div>
	</div> <div>
	</div>
	<br><br><br><br>
<div id="load_screen"><div id="loading" align="center"><img src=../images/load.gif> </div></div>



    <div class="invoice-box" class="print_div">


<table cellpadding="0" cellspacing="0" >
<tr class="header">

        <td width="20%"  align="center"> <img src="../businesslogos/<?php echo $row_Recordset2['logo']; ?>"  style="width:80%; max-width:60px;" alt="LOGO" ></td>
        <td>
                                <strong>Invoice #:<?php echo $row_Recordset1['invoiceno']; ?>  </Strong><br>
                                Date: <?php echo $row_Recordset1['date']; ?><br>
                                Time:<?php echo $row_Recordset1['time']; ?>
                            </td>

       
      </tr>


                </table>
<hr>
           

               <table cellpadding="0" cellspacing="0">
                   
                         <tr class="information">
                            <td>
From:<br>
                               <h4> <?php echo $row_Recordset2['businessname']; ?>.</h4> <br>
                               <?php echo $row_Recordset2['city']; ?>, <?php echo $row_Recordset2['district']; ?>,<?php echo $row_Recordset2['state']; ?>,<?php echo $row_Recordset2['pincode']; ?> <br>
                             <?php echo $row_Recordset2['mobile']; ?> 
                            </td>
                            
                           <td>
                              To:<br>
                               <strong><?php echo $row_Recordset1['cname']; ?></strong> <br>
                             
                               <?php echo $row_Recordset1['mobile']; ?>
                            </td>
                        </tr>
                    
                </td>
            </tr>


            </table>
<br>
<table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr>
            </table>


<table cellpadding="0" cellspacing="0" >
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Service
                </td>
                
                <td><?php echo $row_Recordset1['services']; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
          Contract Period Starts
                </td>
                
                <td>
                 
                   <?php echo $row_Recordset1['cps']; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Contract Period Ends
                </td>
                
                <td>
                   <?php echo $row_Recordset1['cpe']; ?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: <?php echo $row_Recordset1['tamount']; ?>/-
                </td>
            </tr>
        </table> 
<hr>
    <table>

<div content align="center">
 <img src ="../images/ss.jpg"   width="10%" > 
<h6>Payment Process</h6>
</div>
      
<hr>
<table cellpadding="0" cellspacing="0" >
            <tr class="heading">
                <td>Payment Done On 
                </td>
                
                <td>
                   Paid
                </td>
            </tr>
            
            <tr class="item">
                <?php do { ?>
                <td>
                    <?php echo $row_Recordset3['date']; ?><br><?php echo $row_Recordset3['time']; ?>
                    
                  </td>
                  
                  <td>
                    <?php echo $row_Recordset3['pamount']; ?>/-
                  </td>
                        </tr>
            
            <?php } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3)); ?>
             <tr class="item">
                <td>
                  Total Paid Amount
                </td>
                
                <td>
                   <?php echo $row_Recordset4['sum(pamount)']; ?>
                </td>
            </tr>
            
      
            
             <tr class="item">
                <td>Total Bill</td>
                
                <td>
                  <strong> <?php echo $row_Recordset1['tamount']; ?>/-</strong>
                </td>
            </tr>

            
         <tr class="item">
                <td>
                   Due
                </td>
                
                <td>
                <strong> <?php echo $row_Recordset1['tamount']- $row_Recordset4['sum(pamount)']; ?>/-<strong>
                </td>
            </tr>
<tr>
 
 
                <td>	*<?php echo $row_Recordset2['note']?></td>

            </tr>
<hr>
<tr>
 
 
                <td></td>

                <td>
                   Powered By <img src ="../../images/only bb.png" width="1.8%"> 	&copy;<?php echo date("Y") ?>
                </td>
            </tr>
</table>
</div> 
		</div>
</div >
</div >

		<br>
   <div  align="center"> 
	   <form action="edit<?php echo $row_Recordset2['btpye']; ?>.php" method="POST">
		   <input type="hidden" name="sno" value="<?php echo $row_Recordset1['sno']; ?>">
		   <input type="hidden" name="ownerid" value="<?php echo $row_Recordset1['ownerid']; ?>">
		   <input type="hidden" name="invoiceno" value="<?php echo $row_Recordset1['invoiceno']; ?>">
		   
                                 
	    <button type='submit' name="edit" class='btn btn-danger btn-fill' ><i class='fa fa-pencil '></i>Edit</button>
	   </form>
	   <Br>
	   <button type='submit' class='btn btn-danger btn-fill' name='Message'><i class='fa fa-envelope-open-o '></i>Send Invoice</button>

<button id='print' class='btn btn-danger btn-fill' name='login'><i class='fa fa-print'></i>Print Invoice</button>  
	   <Br><Br>
   <?php
  if(  $row_Recordset1['tamount']- $row_Recordset4['sum(pamount)']  == 0)  {
    echo "Complete Payment Done";
} 
 

               else
               {
               echo "
			  <form method='POST' action='paynow.php'>
  <input type='hidden' name='invoiceno' value='  $row_Recordset1[invoiceno] '>
 <button type='submit' class='btn btn-danger btn-fill' name='veiw' ><i class='fa fa-rupee'></i>Pay Now</button>
</form>"
;
               }
	
               ?>
	  
   
          
	   
               </div>  
                           <br><br><br>

     <?php include '../footer.php';?>

</body>




    
</html>
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

<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="assets/js/ct-paper-checkbox.js"></script>
<script src="assets/js/ct-paper-radio.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>

<script src="assets/js/ct-paper.js"></script>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);
?>
