<?php

use app\components\Storage;
use app\components\StringHelper;
use yii\helpers\Url;

/* @var $model \app\models\Subcategory */
/* @var $categories \app\models\Category */
/* @var $propositions \app\models\News */
/* @var $products \app\models\Product */
/* @var $pages \app\models\Product */

?>

<div class="container container__wrapper">
    <!-- Aside -->
    <aside class="category">


        <?php foreach ($categories as $category): ?>
            <div class="category__item">
                <a href="#" class="dropdown-btn <?php if ($model->category_id == $category->id) { echo 'visited'; } ?>"><?= $category->title; ?></a>
                <ul>

                    <?php foreach ($category->subcategories as $subcategory): ?>
                        <li class="<?php if ($subcategory->id == $model->id) { echo 'active'; } ?>">
                            <a href="<?= Url::to(['subcategory', 'id' => $subcategory->id]) ?>"><?= $subcategory->title; ?></a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        <?php endforeach; ?>


    </aside>

    <main class="product-information">
        <!-- Subcategory -->
        <section class="subcategory">
            <h2 class="title"><?= $model->title; ?></h2>
            <p><?= $model->text; ?></p>
        </section>

        <!-- Result-->
        <section class="result">
            <div class="result__instruments">
                <div class="result__sort">
                    <a href="#" id="sort-list">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 8C0 3.58172 3.58172 0 8 0H32C36.4183 0 40 3.58172 40 8V32C40 36.4183 36.4183 40 32 40H8C3.58172 40 0 36.4183 0 32V8Z"
                                fill="white" />
                            <rect x="16" y="26" width="16" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="16" y="18" width="16" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="8" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="8" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="16" y="10" width="16" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="8" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <path
                                d="M8 1H32V-1H8V1ZM39 8V32H41V8H39ZM32 39H8V41H32V39ZM1 32V8H-1V32H1ZM8 39C4.13401 39 1 35.866 1 32H-1C-1 36.9706 3.02944 41 8 41V39ZM39 32C39 35.866 35.866 39 32 39V41C36.9706 41 41 36.9706 41 32H39ZM32 1C35.866 1 39 4.13401 39 8H41C41 3.02944 36.9706 -1 32 -1V1ZM8 -1C3.02944 -1 -1 3.02944 -1 8H1C1 4.13401 4.13401 1 8 1V-1Z"
                                fill="#BDE3FB" />
                        </svg>
                    </a>
                    <a href="#" class="active" id="sort-table">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 8C0 3.58172 3.58172 0 8 0H32C36.4183 0 40 3.58172 40 8V32C40 36.4183 36.4183 40 32 40H8C3.58172 40 0 36.4183 0 32V8Z"
                                fill="white" />
                            <rect x="8" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="28" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="18" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="8" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="28" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="18" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="8" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="28" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <rect x="18" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                            <path
                                d="M8 1H32V-1H8V1ZM39 8V32H41V8H39ZM32 39H8V41H32V39ZM1 32V8H-1V32H1ZM8 39C4.13401 39 1 35.866 1 32H-1C-1 36.9706 3.02944 41 8 41V39ZM39 32C39 35.866 35.866 39 32 39V41C36.9706 41 41 36.9706 41 32H39ZM32 1C35.866 1 39 4.13401 39 8H41C41 3.02944 36.9706 -1 32 -1V1ZM8 -1C3.02944 -1 -1 3.02944 -1 8H1C1 4.13401 4.13401 1 8 1V-1Z"
                                fill="#BDE3FB" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="result__wrapper">

                <?php foreach ($products as $product): ?>
                <a href="<?= Url::to(['product', 'id' => $product->id]); ?>" class="result__product-card">
                    <img src="<?= Storage::getPicture($product->picture[0]->mini); ?>" alt="product-image">
                    <div class="result__description">
                        <h4><?= StringHelper::getShortTitle($product->title); ?></h4>
                        <span><?= $product->price; ?> ₴</span>
                        <p><?= StringHelper::getShortDescription($product->description); ?></p>
                    </div>
                </a>
                <?php endforeach; ?>

            </div>
            <div class="pagination__wrap">
                <?= \yii\widgets\LinkPager::widget([
                    'pagination' => $pages,
                ]) ?>
            </div>
        </section>
    </main>
</div>

<!-- Propositions -->
<section class="propositions category-propositions">
    <div class="container">
        <div class="info">

            <?php foreach ($propositions as $article): ?>
                <div class="info__item">
                    <h3><?= StringHelper::getShortTitle($article->title); ?></h3>
                    <p><?= StringHelper::getShortDescription($article->description); ?></p>
                    <div class="info__button propositions__button">
                        <a href="<?= Url::to(['news/view', 'id' => $article->id]); ?>">Детальніше<img src="/public/image/arrow-down.svg" alt="arrow"></a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>