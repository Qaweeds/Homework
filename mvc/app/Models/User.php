<?php


namespace App\Models;

use Core\Model;

class User extends Model
{
    protected static $table = 'users';
    protected $fillable = ['name', 'surname', 'email', 'password', 'role'];


    public static function verify($data)
    {
        $email = htmlspecialchars(trim(strip_tags($data['email'])));
        $query = 'SELECT * FROM ' . static::$table . ' WHERE email = :email';
        $stmt = static::db()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetchObject(static::class);

        if ($user) {
            if (password_verify($data['password'], $user->password)) {
                return $user;
            }
        }
        return false;
    }
}