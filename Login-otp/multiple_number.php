<?php

 if (isset($_POST['provider']) && $_POST['provider'] == "textlocal") {



    if (isset($_POST['numbers'])) {
        $numbers = $_POST['numbers'];
        $message = $_POST['message'];
        foreach (explode("+", $numbers) as $phone) {
            // Authorisation details.
            $username = "srinidhisoma@gmail.com";
            $hash = "3a21efbb294a8b2a06f27cac4f1749db45aaebc318cb1ca55ce06b8398fc2c2e";

            // Config variables. Consult http://api.textlocal.in/docs for more info.
            $test = "0";

            // Data for text message. This is the text message data.
            $sender = "TXTLCL"; // This is who the message appears to be from.
            $numbers = preg_replace('/[^0-9]/', '', $phone); // A single number or a comma-seperated list of numbers
           $message = $message;
            // 612 chars or less
            // A single number or a comma-seperated list of numbers
            $message = urlencode($message);
            $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
            $ch = curl_init('http://api.textlocal.in/send/?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); // This is the result from the API

            if ($result) {
                $data = array(
                    "response" => "success",
                    "current" => '+' . $phone
                );

                echo json_encode($data);
            }

            curl_close($ch);
        }
    }
}
?>