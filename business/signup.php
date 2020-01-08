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
          <a class="navbar-brand" href="#">Ebils</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
 <li>

                <a href="login.php" class="btn btn-simple"><i class="fa fa-plus"></i>Login</a>
            </li>           
 <li>
                <a href="terms.php" class="btn btn-simple"><i class="fa fa-file-text-o"></i>Terms</a>
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
                            <h2 class="text-center">One Step Verification</h2>
   <div>
            
<form method="POST" name ="verify" action="verify.php">
                           <div class="col-md-4 col-md-offset-4">
                                        <label>Mobile</label>
                                        <input class="form-control" placeholder="Mobile" name="mobile" maxlength="10" pattern="[0-9]{10}" required/>
                                    </div>
	


<input type="hidden" name ="cc" value="+91" id="cc">
	</div>
	<div class="row">
                                    <div class="col-md-4 col-md-offset-4"><br>
<br>
<button type="submit" name ="verify" class="btn btn-danger btn-block btn-lg btn-fill"> Submit</button>
		</div>
		 <div class="col-md-4 col-md-offset-4" align="center">
<br>

                                    <a href="login.php" class="btn btn-simple btn-danger" >Already have an Account?</a>
                                </div>

 <div class="col-md-4 col-md-offset-4" align="center">
<br>

                                    <a href="terms.html" class="btn btn-simple btn-danger" >On Submiting Your Are Accepting <br> Terms And Conditions</a>
                                </div>
	</div>
</form>
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