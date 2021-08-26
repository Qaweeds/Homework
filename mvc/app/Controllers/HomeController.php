<?php


namespace App\Controllers;


use App\Models\Post;
use App\Models\User;
use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    protected function index()
    {
        $posts = Post::all();

        return View::render('home/index.php', compact('posts'));
    }





}