<?php include __DIR__ . '/../header.php'; ?>

<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>

<?php foreach ($articles as $article): ?>

    <h2><a href="/articles/<?= $article->getId() ?>"> <?= $article->getName() ?></a></h2>
    <p><?= $article->getParsedText() ?></p>
    <hr>
<?php endforeach; ?>


<div style="text-align: center">
    <?php if ($currentPageNum !== 1): ?>
        <a href="/<?= $str = 1 ?>">1 </a>
        <span>---</span>
    <?php endif; ?>

    <?php for ($str = $currentPageNum; $str <= $currentPageNum + 5; $str++): ?>
        <?php if ($currentPageNum === $str): ?>
            <b><?= $str ?></b>
        <?php else: ?>
            <?php if ($str < $pagesCount): ?>
                <a href="/<?= $str === 1 ? '' : $str ?>"><?= $str ?></a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endfor; ?>
    <span>---</span>
    <?php if ($currentPageNum != $pagesCount): ?>
        <a href="/<?= $pagesCount ?>"><?= $pagesCount ?></a>
    <?php endif; ?>
</div>

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


