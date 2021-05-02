<?php

$email = $_GET['email'] ?? null;

$conn = new mysqli('localhost', 'root', '123456', 'teste');

$result = $conn->query('INSERT INTO users (email) VALUES ("' . $email . '")');


