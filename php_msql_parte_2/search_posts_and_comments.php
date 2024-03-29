<?php

$conn = require __DIR__.'/utils/connection.php';

$one_to_one = 'select * from posts LEFT JOIN comments on posts.id = comments.post_id where posts.id = 1 GROUP BY posts.id;';
$one_to_many = 'select * from posts LEFT JOIN comments on posts.id = comments.post_id where posts.id = 1;';
$belongs_to_1 = 'select * from posts RIGHT JOIN comments on posts.id = comments.post_id where posts.id = 1;';
$belongs_to_2 = 'select * from comments RIGHT JOIN posts on comments.post_id = posts.id where comments.id = 1;';

$result = $conn->query($one_to_one);

$posts = $result->fetch_all(MYSQLI_ASSOC);

var_dump($posts);
exit;