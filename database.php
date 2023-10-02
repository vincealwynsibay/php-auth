<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "post";

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die("Connection to Database Failed. %s\n" . $conn->error);
