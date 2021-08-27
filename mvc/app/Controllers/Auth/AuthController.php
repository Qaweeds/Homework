<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Core\Controller;
use Core\View;

class AuthController extends Controller
{
    protected function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") return View::render('auth/login.php');

        $user = User::verify($_POST);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            if ($user->role === 'Админ') {
                setcookie('role', 'q');
            }
            setcookie('token', password_hash('token', PASSWORD_BCRYPT));
        } else {
            throw new \Exception('User not found');
        }

        header('Location:/');
    }

    protected function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") return View::render('auth/register.php');

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user = new User();
        $user->create($_POST);

        header('Location:/login');
    }

    protected function logout()
    {
        session_start();
        session_unset();
        if (isset($_COOKIE['token'])) {

            unset($_COOKIE['token']);
            setcookie('token', null, -1);
        }
        if (isset($_COOKIE['role'])) {
            unset($_COOKIE['role']);
            setcookie('role', null, -1);
        }


        header('Location:/');
    }

    public function before()
    {
        if (isset($_COOKIE['token'])) header('Location:/');
    }
}
