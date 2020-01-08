<?php
session_start();
 
if(!isset($_SESSION['usr_id'])){
    header('Location: login.php');
    exit;
} else {
    // Show users the page!
}
?>
<?php
include_once '../Connections/dbconnect.php';
?>
<?php date_default_timezone_set('Asia/Kolkata');?>
<?php
if (isset($_POST['file1']))
{
// Instructions if $_POST['file1'] exist
}

$owner=$_SESSION['usr_id'];
$date = date("d.M.Y");
$expire=date('d.M.Y', strtotime($date. ' + 15 days'));
$time = date(" h:i:sa");
$content= $_POST["content"];
$file1=$_FILES["file1"];
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$fileExt = explode('.',$fileName);
$fileActualExt = strtolower(end($fileExt));
        $rand_opt = substr(str_shuffle("0123456789"), 0, 5);
       
$filenewname = $_SESSION['usr_id']."$rand_opt.".$fileActualExt;

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}


if(move_uploaded_file($fileTmpLoc, "../promotions/$filenewname")){
  mysqli_query($con, "INSERT INTO promotions (ownerid,imagename,content,postdate,exiprydate,time) VALUES( '" . $owner . "', '" . $filenewname . "','" . $content . "','" . $date . "','" . $expire . "', '" . $time . "')"); 
		     

    echo "$filenewname $content upload is complete";
} else {
    echo "move_uploaded_file function failed";
}

?>