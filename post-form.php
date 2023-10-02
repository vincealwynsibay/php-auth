<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $error = "";
    $title = "";
    $content = "";
    if (isset($_POST["create_post"])) {
        require_once("database.php");
        require_once("auth.php");
        require_once("post.php");

        $title = $_POST["title"];
        $content = $_POST["content"];

        echo "<br/> nice" . $title . " " . $content;
        $message = createPost($title, $content);
        if ($message["status_code"] != 400) {
            $error = $message["message"];
        } else {
            parse_str($_SERVER['QUERY_STRING'], $query_string);
            $query_string['post_id'] = $message["data"];
            $rdr_str = http_build_query($query_string);
            header("Location: post-view.php?" . $rdr_str);
        }
    }

    ?>


    <form action="" method="post">
        <h1>Create Form</h1>
        <form action="" method="post">
            <div class="">
                <label for="title">title: </label>
                <input type="title" id="title" name="title" value="<?= $title ?>">
            </div>
            <div class="">
                <label for="content">Content: </label>
                <div class="">
                    <textarea name="content" id="content" cols="30" rows="10" value="<?= $content ?>"></textarea>
                </div>
            </div>
            <small><?= $error ?></small>

            <div class="">
                <button type="submit" name="create_post">Create</button>
            </div>
        </form>
    </form>
</body>

</html>