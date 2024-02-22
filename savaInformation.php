<?php

function save_information($email, $name)
{
    $visit_date = date("Y-m-d");
    $visit_time = date("H:i:s");
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $user_email = $email;
    $user_name = $name;
    $line = $visit_date . ";" . $visit_time . ";" . $user_ip . ";" . $user_email . ";" . $user_name . PHP_EOL;
    $fs = fopen("information.txt", "a+") or die("Unable to open file!");;
    fwrite($fs, $line);
    fclose($fs);
}
