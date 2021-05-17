<?php
$id = htmlspecialchars(addslashes($_GET['id']));
$user = [];

if (count($_POST) > 0) {
    addUser();
}

function addUser()
{
    global $db;

    $name = htmlspecialchars(addslashes($_POST['name']));
    $surname = htmlspecialchars(addslashes($_POST['surname']));
    $birth = htmlspecialchars(addslashes($_POST['birth']));
    $phone = htmlspecialchars(addslashes($_POST['phone']));
    $email = htmlspecialchars(addslashes($_POST['email']));
    $password = htmlspecialchars(addslashes($_POST['password']));

    if (!empty($name) && !empty($surname) && !empty($birth) && !empty($phone) && !empty($email)) {
        $password = md5(md5($password));

        mysqli_query($db, "INSERT INTO users (`name`, `surname`, `birth`, `phone`, `email`, `password`) VALUES ('$name', '$surname', '$birth')");
    }
}