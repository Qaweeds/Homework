<?php


namespace App\Controllers\Admin;


use App\Models\Post;
use Core\View;

class PostController extends AdminController
{
    protected function index()
    {
        $posts = Post::all();

        return View::render('admin/index.php', compact('posts'));
    }

    protected function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") return View::render('admin/post_create.php');

        $post = new Post();
        $post->title = $_POST['title'];
        $post->text = $_POST['text'];
        $post->save();

        header('Location: /admin/posts');
    }

    protected function edit($id)
    {

        $post = Post::find($id);

        if (!$post) {
            throw new \Exception('Пост не существует', 404);
        }
        return View::render('admin/post_edit.php', compact('post'));

    }

    protected function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") header('Location:/');

        $post = Post::find($_POST['id']);
        if (!$post) {
            throw new \Exception('Пост не найден', 404);
        }

        $post->title = $_POST['title'];
        $post->text = $_POST['text'];
        $post->save();

        header('Location: /admin/posts');
    }

    protected function delete($id)
    {

        $post = Post::find($id);

        if (!$post) {
            throw new \Exception('Пост не существует', 404);
        }

        $post->delete();

        header('Location: /admin/posts');
    }
}