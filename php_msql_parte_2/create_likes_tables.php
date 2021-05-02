<?php

$conn = require __DIR__.'/utils/connection.php';

$conn->query('DROP TABLE users');
$conn->query('DROP TABLE likes');

$sql = '
    create table users(
        id int auto_increment primary key,
        name varchar(100) not null
    )
';

if(!$conn->query($sql)){
    die('Error: table exists');
}

$sql = '
    create table likes(
        id int auto_increment primary key,
        user_id varchar(100) not null,
        post_id text not null
    )
';

if (!$conn->query($sql)){
    die('Error: table ja exists');
}

$result = $conn->query('DESCRIBE posts');

var_dump($result->fetch_all());