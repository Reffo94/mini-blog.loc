<?php
require_once __DIR__ . '/func.php';
$content = $db->queryToReadAll();
$title = 'Mini blog';
?>
<?php require_once __DIR__ . '/Src/templates/header.php' ?>

    <section>
        <hr>
        <?php foreach(array_reverse($content) as $post):?>
        <h2><a href="/post.php?id=<?=$post->id?>"><?=$post->title?></a></h2>
        <p class="date">Дата публикации: <?=$post->created_at?></p>
        <hr>
        <?php endforeach; ?>
    </section>

<?php require_once __DIR__ . '/Src/templates/footer.php' ?>