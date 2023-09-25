<?php include __DIR__ . '/../header.php'; ?>
<h1><?= $article->getName() ?></h1>
<!--<p>--><?php //= $article->getText() ?><!--</p>-->
<p><?= $article->getParsedText() ?></p>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
<?php if ($user !== null && $user->isAdmin()): ?>
    <a href="/articles/<?= $article->getId() ?>/edit">редактирование</a>
<?php endif; ?>
<hr>
коментарии:
<br><br>

<?php if ($comment !== null) {
    foreach ($comment as $value) {
        $com = $value->getText();
        if ($article->getId() == $value->getArtId()) {
            echo $com . '<br>';
            if ($user !== null){
            if ($user->getId() == $value->getAuthorId() || $user->isAdmin()): ?>
                <a href="/comments/<?= $value->getId() ?>/edit">редактирование</a><br>
            <?php endif;
            }

        }
    }

}
?>
<hr><br><br><br>

<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>

<?php if ($user !== null): ?>

    <form action="/articles/<?= $article->getId() ?>/comments" method="post">

        <label for="text">добавить комментарии</label><br>
        <textarea name="comments" id="text" rows="3" cols="50"></textarea><br>
        <br>
        <input type="submit" value="Отправить">
    </form>
<?php else:
    echo ' для добавления комментариев войдите на сайт';
    ?>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>


