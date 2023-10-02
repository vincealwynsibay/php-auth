<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">Back To Home</a>
    <?php
    include_once('database.php');
    include_once('auth.php');

    parse_str($_SERVER['QUERY_STRING'], $query_string);
    $query_string['post_id'] = 1;
    $rdr_str = http_build_query($query_string);
    if (array_key_exists("user_id", $query_string)) {
        include_once("get_user.php");
        $user = getUserById($query_string["user_id"]);
        foreach (array_keys($user) as $key) {
            echo "<p>" . $key . " " . $user[$key] . "</p>";
            echo "<br/>";
        }
    } else {
        if (isset($_SESSION["id"])) {
            $id = $_SESSION["id"];
            include_once("get_user.php");
            $user = getUserById($id);
            foreach (array_keys($user) as $key) {
                echo "<p>" . $key . " " . $user[$key] . "</p>";
                echo "<br/>";
            }
        } else {
            echo "<p>Not Logged In</p>";
        }
    }
    ?>
</body>

</html>