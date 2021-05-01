<?php

$conn = new mysqli('localhost', 'root', '123456', 'teste');

if($conn->connect_errno){
    die('Falha em connectar: (' . $conn->connect_errno .  ')' . $conn->connect_error);
}

//echo $conn->host_info; 
//comando para criar tabela

$sql = 'create table users (
    id int auto_increment primary key,
    email varchar(255) not null
    )';

if(!$conn->query($sql)){
    echo "tabela ja existe";
}

echo "<BR>";

//$result = $conn->query('Insert into users (email) value ("rgnaldo1@gmail.com")'); //inserir

$result = $conn->query('select * from users');
                             //retorna o tipo de dados   
$users = $result->fetch_all(MYSQLI_ASSOC);

   
foreach($users as $user){
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}
echo "<BR>";

var_dump($users);