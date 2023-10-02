<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('database.php');
    include_once('auth.php');
    include_once('post.php');
    parse_str($_SERVER['QUERY_STRING'], $query_string);
    $id = $query_string["post_id"];
    $post = getPostById($id);

    if ($post["status_code"] == "400") {
        $post = $post["data"];
    }

    if (isset($_SESSION["id"])) {
        include_once('get_user.php');
        $user = getUserById($post["author"]);
    }
    ?>
    <a href="post-list.php">Back To Post List</a>
    <h1><?= $post["title"] ?></h1>
    <p><?= $post["content"] ?></p>
    <?php

    if (isset($_SESSION["id"])) {
    ?>
        <p>created by: <a href="profile.php?user_id=<?= $user["id"] ?>"><?php echo $user['username'] ?></a></p>

    <?php
    }
    ?>
</body>

</html>