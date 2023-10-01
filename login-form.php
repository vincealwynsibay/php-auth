<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<?php

$error = "";
$email = "";
$password = "";
if (isset($_POST["login"])) {
    require_once("database.php");
    require_once("auth.php");
    require_once("login.php");

    $email = $_POST["email"];
    $password = $_POST["password"];


    $message = login($email, $password);
    if ($message["status_code"] != 400) {
        $error = $message["message"];
    } else {
        header("Location: index.php");
    }
}

?>


<body>
    <h1>Login</h1>
    <form action="" method="post">
        <div class="">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" value="<?= $email ?>">
        </div>
        <div class="">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" value="<?= $password ?>">
        </div>
        <small><?= $error ?></small>

        <div class="">
            <button type="submit" name="login">Login</button>
        </div>
    </form>
</body>

</html>