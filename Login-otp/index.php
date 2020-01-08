<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="assets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h3>Send Bulk SMS</h3>
            <div id="responce"></div>



            <div class="cntr">
                <label for="rdo-1" class="btn-radio">
                    <input type="radio" id="rdo-1" name="radio-grp" value="twilio">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                    </svg>
                    <span>Twilio</span>
                </label>
                <label for="rdo-2" class="btn-radio">
                    <input type="radio" id="rdo-2" name="radio-grp" value="textlocal">
                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="9"></circle>
                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                    </svg>
                    <span>Textlocal</span>
                </label>
              
                
                <div style="clear: both;"></div>
            </div>


            <form action="" method="post" onclick="return false">
                <div class="float-left comman">
                    <textarea placeholder="Message" id="message"></textarea>
                </div>

                <div class="float-rigth comman">
                    <textarea placeholder="Phone Number List" id="numbers"></textarea>
                </div>




                <div style="clear: both">



                    <input type="submit" id="submit-btn" onmousedown="start_sendig();" value="Sent">
                </div>
            </form>



        </div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="assets/main.js" type="text/javascript"></script>
    </body>
</html>
