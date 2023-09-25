<?php include __DIR__ . '/../header.php'; ?>

<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>

<?php foreach ($articles as $article): ?>

    <h2><a href="/articles/<?= $article->getId() ?>"> <?= $article->getName() ?></a></h2>
    <p><?= $article->getParsedText() ?></p>
    <hr>
<?php endforeach; ?>


<!--<div style="text-align: center">-->
<!--    --><?php //for ($pageNum = 1; $pageNum <= $pagesCount; $pageNum++): ?>
<!--        --><?php //if ($currentPageNum === $pageNum): ?>
<!--            <b>--><?php //= $pageNum ?><!--</b>-->
<!--        --><?php //else: ?>
<!--            <a href="/www/--><?php //= $pageNum === 1 ? '' : $pageNum ?><!--">--><?php //= $pageNum ?><!--</a>-->
<!--        --><?php //endif; ?>
<!--    --><?php //endfor; ?>

    <div style="text-align: center">
        <?php if ($previousPageLink !== null): ?>
            <a href="<?= $previousPageLink ?>">&lt; Туда</a>
        <?php else: ?>
            <span style="color: cadetblue">&lt; Туда</span>
        <?php endif; ?>
        &nbsp;&nbsp;&nbsp;
        <?php if ($nextPageLink !== null): ?>
            <a href="<?= $nextPageLink ?>">Сюда &gt;</a>
        <?php else: ?>
            <span style="color: darkgray">Сюда &gt;</span>
        <?php endif; ?>
    </div>


    <?php include __DIR__ . '/../footer.php'; ?>


<!--</div>-->