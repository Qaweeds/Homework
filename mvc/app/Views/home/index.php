<main>
    <h1>Посты</h1>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (count($posts)) {
            foreach ($posts as $post) {
                echo '<tr>';
                echo '<td>' . $post->id . '</td>';
                echo '<td><a href="/article/' . $post->id . '">' . $post->title . '</a></td>';
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
</main>