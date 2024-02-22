<?php

function display_information()
{
    $fs = fopen("information.txt", "r");
    while (!feof($fs)) {
        $words = explode(";", fgets($fs));
        echo "<pre>";
        print_r($words);
        echo "</pre>";
        // if ($words) {
        //     echo "===========================================<br>";
        //     echo "Visit Date: " . $words[0] . "<br>";
        //     echo "Visit Time: " . $words[1] . "<br>";
        //     echo "User IP Address: " . $words[2] . "<br>";
        //     echo "User Email: " . $words[3] . "<br>";
        //     echo "User Name: " . $words[4] . "<br>";
        //     echo "===========================================<br>";
        // }
    }
    fclose($fs);
}
