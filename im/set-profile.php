<?php


$username = "stint";

function save_image($inPath, $outPath) {
    $in = fopen($inPath, "rb");
    $out = fopen($outPath, "wb");
    while ($chunk = fread($in, 8192)) {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

if (isset($username)) {
    $url = $_POST['url'];
   save_image($url, 'profile-pic/' . $username . '.jpg');
  echo "success";
} else {
    // if username is not redirect to the home page
}
