<?php

$conn = require __DIR__.'/utils/connection.php';

!$conn->query('DROP TABLE posts');

$sql = '
    create table posts(
        id int auto_increment primary key,
        title varchar(100) not null,
        body TEXT not null,
        FULLTEXT KEY title (title, body)
    )
';

if (!$conn->query($sql)){
    die('Error: table ja exists');
}

$result = $conn->query('DESCRIBE posts');

var_dump($result->fetch_all());