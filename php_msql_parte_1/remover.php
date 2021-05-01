<?php
$conn = require('connection.php');

$id = $_GET['id'] ?? null;

$stmt = $conn->prepare('delete from users where id=?');
$stmt->bind_param('i', $id);
$stmt->execute();

header('location: /');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover</title>

    <h1>Removido com sucesso</h1>

</head>
<body>
    
</body>
</html>