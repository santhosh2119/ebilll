<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ebils = "localhost";
$database_ebils = "ebils";
$username_ebils = "root";
$password_ebils = "";
$ebils = mysql_pconnect($hostname_ebils, $username_ebils, $password_ebils) or trigger_error(mysql_error(),E_USER_ERROR); 
?>