<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<?php


$email = "";
$username = "";
$password = "";
$error = "";

if (isset($_POST["register"])) {
    require_once("database.php");
    require_once("auth.php");
    require_once("register.php");

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $message = register($email, $username, $password);
    if ($message["status_code"] != 400) {
        $error = $message["message"];
    } else {
        header("Location: index.php");
    }
}

?>


<body>
    <h1>Register</h1>
    <form action="" method="post">
        <div class="">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" value="<?= $email ?>">
        </div>
        <div class="">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" value="<?= $username ?>">
        </div>
        <div class="">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" value="<?= $password ?>">
        </div>
        <small><?= $error ?></small>

        <div class="">
            <button type="submit" name="register">Register</button>
        </div>
    </form>
</body>

</html>