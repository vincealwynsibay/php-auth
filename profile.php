<?php
include('database.php');
$id = $_SESSION["id"];
include_once("get_user.php");
$user = getUserById($id);
foreach (array_keys($user) as $key) {
    echo $key . " " . $user[$key];
    echo "<br/>";
}
