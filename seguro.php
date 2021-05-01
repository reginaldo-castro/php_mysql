<?php

$id = $_GET['id'] ?? 0;

$conn = new mysqli('localhost', 'root', '123456', 'teste');

$stmt = $conn->prepare('select * from users where id > ?');

$stmt->bind_param('i', $id);

$stmt->execute();

$result = $stmt->get_result();

$users = $result->fetch_all(MYSQLI_ASSOC);

foreach($users as $user){
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}


