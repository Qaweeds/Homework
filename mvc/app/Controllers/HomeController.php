<?php


namespace App\Controllers;


use App\Models\User;
use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    protected function index()
    {
        $user = new User();
//        $user = User::find(3);
//        $user->name = 'wdddwaqdq';
        $user->save();
//        return View::render('home/index.php', compact('lorem'));
    }
}