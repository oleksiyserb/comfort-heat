<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $project \app\models\Project */
/* @var $propositions \app\models\Project */

$this->title = 'Проєкт: ' . $project->title;

$this->params['breadcrumbs'][] = [
    'template' => "<li><b>{link}</b></li> > ",
    'label' => 'Проєкти',
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
            <h1 class="title article__title"><?= $project->title; ?></h1>
            <div class="article__image">
                <img src="<?= \app\components\Storage::getPicture($project->picture) ?>">
            </div>
            <div class="article__content">
                <p><?= $project->text; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Propositions -->
<section class="propositions">
    <div class="container">
        <h4 class="title">Пов’язані проєкти</h4>
        <div class="info">

            <?php foreach ($propositions as $project): ?>
                <div class="info__item">
                    <h3><?= $project->title; ?></h3>
                    <div class="info__button propositions__button">
                        <a href="<?= Url::to(['view', 'id' => $project->id]) ?>">Детальніше<img src="/public/image/arrow-down.svg" alt="arrow"></a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
