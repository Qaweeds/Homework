<?php

abstract class Model
{
    /**
     * Переделал немного. Если бы возвращал строку, но невозможно было бы вызывать другие методы.(save, delete).
     */
    static function find($id)
    {
//        return 'SELECT * FROM user WHERE id = :id';

        $class = static::class;
        return new $class($id);
    }

    public function save()
    {
        if(is_null($this->id)){
            return $this->create();
        }else{
            return $this->update();
        }

    }

    public function delete()
    {
        return 'DELETE user WHERE id = :id';
    }

    public function create()
    {
        return 'INSERT INTO user (id, name, email) VALUES (:id, :name, :email)';
    }

    public function update()
    {
        return 'UPDATE user SET name = :name, email = \'email\' WHERE id = :id';
    }

}

final class User extends Model
{
    protected $id;
    protected $name;
    protected $email;

    public function __construct($id = null, $name = null, $email = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

echo '<pre>';

$user = User::find(1);
var_dump($user); // SELECT * FROM user WHERE id = :id

$user->name = 'John';
$result = $user->save();
var_dump($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id

$result = $user->delete();
var_dump($result); // DELETE user WHERE id = :id

$user = new User;
$user->name = 'John';
$user->email = 'some@gmail.com';
$result = $user->save();
var_dump($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)

echo '</pre>';

//https://github.com/Qaweeds/Homework.git

//test git into git
