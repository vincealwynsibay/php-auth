<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "vince";
$dbname = "post";

$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname) or die("Connection to Database Failed. %s\n" . $conn->error);
