<?php
include_once '../Connections/dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['verify'])) {
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$cc = mysqli_real_escape_string($con, $_POST['cc']);
	$cc_mobile = $cc . '' . $mobile;
    	$mobile_no = preg_replace('/[^0-9]/', '', $cc_mobile);
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);

	}
$sql = "SELECT * FROM busers where mobile =  '$mobile' ";
$result = $con->query($sql);
	
	
if ($result->num_rows === 0) {


    
        $username = "vallalas8@gmail.com"; //repace your username from textlocal
        $hash = "21c179991c3a64ecc081fe7b572d07081c5118dbdc5b0cd8b5a3436e55e016f3";

        // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = "1"; //recieve on mobile production and 1 for development
        // Data for text message. This is the text message data.
        $sender = "EcBILS"; // This is who the message appears to be from.
        $numbers = $mobile_no; // A single number or a comma-seperated list of numbers

        $rand_opt = substr(str_shuffle("0123456789"), 0, 5);
       
        
        $message = 'Thanks for signing up with Ebils, one step towards SAVE PAPER , SAVE TREE AND GO GREEN your one time password is ' . $rand_opt;

        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        if ($result == true) {
            $otp_store = password_hash($rand_opt, PASSWORD_DEFAULT);

          mysqli_query($con, "INSERT INTO bverify (mobile,otp_hash) VALUES( '" . $mobile_no  . "', '" . $rand_opt . "')"); 
		     
        }
        curl_close($ch);
    } else {
        echo 
			
	header("Location: login.php"); 
    }
}


if (isset($_POST['otpverify'])) {
	$date = mysqli_real_escape_string($con, $_POST['date']);
	$exdate = mysqli_real_escape_string($con, $_POST['exdate']);
	$opt = mysqli_real_escape_string($con, $_POST['otp']);
	$cc = mysqli_real_escape_string($con, $_POST['cc']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$password = mysqli_real_escape_string($con, ($_POST['password']));
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$cc_mobile = $cc . '' . $mobile;
    $mobile_no = preg_replace('/[^0-9]/', '', $cc_mobile);
	$pass = mysqli_real_escape_string($con, md5($_POST['password']));
	
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);

	}
	
	
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);

	}
	
	
	
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
		if (!$error) {
$sql = "SELECT * FROM bverify where mobile ='$mobile_no' AND otp_hash='$opt' ";
$result = $con->query($sql);
	
	
if ($result->num_rows === 1) {
    // output data of each row
 mysqli_query($con, "INSERT INTO busers (mobile,password,dateofjoin,expirydate) VALUES( '" . $mobile . "', '" . $pass . "','" . $date . "','" . $exdate . "')");

	header("Location: login.php"); 
}
	else{
			$error = true;
		$otp_error = "Please Enter Correct OTP";
	
}
}

}
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
                 <a href="terms.php" class="btn btn-simple"><i class="fa fa-file-text-o"></i>Terms</a>
            </li>
            <li>
                <a href="contact.php" class="btn btn-simple"><i class="fa fa-envelope-o">Contact Us</a>
            </li>
            
          
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>         
            </div>
            
    
	</div>
            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">One Step Verification</h2>
   <div>
	    <div class="col-md-8 col-md-offset-2" align="center">
	 <h4 class="btn btn-simple btn-danger" > We have send SMS TO <?php
echo "$mobile";?> </h4>
			<br>
	   </div>
            <?php if(isset($cpassword_error)) echo $cpassword_error; ?>
	   <?php if(isset($password_error)) echo $password_error; ?>
	    <?php if(isset($otp_error)) echo $otp_error; ?>
<form method="POST" name ="verify" action="verify.php">
                           <div class="col-md-4 col-md-offset-4">
                                        <label>OTP</label>
                                        <input class="form-control" placeholder="Enter 5 digits OTP" name="otp" maxlength="5" pattern="[0-9]{5}" required/>
                                    </div>
	<input type="hidden" value="<?php echo "$mobile";?>" name="mobile" required/>
	<input type="hidden" value="<?php echo "$cc";?>" name="cc" required/>
	<div class="col-md-4 col-md-offset-4">
                                        <label>Set Password</label>
                                        <input class="form-control" placeholder="Set Password" name="password" type="password"  required/>
                                    </div>
	<div class="col-md-4 col-md-offset-4">
                                        <label>Conform Password</label>
                                        <input class="form-control" placeholder="Conform Password" name="cpassword" type="password"  required/>
                                    </div>

                                        <input type="hidden"  name="date"  value="<?php echo date("d.M.Y") ?>">
 <input type="hidden"  name="exdate"  value="<?php $date = date("d.M.Y"); echo date('d.M.Y', strtotime($date. ' + 15 days'));?>">
	</div>
	<div class="row">
                                    <div class="col-md-4 col-md-offset-4"><br>
<br>
<button type="submit" name ="otpverify" class="btn btn-danger btn-block btn-lg btn-fill"> submit</button>
		</div></form>
		
	   <form name="resend" action="verify.php" method="POST">

<input type="hidden" value="<?php echo "$mobile";?>" name="mobile" required/>
	<input type="hidden" value="<?php echo "$cc";?>" name="cc" required/>
 <div class="col-md-4 col-md-offset-4" align="center">
			 <br>
			<button type="submit" name="verify" class="btn btn-simple btn-danger" >Resend OTP?</button>
<br>
</form>
                                    <a href="login.php" class="btn btn-simple btn-danger" >Already have an Account?</a>
                                </div>
	</div>

							 </div>
                    </div>
                    
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