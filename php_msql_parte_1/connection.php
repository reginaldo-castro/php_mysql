<?php

$conn = new mysqli('localhost', 'root', '123456', 'teste');

if($conn->connect_errno){
    die('Falha em connectar: (' . $conn->connect_errno .  ')' . $conn->connect_error);
}

return $conn;