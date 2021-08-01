<?php

include '_autoload.php';
include 'html/head.html';
$db = new DB();
$table_exist = $db->table_exist('users');

if (empty($table_exist)) {
    include 'create_table.php';
} else {
    include 'html/users.html';
    $db = new DB();
    $users = $db->getConnection()->query('SELECT id FROM users ORDER BY id')->fetchAll();
    if ($users) {
        foreach ($users as $user) {
            echo "<a href='?user={$user['id']}'>{$user['id']}</a>";
        }

        ?>

        <div class="mass-delete">
            <h3>Множественное удаление</h3>
            <form action="multiple_delete.php" method="post">
                <select name="multiple_delete[]" id="multiple_delete" multiple>
                    <?php
                    foreach ($users as $user) {
                        echo "<option value='{$user['id']}'>Пользователь {$user['id']} </option>";
                    }
                    ?>
                </select>
                <div>
                    <button type="submit">Удалить</button>
                </div>
            </form>
        </div>

        <?php
    }


    if (!empty($_GET['user'])) {
        include 'user_info.php';
    }
}


include_once 'html/footer.html';


