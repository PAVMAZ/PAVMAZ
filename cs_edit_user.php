<?php
require 'database.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$accept_update = htmlspecialchars(addslashes($_POST['update_accept'] ?? ''));

if (count($_POST) > 0 && $accept_update == 1) {
    updateUser();
}

function updateUser(): void
{
    global $id;
    global $db;
    
    $query = "UPDATE users SET nickname = '$nickname', email = '$email', password = '$password', type = '$type', WHERE id = " . $id;
    mysqli_query($db, $query);
    
    echo 'Пользователь успешно изменён';
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование пользователя</title>
</head>
<body>
    <h1>Редактирование пользователя</h1>
    <form method="post" style="margin-top: 50px;">
        <fieldset>
        <input type="hidden" name="update_accept" value="1">
<p><input type="text" name="nickname" placeholder="Введите  ник"></p>
        <p><input type="text" name="email" placeholder="Введите  имейл"></p>
        <p><input type="password" name="password" placeholder="Введите  пароль"></p>
        <p><input type="text" name="type" placeholder="Введите тип"></p>
            <p><input type="submit" value="Добавить"></p>
        </fieldset>
    </form>

    <a href="cs_regis.php">Вернуться назад</a>
</body>
</html>
