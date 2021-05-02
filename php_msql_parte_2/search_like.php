<?php

$conn = require __DIR__.'/utils/connection.php';

$term = $argv[1] ?? null; //
$term = '%'.$term.'%';

$stmt = $conn->prepare('select * from posts where title LIKE ?;');
$stmt->bind_param('s', $term); // injeta o dado
$stmt->execute(); //execulta

$result = $stmt->get_result();
$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){
    echo $post['title']. PHP_EOL;
    echo $post['body']. PHP_EOL;
    echo PHP_EOL;
}



