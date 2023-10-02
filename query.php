<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    parse_str($_SERVER['QUERY_STRING'], $query_string);
    $query_string['post_id'] = 1;
    $rdr_str = http_build_query($query_string);
    var_dump($rdr_str);


    ?>
</body>

</html>