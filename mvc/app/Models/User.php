<?php


namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $fillable = ['name', 'id', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'last_login'];
    protected static $table = 'users';
}