<?php

function register($email, $username, $password)
{
    require_once("database.php");
    global $conn;

    if (empty($email)) {
        return ["message" => "Email is required.", "status_code" => 401];
    }

    if (empty($password)) {
        return ["message" => "Password is required.", "status_code" => 401];
    }

    if (empty($username)) {
        return ["message" => "Username is required.", "status_code" => 401];
    }

    $query = "SELECT * FROM tblusers WHERE email='$email'";

    $email_check = $conn->query($query);

    if ($email_check) {
        if ($email_check->num_rows > 0) {
            return ["message" => "Email is already taken.", "status_code" => 401];
        }
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO tblusers (email, password, username)";
    $query .= "VALUES ('$email', '$hashed_password', '$username')";

    $result = $conn->query($query);

    if ($result) {
        include_once("login.php");
        $user = login($email, $password);
        return ["message" => "Registered Successfully", "status_code" => 400];
    }
}
