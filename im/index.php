<?php $seesion_user = "stint"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jquery Cropper</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/cropper.min.css" rel="stylesheet" type="text/css"/>
        <style>
            #change-profile .preview {

            }

            .priview-wraper{
                width: 100px;
                height:100px;
                position: absolute;
                top: 25%;
                right: 10%;
                overflow: hidden;
                border-radius: 100%;


            }

            .priview-wraper-origal{
                width: 100px;
                height:100px;
                overflow: hidden;
                border-radius: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
            }
        </style>
    </head>
    <body>

        <div class="container" style="margin: 100px auto;">

            <a href="#" data-toggle="modal" data-target="#change-profile">
                <div id="profile-result">
                    <?php if (file_exists('profile-pic/' . $seesion_user . '.jpg')): ?>
              
                        <img src="<?php echo 'profile-pic/' . $seesion_user . '.jpg'; ?>" alt="" class="thumb-lg img-circle" style="width: 100px;height: 100px;">
                    <?php else: ?>
                        <img src="profile-pic/default.png" alt="" class="thumb-lg img-circle" style="width: 100px;height: 100px;">    
                    <?php endif; ?>
                </div>
            </a>

        </div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/cropper.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <!--        boostrap model change profile pic-->
        <div class="modal fade" id="change-profile">
            <div class="modal-dialog">
                <div class="" style="background: #fff;padding: 10px;">

                    <div class="ajax-response" id="loading"></div>

                    <h4 class="m-t-5 m-b-5 ellipsis">Change profile</h4>
                    <div class="profile-pic-wraper col-sm-8">
                        <?php if (file_exists('profile-pic/' . $seesion_user . '.jpg')): ?>
                            <img src="<?php echo 'profile-pic/' . $seesion_user . '.jpg'; ?>" alt="" id="change-profile-pic" style="width: 50%;">
                        <?php else: ?>
                            <img src="profile-pic/default.png" alt="" id="change-profile-pic" style="width: 40%;">    
                        <?php endif; ?>

                    </div>

                    <div class="priview-wraper">
                        <div class="preview"></div>
                    </div><br>
                    <div>
                        <form action="" enctype="multipart/form-data">
                            <input type="file" accept="image/*" id="profile-file-input" onchange="loadFile(event)">
                            <div style="position: absolute;right: 20px;bottom: 20px;">
                                <button href="#" class="btn btn-primary " data-dismiss="modal" style="background: #8fcb62;">Close</button>
                                <input type="button" value="Save" class="btn btn-primary" id="save-profile">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
