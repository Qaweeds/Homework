<?php


if (isset($_REQUEST['create_users_table']) and $_REQUEST['create_users_table']) {

    unset($_REQUEST['create_users_table']);

    $db = new DB();
    $query = "CREATE TABLE users(
                id          INT AUTO_INCREMENT PRIMARY KEY,
                name        VARCHAR(20) NOT NULL,
                surname     VARCHAR(30) NOT NULL,
                age         INT(3) NOT NULL,
                email       VARCHAR(100) UNIQUE NOT NULL,
                phone       INT(15) NULL
            )";

    $db->getConnection()->query($query);
    $db = null;

    header('Location:' . $_SERVER['REQUEST_URI']);
}
?>

<p>Создать таблицу USERS</p>
<form action="" method="post">
    <input type="hidden" name="create_users_table" value="1">
    <button type="submit"> Создать</button>
</form>

