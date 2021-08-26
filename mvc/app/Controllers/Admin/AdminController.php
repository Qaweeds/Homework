<?php


namespace App\Controllers\Admin;


use Core\Controller;

class AdminController extends Controller
{
    protected $errorMessage = 'Вы не являетесь администратором.';

    public function before()
    {
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']->role === 'Админ') return true;
        return false;
    }
}