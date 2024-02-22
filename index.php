<?php
require_once("vendor/autoload.php");
$email = "";
$name = "";
$msg = "";

$error_msg = array(
    "flag" => 0,
    "msg_error_name" => "",
    "msg_error_email" => "",
    "msg_error_msg" => ""
);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST["clear"])) {
    $name = "";
    $msg = "";
    $email = "";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $email = test_input($_POST['email']);
        $name = test_input($_POST['name']);
        $msg = test_input($_POST['msg']);
        $error_msg = validation_form($name, $email, $msg, $error_msg);

        if ($error_msg["flag"] === 3) {
            save_information($email, $name);
            echo "<a href='index.php/?view=display'>Display</a>";
            die("Thanks EveryThing saved.");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        * {
            margin: 0px;
            box-sizing: border-box;
        }

        .form-input-css {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 49%;
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-left: 10px;
        }

        h3 {
            text-align: center;
        }

        .header {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 20px 10px;
            margin-bottom: 10px;
        }

        .header a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">PHP Store File</a>
        <div class="header-right">
            <a class="active link" href="?view=add">Add</a>
            <a class="link" href="?view=display">Display</a>
        </div>
    </div>
    <?php
    $view = isset($_GET["view"]) ? $_GET["view"] : "add";
    if ($view == "add") {
        require_once("formHtml.php");
    } elseif ($view == "display") {
        display_information();
    }
    ?>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        let link = document.querySelectorAll("link");
        for (let i = 0; i < link.length; i++) {
            link[i].onclick = function() {
                location.reload();
            }
        }
    </script>
</body>

</html>