<?php


namespace App\Controllers\Posts;


use App\Models\Post;
use Core\Controller;
use Core\View;

class PostController extends Controller
{
    protected $errorMessage = 'Войдите, что бы увидеть пост';

    protected function show($id)
    {

        $post = Post::find($id);

        if (!$post) {
            throw new \Exception('Пост не существует', 404);
        }

        return View::render('home/show_post.php', compact('post'));
    }

    public function before()
    {
        // Здесь нет никакой сверхлогики. просто что-бы содержимое куки не был ослишком очевидным)
        if (empty($_COOKIE['token']) || password_verify('token', $_COOKIE['token']) === false) {
            return false;
        }
        return true;
    }
}