<?php

use app\components\StringHelper;
use yii\helpers\Url;
use app\components\Storage;
use yii\widgets\Breadcrumbs;

/* @var $article \app\models\News */
/* @var $propositions \app\models\News */

$this->title = 'Стаття: ' . $article->title;

$this->params['breadcrumbs'][] = [
    'template' => "<li><b>{link}</b></li> > ",
    'label' => 'Новини',
    'url' => ['index']
];

$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Article -->
<section class="article">
    <div class="container">
        <?php echo Breadcrumbs::widget([
            'homeLink' => false,
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
        ]); ?>
        <div class="article__content">
            <h1 class="title article__title"><?= $article->title; ?></h1>
            <div class="article__image">
                <img src="<?= Storage::getPicture($article->picture) ?>" alt="floor">
            </div>
            <div class="article__content">
                <p><?= $article->text; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Propositions -->
<section class="propositions">
    <div class="container">
        <h4 class="title">Пов’язані статті</h4>
        <div class="info">

            <?php foreach ($propositions as $article): ?>
            <div class="info__item">
                <h3><?= StringHelper::getShortTitle($article->title); ?></h3>
                <p><?= StringHelper::getShortDescription($article->description); ?></p>
                <div class="info__button propositions__button">
                    <a href="<?= Url::to(['view', 'id' => $article->id]) ?>">Читати<img src="/public/image/arrow-down.svg" alt="arrow"></a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>