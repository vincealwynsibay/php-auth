<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">Back To Home</a>
    <h1>Post List</h1>
    <ul>
        <?php
        include("database.php");
        include("post.php");
        $posts = getPosts();


        if ($posts["status_code"] == "400") {
            $posts = $posts["data"];
        }

        foreach ($posts as $post) {
        ?>
            <li><a href='post-view.php?post_id=<?= $post['id'] ?>'><?= $post["title"] ?></a></li>
        <?php
        }
        ?>
    </ul>
</body>

</html>