<?php
/* @var $projects app\models\Project */
/* @var $model app\models\Project */

use app\components\StringHelper;
use app\components\Storage;
use yii\helpers\Url;

$this->title = 'Головна';
?>
<!-- Hero -->
<section class="hero">
    <div class="container">
        <div class="hero__title">
            <h1>Професійне партнерство</h1>
            <div class="info__button hero__button margin--left">
                <a href="#">Стати партнером <img src="/public/image/arrow-down.svg" alt="arrow"></a>
            </div>
        </div>
    </div>
</section>

<!-- Company -->
<section class="company">
    <div class="container">
        <div class="company__content">
            <h3>Comfort Heat — сучасний європейський виробник з 25-річним досвідом в області нагрівальних кабельних
                систем та рішень</h3>
            <p>Мы разрабатываем и производим нагревательные кабели, нагревательные маты, термостаты и аксессуары,
                применяемые во всех областях строительства и ремонта – от жилого и коммерческого до масштабных
                профессиональных решений, таких как электростанции, нефтеперерабатывающие заводы, железнодорожная
                инфраструктура, спортивные сооружения, объекты сельского хозяйства и пищевой промышленности.
                Нагревательные системы Comfort Heat долговечные, экологичны, обеспечивают максимальный уровень
                комфорта и безопасности при низком энергопотреблении и минимальных затратах на техническое
                обслуживание.</p>
            <div class="info__button company__button margin--left">
                <a href="<?= Url::to(['about']) ?>">Більше про компанію<img src="/public/image/arrow-down-light.svg" alt="arrow"></a>
            </div>
        </div>
    </div>
    <div class="company__years">
        <img src="/public/image/25.svg" alt="25_years">
        <img src="/public/image/office.png" alt="office">
    </div>
</section>

<!-- Projects -->
<section class="project">
    <div class="container">
        <h1 class="title">Проєкти</h1>
        <div class="info project__wrapper">

            <?php foreach ($projects as $project): ?>
            <div class="info__item <?php if ($project->picture) { echo 'project__picture'; } ?>">
                <h3><?= StringHelper::getShortTitle($project->title); ?></h3>
                <?php if ($project->picture): ?>
                <img src="<?= Storage::getPicture($project->picture); ?>" alt="hotel">
                <?php endif; ?>
                <div class="info__button project__details">
                    <a href="<?= Url::to(['project/view', 'id' => $project->id]) ?>">Детальніше<img src="/public/image/arrow-down.svg" alt="arrow"></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="info__button project__info margin--left">
            <a href="<?= Url::to(['project/index']) ?>">Більше проектів<img src="/public/image/arrow-down.svg" alt="arrow"></a>
        </div>
    </div>
</section>