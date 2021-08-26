<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/main.css">
    <title>MVC</title>
</head>

<body>
<header>
    <h1>Это Header</h1>

    <ul>
        <?php
        if (isset($_COOKIE['token'])) {
            echo '<li><a href="/">Главная</a></li>';

            if (isset($_COOKIE['role'])) {
                echo '<li><a href="/admin/posts">Управление</a></li>';
                echo '<li><a href="/admin/posts/create">Создать</a></li>';
            }
            echo '<li><a href="/logout">Выйти</a></li>';

        } else {
            echo '<li><a href="/login">Вход</a></li>';
            echo '<li><a href="/register">Регистрация</a></li>';
        }
        ?>
    </ul>
</header>