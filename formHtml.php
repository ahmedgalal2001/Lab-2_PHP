<?php
?>
<h3>Form Validation PHP</h3>
<div>
    <form method="post" action="?view=add">
        <label for="name">Username</label>
        <input class="form-input-css" type="text" value="<?php echo $name ?>" id="name" name="name" placeholder="Put Your Name">
        <?php
        if ($error_msg["msg_error_name"]) echo "<p class='error'>" . $error_msg["msg_error_name"] . "</p>";
        ?>
        <label for="email">Email</label>
        <input class="form-input-css" type="text" value="<?php echo $email ?>" id="email" name="email" placeholder="Put Your Email">
        <?php
        if ($error_msg["msg_error_email"]) echo "<p class='error'>" . $error_msg["msg_error_email"] . "</p>";
        ?>
        <label for="msg">Your Message...</label>
        <textarea class="form-input-css" value="<?php echo $msg; ?>" type="text" id="msg" name="msg" placeholder="Put Your Message.."></textarea>
        <?php
        if ($error_msg["msg_error_msg"]) echo "<p class='error'>" . $error_msg["msg_error_msg"] . "</p>";
        ?>
        <input type="submit" name="submit" value="submit">
        <input style="background-color: #aaa;" type="submit" name="clear" value="clear">
    </form>
    <a href="?view=display">Display</a>
</div>