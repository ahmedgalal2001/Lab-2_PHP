<?php
function validation_form($name, $email, $msg, $error_msg)
{
   
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg["flag"]++;
    } else {
        $error_msg["msg_error_email"] = "Required & Not Valid Email";
    }
    if (strlen($name) >= MIN_LENGTH_CHAR_USERNAME && strlen($name) <= MAX_LENGTH_CHAR_USERNAME) {
        $error_msg["flag"]++;
    } else $error_msg["msg_error_name"] = "Required & Not Valid Message at Least Your write 5 chars and Max 100";

    if (strlen($msg) >= MIN_LENGTH_CHAR_MSG && strlen($msg) <= MAX_LENGTH_CHAR_MSG) {
        $error_msg["flag"]++;
    } else  $error_msg["msg_error_msg"] = "Not Valid Message at Least Your write 10 chars and Max 255";

    return $error_msg;
}
