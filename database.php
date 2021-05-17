<?php
$db = mysqli_connect('localhost', 'cs_global', 'cs_global123', 'cs_global');
if (mysqli_connect_errno()) {
    die('ошибка подключения к базе данных');
} else {
    mysqli_query($db, "SET NAMES 'utf8'");
}
