<?php

use app\assets\ProductAsset;
use app\components\Storage;
use app\components\StringHelper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $model \app\models\Product */
/* @var $products \app\models\Product */

ProductAsset::register($this);

$this->title = 'Продукт: ' . $model->title;

$this->params['breadcrumbs'][] = [
    'template' => "<li><b>{link}</b></li> > ",
    'label' => $model->subcategory->title,
    'url' => ['subcategory', 'id' => $model->subcategory->id]
];

$this->params['breadcrumbs'][] = $this->title;

?>

<?php if ($model->picture): ?>
<!-- Modal -->
<div class="modal" id="modal-product">
    <div class="modal__product-block">
        <a href="#" id="close-product">
            <img src="/public/image/close.svg" alt="close">
        </a>
        <div class="modal__slider-container swiper-container">
            <div class="modal__slider-wrapper swiper-wrapper">

                <?php foreach ($model->picture as $picture): ?>
                <div class="modal__slider-slide swiper-slide">
                    <div class="modal__image">
                        <img src="<?= Storage::getPicture($picture->picture); ?>" alt="product-image">
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <!-- Navigation buttons -->
            <div class="modal__slider-prev">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="#BDE3FB"/>
                    <path d="M14 20L24 26L24 14L14 20Z" fill="#00407A"/>
                </svg>
            </div>
            <div class="modal__slider-next">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="#BDE3FB"/>
                    <path d="M26 20L16 26L16 14L26 20Z" fill="#00407A"/>
                </svg>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <p><?= $model->title; ?></p>
    </div>
</div>
<!-- Modal end -->
<?php endif; ?>

<!-- Product -->
<section class="product">
    <div class="container">
        <?php echo Breadcrumbs::widget([
            'homeLink' => false,
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
        ]); ?>
        <div class="product__body">
            <div class="product__view">
                <div class="product__wrapper">
                    <a href="#" class="product__image" id="static-image">
                        <img src="<?= Storage::getPicture($model->picture[0]->picture); ?>" alt="product-image">
                    </a>
                </div>
                <div class="product__mini-wrapper">

                    <?php if ($model->picture): ?>
                        <?php foreach ($model->picture as $picture): ?>
                        <div class="product__mini-image dynamic-image">
                            <img src="<?= Storage::getPicture($picture->picture); ?>" alt="mini-image">
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="product__info">
                <div class="product__top">
                    <h2 class="title product__title"><?= $model->title; ?></h2>
                    <h2><?= $model->price; ?> ₴</h2>
                </div>
                <div class="product__bottom">
                    <p>Модель: <?= $model->model; ?></p>
                    <p>Виробник: <?= $model->price; ?></p>
                    <span class="product__availability">
                        <?php if ($model->status == 1) {
                            echo 'В наявності';
                        } else {
                            echo 'Немає';
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="product__description">
            <div class="product__buttons">
                <a id="description" class="active" href="#">Опис товару</a>
                <a id="technical" href="#">Технічні характеристики</a>
            </div>
            <div class="product__text">
                <p><?= $model->description; ?></p>
            </div>
            <div class="product__technical">
                <p><?= $model->characteristic; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Product category -->
<section class="product-category">
    <div class="container">
        <h3 class="title">Товари категорії</h3>
        <div class="result__wrapper product-category__wrapper">

            <?php foreach ($products as $product): ?>
            <a href="<?= Url::to(['product', 'id' => $product->id]); ?>" class="result__product-card">
                <img src="<?= Storage::getPicture($product->picture[0]->mini); ?>" alt="product-image">
                <div class="result__description">
                    <h4><?= StringHelper::getShortTitle($product->title); ?></h4>
                    <p><?= StringHelper::getShortDescription($product->description); ?></p>
                </div>
            </a>
            <?php endforeach; ?>

        </div>
    </div>
</section>