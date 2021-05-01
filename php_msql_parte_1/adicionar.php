<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $conn = require('connection.php');

    $email = $_POST['email'] ?? null;

    $stmt = $conn->prepare('insert into users (email) values (?)');
    $stmt->bind_param('s', $email);
    $stmt->execute();

    header('location: /');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar usuário</title>
</head>
<body>
    <h1>Adicionar Usuário</h1>

    <form action="adicionar.php" method="post">
        
    <input type="text" name="email" placeholder="Digite seu email">
    <input type="submit" value="Enviar">

    </form>

    <a href="/">Voltar</a>
</body>
</html>