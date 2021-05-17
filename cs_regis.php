<?php

require 'database.php';

if (count($_POST) > 0) {
    addUser();
}

function getUsers(): array
{
    global $db;
    
    $users = [];

    $result = mysqli_query($db, "SELECT * FROM users");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $users[] = mysqli_fetch_assoc($result);
    }

    return $users;
}

function addUser()
{
    global $db;
    
    $nickname = htmlspecialchars(addslashes($_POST['nickname']));
    $email = htmlspecialchars(addslashes($_POST['email']));
    $password = htmlspecialchars(addslashes($_POST['password']));
    $type = htmlspecialchars(addslashes($_POST['type']));
    
    $password = md5(md5($password));
    
    $query = "INSERT INTO `users` (`nickname`, `password`, `email`, `type`) VALUES ('$nickname', '$password', '$email', '$type')";
    mysqli_query($db, $query);
}

//$file = $_FILES['file'];
//$ext =pathinfo($file['name'])['extension'];
//print_r ($file);
//
//if (is_uploaded_file($file['tmp_name']) ) {
//if ($file['size'] > 1024 * 1024 * 10) {
//echo 'Файл превышает 10 МБ';
//}
//
//if (in_array($ext, ['png', 'jpg', 'jpeg', 'gif']) == false) {
//echo 'Это не изображение';
//}
//}



?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пользователи</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Имя</td>
            <td>тип</td>
            <td>Email</td>
        </tr>
        <?php if (count(getUsers()) === 0) { ?>
            <tr>
                <td colspan="6">Пользователи не найдены</td>
            </tr>
        <?php } else { foreach ($users = getUsers() as $user) { ?>
            <tr>
                <td><?= $user['nickname']; ?></td>
                <td><?= $user['type']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="cs_edit_user.php?id=<?= $user['id']; ?>">Редактировать</a> /
                    <a href="cs_delete_user.php?id=<?= $user['id']; ?>">Удалить</a>
                </td>
            </tr>
        <?php } } ?>
    </table>

    <form method="post" style="margin-top: 50px;">
        
        <form action='' method='post' enctype='multipart/form-data'>
    <input type='file' name='file'>
    <input type='submit' value='Загрузите ваше аватар (не обязательно)'>
        <fieldset>
        <p><input type="text" name="nickname" placeholder="Введите  ник"></p>
        <p><input type="text" name="email" placeholder="Введите  имейл"></p>
        <p><input type="password" name="password" placeholder="Введите  пароль"></p>
        <p><input type="text" name="type" placeholder="Введите тип"></p>
            <p><input type="submit" value="Добавить"></p>
        </fieldset>
    </form>
</body>
</html>