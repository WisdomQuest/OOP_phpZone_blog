<?php include __DIR__ . '/../header.php'; ?>

<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>

            <?php foreach ($articles as $article): ?>

                <h2> <a href="/www/articles/<?= $article->getId()?>"> <?= $article->getName() ?></a></h2>
            <p><?= $article->getParsedText() ?></p>
            <hr>
            <?php  endforeach; ?>



<div style="text-align: center">
    <?php for ($pageNum = 1; $pageNum <= $pagesCount; $pageNum++): ?>
    <?php if($currentPageNum === $pageNum):?>
    <b><?= $pageNum ?></b>
    <?php else: ?>
    <a href="/www/<?= $pageNum === 1 ? '' : $pageNum ?>"><?= $pageNum ?></a>
    <?php endif;?>
    <?php endfor; ?>


    <?php include __DIR__ . '/../footer.php'; ?>


</div>