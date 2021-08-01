<?php
$db = new DB();
try {
    $id = $_GET['user'];
    $stmt = $db->getConnection()->prepare('SELECT * FROM users WHERE id =:id');
    $stmt->bindValue('id', $db->escape($id));
    $stmt->execute();
    $user = $stmt->fetch();
    $stmt = null;

} catch (Exception $e) {
    echo 'Что-то полшо не так';
    die($e->getMessage());
}

if (!empty($_POST['delete'])) {
    try {
        $id = $_POST['delete'];
        $stmt = $db->getConnection()->prepare('DELETE FROM users WHERE id =:id');
        $stmt->bindValue('id', $db->escape($id));
        $stmt->execute();
        $stmt = null;

        header('Location:' . strtok($_SERVER['REQUEST_URI'], '?'));
    } catch (Exception $e) {
        echo 'Ошибка удаления';
        die($e->getMessage());
    }
}

if (!empty($user)) {

    ?>

    <form action="" method="POST">
        <input type="hidden" name="delete" value="<?= $user['id'] ?>">
        <table>
            <thdead>
                <th>id</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Возраст</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Удалить</th>
            </thdead>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['surname'] ?></td>
                <td><?= $user['age'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><input type="submit" value="Удалить"></td>
            </tr>
        </table>
    </form>

    <?php
}