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
if (isset($_POST['unique'])) {
  $usermobile = $_POST['usermobile'];
 $unique = $_POST['unique'];

}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM myinvoice WHERE (`usermobile` =  $usermobile AND `unique` =$unique)", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);






?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
 



  <style>


#d-wrapper	div.sep {
		

	}

#d-wrapper	.zig-zag-top:before{
		
        background-position: left top;
        background-repeat: repeat-x;
        background-size: 22px 32px;
        content: " ";
        display: block;

        height: 32px;
		width: 100%;

		position: relative;
		bottom: 64px;
		left:0;
	}

#d-wrapper	div > * {
		margin: 0 40px;
	}

#d-wrapper	.zig-zag-bottom{
		margin: 32px 0;
		margin-top: 0;
background: #fff;
		
	}

#d-wrapper	.zig-zag-top{
		margin: 32px 0;
		margin-bottom: 0;
		background: #fff;
	}

#d-wrapper	.zig-zag-bottom,
#d-wrapper	.zig-zag-top{
			 
	}

#d-wrapper	p,
#d-wrapper  h1{
		  font-size:2em;
		  text-align:center;
		  color:#fff;
		  font-family:"PT Sans Narrow", "Fjalla One", sans-serif;
		  font-weight:900;
		  text-shadow:1px 1px 0 #fff, 2px 2px 0 #fff, 3px 3px 0 #fff, 4px 4px 0 #fff, 5px 5px 0 #fff;

	}

#d-wrapper	div.sep p,
#d-wrapper  div.sep h1 {
		text-shadow:1px 1px 0 #888, 2px 2px 0 #888, 3px 3px 0 #888, 4px 4px 0 #888, 5px 5px 0 #888;
		color: #fff;
	}

#d-wrapper	h1{
		 font-size:4em;
	}

#d-wrapper	.zig-zag-bottom:after{
		background: 
					linear-gradient(-45deg, transparent 16px, #1ba1e2  0), 
					linear-gradient(45deg, transparent 16px, #1ba1e2  0);
        background-repeat: repeat-x;
		background-position: left bottom;
        background-size: 22px 32px;
        content: "";
        display: block;

		width: 100%;
		height: 32px;

 	    position: relative;
		top:64px;
		left:0px;
	}

#d-wrapper	p{
		text-align: center;
	}

#d-wrapper	p:not(:last-child) {
		margin-bottom: 20px;
	}

    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
	width:100%;
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
		#d-wrapper	div > * {
		margin: 0 40px;
	}

#d-wrapper	.zig-zag-bottom{
		margin: 32px 0;
		margin-top: 0;
		background: #1ba1e2;
	}

#d-wrapper	.zig-zag-top{
		margin: 32px 0;
		margin-bottom: 0;
		background: #1ba1e2;
	}

#d-wrapper	.zig-zag-bottom,
#d-wrapper	.zig-zag-top{
			  padding: 32px 0;
	}
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

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
	<link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>
                                Ebils/Invoice #:<?php echo $row_Recordset1['invoiceno']; ?>  </title>

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

                <a href="self.php" class="btn btn-simple"><i class="fa fa-plus"></i>Invoice</a>
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
   
         <div>
	</div> <div>
	</div>
	<br><br><br><br>
<div id="load_screen"><div id="loading" align="center"><img src=../images/load.gif> </div></div>



    <div class="invoice-box" class="print_div">


<table cellpadding="0" cellspacing="0" >
<tr class="header">

        <td width="20%"  align="center"> <img src="../businesslogos/"  style="width:80%; max-width:60px;" alt="LOGO" ></td>
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
                               <strong><?php echo $row_Recordset1['businessname']; ?></strong><br> 
								
                           </td>
                            
                           <td>
                              To:<br>
                               <strong>Self Invoice</strong> <br>
                             
                              
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
                 Store Name
                </td>
                
                <td><?php echo $row_Recordset1['businessname']; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>Transaction Id
                </td>
                
                <td>
                 
                   <?php echo $row_Recordset1['transactionid']; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Paid Amount
                </td>
                
                <td>
                   <?php echo $row_Recordset1['paidamount']; ?>
                </td>
            </tr>
            
            <tr class="total">
                <td> Total Amount</td>
                
                <td>
                   Total: <?php echo $row_Recordset1['totalamount']; ?>/-
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

<tr>
 
 
                <td></td>

                <td>
                   Powered By <img src ="../images/only bb.png" width="1.8%"> 	&copy;<?php echo date("Y") ?>
                </td>
            </tr>
</table>
</div> 
		</div>
</div >
</div >

		<br>
   <div  align="center"> 
	         
	    
	 

<button id='print' class='btn btn-danger btn-fill' name='login'><i class='fa fa-print'></i>Print Invoice</button>  
	  
  
	   
</div>  
                           <br><br><br>

      <?php include 'footer.php';?>

</body>




    
</html>
<?php
mysql_free_result($Recordset1);




?>
