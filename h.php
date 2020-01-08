<?php

$url ="google.com";
$shorturl = substr(md5($url),rand(0,26),5);

echo $shorturl;


?>