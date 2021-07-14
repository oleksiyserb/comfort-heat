<?php

use app\components\Storage;
use app\components\StringHelper;
use yii\helpers\Url;

/* @var $articles \app\models\News */
/* @var $pages \app\models\News */

$this->title = 'Новини';
?>

<!-- News -->
<section class="news">
    <div class="container">
        <h2 class="title"><?= $this->title; ?></h2>
        <div class="info">

            <?php foreach ($articles as $article): ?>
            <div class="info__item news__item <?php if ($article->picture) { echo 'news__picture'; } ?>">
                <?php if ($article->picture): ?>
                <img src="<?= Storage::getPicture($article->picture) ?>">
                <?php endif; ?>
                <h3><?= StringHelper::getShortTitle($article->title); ?></h3>
                <p><?= StringHelper::getShortDescription($article->description); ?></p>
                <div class="info__button news__button">
                    <a href="<?= Url::to(['view', 'id' => $article->id]) ?>">Читати<img src="/public/image/arrow-down.svg" alt="arrow"></a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        <div class="pagination__wrap">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]) ?>
        </div>
    </div>
</section>