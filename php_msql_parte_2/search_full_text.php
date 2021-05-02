<?php

$conn = require __DIR__.'/utils/connection.php';

$term = $argv[1] ?? null; //
$term = '%'.$term.'%';

$stmt = $conn->prepare('select *, MATCH(title, body)  AGAINST(? IN BOOLEAN MODE) as score from posts ORDER BY score DESC;');
$stmt->bind_param('s', $term); // injeta o dado
$stmt->execute(); //execulta

$result = $stmt->get_result();
$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){
    echo $post['title']. PHP_EOL;
    echo $post['body']. PHP_EOL;
    echo PHP_EOL;
}



