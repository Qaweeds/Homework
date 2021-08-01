<?php
require_once '_autoload.php';

$db = new DB();
try {
    // С валидацией сильно не заморачивался :)
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $age = $_REQUEST['age'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    $query = "INSERT INTO users(name, surname, age, email, phone)
                VALUES (:name, :surname, :age, :email, :phone)";

    $stmt = $db->getConnection()->prepare($query);
    $stmt->bindValue(":name", $db->escape($name));
    $stmt->bindValue(":surname", $db->escape($surname));
    $stmt->bindValue(":age", $db->escape($age));
    $stmt->bindValue(":email", $db->escape($email));
    $stmt->bindValue(":phone", $db->escape($phone));
    $stmt->execute();
    $stmt = null;
    $db = null;

    header('Location:' . $_SERVER['HTTP_REFERER']);
} catch (Exception $e) {
    echo 'Пользователь не добавлен. <br>';
    die($e->getMessage());
}