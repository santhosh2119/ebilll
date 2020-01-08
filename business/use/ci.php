<?php
    $date = date("d.M.Y");
    echo date('d.M.Y', strtotime($date. ' + 10 days'));
?>