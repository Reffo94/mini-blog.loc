<?php
require_once __DIR__ . '/func.php';
$db->queryToWrite();
$title = 'Add article';
?>
<?php require_once __DIR__ . '/Src/templates/header.php' ?>

<section>
    <form method="post">
        <label for="title">Название статьи:</label>
        <input type="text" name="title" id="title" required>
        <label for="content">Контент:</label>
        <textarea name="content" id="content" cols="40" rows="7"></textarea>
        <input class="submit" type="submit" name="submit" value="Опубликовать">        
    </form>
</section>

<?php require_once __DIR__ . '/Src/templates/header.php' ?>
