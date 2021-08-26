<main>

    <div class="form">
        <form action="/admin/posts/store" method="post">
            <input type="hidden" name="id" value="<?= $post->id ?>">
            <h3>Редактировать</h3>
            <span>Заголовок</span>
            <input type="text" name="title" value="<?= $post->title ?>">
            <p>Текст</p>
            <textarea name="text" id="text" cols="100" rows="10"><?= $post->text ?></textarea>
            <button type="submit">Изменить</button>
        </form>
    </div>
</main>