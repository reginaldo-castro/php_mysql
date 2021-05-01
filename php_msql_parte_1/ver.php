<?php
$conn = require('connection.php');

$id = $_GET['id'] ?? null;

$stmt = $conn->prepare('select * from users where id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Úsuarios</h1>
    <h3><?php echo $user['email']; ?></h3>

    <p>O id do usuario é <?php echo $user['id']; ?></p>

    <p>
        <a href="/editar.php?id=<?php echo $user['id']; ?>">Editar</a>
        <a href="/remover.php?id=<?php echo $user['id']; ?>">Remover</a>                
    </p>

    <a href="/crud/">Voltar</a>
</body>
</html>