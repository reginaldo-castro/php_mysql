<?php
    $conn = require('connection.php');

$id = $_GET['id'] ?? null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'] ?? null;

    $stmt = $conn->prepare('update users set email=? where id=?');
    $stmt->bind_param('si', $email, $id );
    $stmt->execute();

    header('location: /');
    die();
}
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
    <title>Adicionar usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <form action="editar.php?id=<?php echo $user['id']; ?>" method="post">
        
    <input type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="Digite seu email">
    <input type="submit" value="Enviar">

    </form>

    <a href="/">Voltar</a>
</body>
</html>