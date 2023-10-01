<?php

function login($email, $password)
{

    global $conn;
    if (empty($email)) {
        return ["message" => "Email is required.", "status_code" => 401];
        return 0;
    }

    if (empty($password)) {
        return ["message" => "Password is required.", "status_code" => 401];
    }

    $query = "SELECT * FROM tblusers WHERE email='$email'";

    echo $query;
    $user_result = $conn->query($query);

    if ($user_result) {
        if ($user_result->num_rows == 0) {
            return ["message" => "User does not exist.", "status_code" => 401];
        }
    }

    $user = $user_result->fetch_all(MYSQLI_ASSOC)[0];

    $_SESSION["id"] = $user["id"];
    return ["message" => "Login successfully.", "status_code" => 400, "data" => $user];
}
