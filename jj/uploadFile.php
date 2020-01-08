<?php
if (isset($_POST['btnSubmit'])) {
	$text= $_POST["text"];
    $uploadfile = $_FILES["uploadImage"]["tmp_name"];
    $folderPath = "uploads/";
    
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }
    if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $folderPath . $_FILES["uploadImage"]["name"])) {
        echo '  $text <img src="' . $folderPath . "" . $_FILES["uploadImage"]["name"] . '">';
        exit();
    }
}
?>