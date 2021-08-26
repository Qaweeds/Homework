<main>
    <h1>Посты</h1>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (count($posts)) {
            foreach ($posts as $post) {
                echo '<tr>';
                echo '<td>' . $post->id . '</td>';
                echo '<td><a href="/article/' . $post->id . '">' . $post->title . '</a></td>';
                echo '<td><a href="/admin/posts/' . $post->id . '/edit">Редактировать</a></td>';
                echo '<td><a href="/admin/posts/' . $post->id . '/delete">Удалить</a></td>';
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
</main>