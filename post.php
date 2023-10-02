<?php

function createPost($title, $content)
{
    global $conn;
    if (empty($title)) {
        return ["message" => "Title is required.", "status_code" => 401];
    }

    if (empty($content)) {
        return ["message" => "Content is required.", "status_code" => 401];
    }

    if (!isset($_SESSION["id"])) {
        return ["message" => "User not authorized.", "status_code" => 401];
    }


    $user_id = $_SESSION['id'];
    $query = "INSERT INTO tblposts (title, content, author) VALUES('$title', '$content', $user_id)";
    // $post_result = $conn->query($query);
    $post_result = mysqli_query($conn, $query);
    $last_id = mysqli_insert_id($conn);

    if (!$post_result) {
        return ["message" => "Post does not exist.", "status_code" => 401];
    }

    return ["message" => "Post created successfully.", "status_code" => 400, "data" => $last_id];
}

function getPostById($id)
{
    global $conn;
    if (empty($id)) {
        return ["message" => "Id is required.", "status_code" => 401];
    }

    $query = "SELECT * FROM tblposts WHERE id=$id";
    $post_result = mysqli_query($conn, $query);

    if (!$post_result) {
        return ["message" => "Post does not exist.", "status_code" => 401];
    }

    $post = $post_result->fetch_all(MYSQLI_ASSOC)[0];

    return ["message" => "Post fetched successfully.", "status_code" => 400, "data" => $post];
}

function getPosts()
{
    global $conn;
    $query = "SELECT * FROM tblposts";
    $post_result = mysqli_query($conn, $query);

    if (!$post_result) {
        return ["message" => "Post does not exist.", "status_code" => 401];
    }

    $post = $post_result->fetch_all(MYSQLI_ASSOC);

    return ["message" => "Posts fetched successfully.", "status_code" => 400, "data" => $post];
}
