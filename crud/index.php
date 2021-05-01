<?php

$conn = require 'connection.php';

$result = $conn->query("select * from users");

$users = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                <a href="/ver.php?id=<?php echo $user['id']; ?>">Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p>
            <a href="/adicionar.php">Adicionar usuário</a>
    </p>
</body>
</html>