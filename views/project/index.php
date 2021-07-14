<?php
/* @var $projects \app\models\Project */

use app\components\Storage;
use app\components\StringHelper;
use yii\helpers\Url;

/* @var $pages \app\models\Project */
?>

<!-- Projects -->
<section class="projects">
    <div class="container">
        <h2 class="title">Наші проєкти</h2>
        <div class="info">

            <?php foreach ($projects as $project): ?>
                <div class="info__item <?php if ($project->picture) { echo 'project__picture'; } ?>">
                    <h3><?= StringHelper::getTitle($project->title); ?></h3>
                    <?php if ($project->picture): ?>
                        <img src="<?= Storage::getPicture($project->picture); ?>" alt="hotel">
                    <?php endif; ?>
                    <div class="info__button project__details">
                        <a href="<?= Url::to(['project/view', 'id' => $project->id]) ?>">Детальніше<img src="/public/image/arrow-down.svg" alt="arrow"></a>
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
