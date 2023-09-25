<?php
/**
 * @var \MyProject\Models\Articles\Article $article
 */
include __DIR__ . '/../header.php';
?>
<h1>Редактирование комментария: </h1>
<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<?= $comment->getText(); ?>
<hr>

<form action="/comments/<?= $commentsId ?>/edit" method="post">

    <label for="text">редактировать комментарий</label><br>
    <textarea name="comments" id="text" rows="3" cols="50"><?= $comment->getText() ?></textarea><br>
    <br>
    <input type="submit" value="Отправить">
</form>
<?php include __DIR__ . '/../footer.php'; ?>

