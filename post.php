<?php 
require_once __DIR__ . '/func.php';
$content = $db->queryToReadOne();
$title = 'Article';
?>
<?php require_once __DIR__ . '/Src/templates/header.php' ?>

<section>
    <article>
        <h2><?=$content->title?></h2>
        <p><?=$content->content?></p>
        <p class="date">Дата публикации: <?=$content->created_at?></p>
    </article>
</section>
    
<?php require_once __DIR__ . '/Src/templates/header.php' ?>
