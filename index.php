<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <a href='post-list.php'>posts</a>
    <?php

    include_once("auth.php");
    if (isset($_SESSION["id"])) {

    ?>
        <a href='profile.php'>profile</a>
        <a href='logout.php'>logout</a>
    <?php
    } else {
    ?>

        <a href="register-form.php">Register</a>
        <a href="login-form.php">Login</a>
    <?php

    }

    ?>


</body>

</html>