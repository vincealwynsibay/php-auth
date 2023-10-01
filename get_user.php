<?php

function getUserById($id)
{
    global $conn;
    $query = "SELECT * FROM tblusers WHERE id='$id'";
    $user_result = $conn->query($query);

    if ($user_result) {
        $user = $user_result->fetch_all(MYSQLI_ASSOC)[0];
        return $user;
    }

    return null;
}
