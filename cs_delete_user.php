<?php
require 'database.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$accept_delete = htmlspecialchars(addslashes($_POST['delete_accept'] ?? ''));

if (count($_POST) > 0 && $accept_delete == 1) {
    deleteUser();
}

function deleteUser(): void
{
    global $id;
    global $db;

    $query = "DELETE FROM users WHERE id = " . $id;
    mysqli_query($db, $query);
    
    echo 'Пользователь успешно удален';
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Удаление пользователя</title>
</head>
    
<body>
    <h1>Удаление пользователя</h1>
    <form method="post" style="margin-top: 50px;">
        <fieldset>
            <input type="hidden" name="delete_accept" value="1">
            <p>Вы УВЕРЕНЫ, что хотите удалить пользователя?</p>
            <p><input type="submit" value="Да"></p>
        </fieldset>
    </form>

    <a href="cs_regis.php">Вернуться назад</a>
</body>
</html>
