<?php include __DIR__ . '/../header.php'; ?>

<?php
//var_dump($user);
?>
список последних статей:
<br><br>

<?php
//foreach ($article as $artic) {
//    $articleText[]= $artic->getText();
//}
//$article = array_slice($articleText, -3, );
//
//foreach ($article as $value) {
//     echo $value  ?><!-- <a href="/www/articles/--><?php //= $artic->getId() ?><!--/edit">редактирование</a>  <br>-->
<?php //}
//?>


<?php
$article = array_slice($article, -2, );
foreach ($article as $artic) {
    echo $artic->shortLink();?>
    <a href="/articles/<?= $artic->getId() ?>/edit">редактирование</a>  <br>

<?php }
?>


<hr>



список последних комментариев:
<?php include __DIR__ . '/../footer.php'; ?>
