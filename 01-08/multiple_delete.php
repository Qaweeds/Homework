<?php
include_once '_autoload.php';

if (!empty($_POST['multiple_delete'])) {

    try {
        $select = $_POST['multiple_delete'];
        $keys = array_map(function ($key) {
            return ':_' . $key;
        }, array_keys($select));
        $binds = implode(',', $keys);

        $db = new DB();
        $query = "DELETE FROM users WHERE id IN (" . $binds . ")";
        $stmt = $db->getConnection()->prepare($query);
        foreach ($select as $k => $v) {
            $stmt->bindValue('_'. $k, $v);
        }
        $stmt->execute();

        header('Location:' . $_SERVER['HTTP_REFERER']);
    } catch (Exception $e) {
        echo 'Ошибка массового удаления <br>';
        die($e->getMessage());
    }

}