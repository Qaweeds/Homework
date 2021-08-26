<?php


namespace App\Models;


use Core\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text'];
    protected static $table = 'posts';
}