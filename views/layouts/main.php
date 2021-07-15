<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $categories Category */

use app\models\Category;
use yii\helpers\Html;
use app\assets\PublicAsset;
use yii\helpers\Url;

PublicAsset::register($this);

$categories = Category::find()->with('subcategories')->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body id="body">
<?php $this->beginBody() ?>

<!-- Catalog Start -->
<div class="catalog-modal" id="modal-menu">
    <div class="catalog-modal__block">
        <div class="container">
            <div class="catalog-modal__head">
                <h4>Каталог продукції</h4>
                <a id="modal-close" href="#"><img src="/public/image/close-catalog.svg" alt="close-catalog"></a>
                <a id="close-laptop" href="#"><img src="/public/image/close.svg" alt="close-laptop"></a>
            </div>
            <div class="catalog-modal__body">
                <div class="catalog-modal__left">

                    <?php foreach ($categories as $category): ?>
                    <ul class="catalog-modal__item">
                        <a class="catalog-modal__first-button" href="<?= Url::to(['catalog/category', 'id' => $category->id]) ?>">
                            <?= $category->title; ?><img src="/public/image/arrow-down-orange.svg" alt="arrow">
                        </a>

                        <?php if ($category->subcategories): ?>
                            <?php foreach ($category->subcategories as $subcategory): ?>
                                <li><a href="<?= Url::to(['catalog/subcategory', 'id' => $subcategory->id]) ?>"><?= $subcategory->title; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                    <?php endforeach; ?>

                </div>
                <div class="catalog-modal__right">

                    <?php foreach ($categories as $category): ?>
                        <?php foreach ($category->subcategories as $subcategory): ?>
                        <a href="<?= Url::to(['catalog/subcategory', 'id' => $subcategory->id]); ?>"><?= $subcategory->title; ?></a>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<div class="header__block">
    <header class="header">

        <!-- Burger Menu Start -->

        <div class="burger-menu" id="menu">
            <div class="burger-menu__header">
                <div class="container">
                    <a href="/"><img src="/public/image/white-logo.svg" alt="white-logo"></a>
                    <a href="#" id="burger-catalog" class="button-menu burger-menu__button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12Z"
                                    fill="#DB511F" />
                            <path d="M7 7H11M7 12H17M7 17H15" stroke="#FFFFFF" stroke-width="2"
                                  stroke-linecap="round" />
                        </svg>Каталог продукції
                    </a>
                    <a href="#" id="menu-close" class="burger-menu__close">
                        <img src="/public/image/close.svg" alt="close">
                    </a>
                </div>
            </div>
            <div class="burger-menu__body">
                <div class="container">
                    <div class="search-input">
                        <label for="search"><a href="#"><img src="/public/image/search-input.svg" alt="search"></a></label>
                        <input id="search" type="text">
                    </div>
                    <ul class="burger-menu__links">
                        <li>
                            <a <?php if (Yii::$app->controller->id == 'news') { echo 'class="active"'; } ?>  href="<?= Url::to(['news/index']) ?>">Новини</a>
                        </li>
                        <li>
                            <a <?php if (Yii::$app->controller->action->id == 'services') { echo 'class="active"'; } ?> href="<?= Url::to(['site/services']) ?>">Сервіс та обслуговування</a>
                        </li>
                        <li>
                            <a <?php if (Yii::$app->controller->action->id == 'technical') { echo 'class="active"'; } ?> href="<?= Url::to(['site/technical']) ?>">Технічна інформація</a>
                        </li>
                        <li>
                            <a <?php if (Yii::$app->controller->action->id == 'design') { echo 'class="active"'; } ?> href="<?= Url::to(['site/design']) ?>">Дизайнерам та архітекторам</a>
                        </li>
                        <li>
                            <a <?php if (Yii::$app->controller->action->id == 'about') { echo 'class="active"'; } ?> href="<?= Url::to(['site/about']) ?>">Компанія</a>
                        </li>
                        <div class="burger-menu__social-media">
                            <a href="#"><img src="/public/image/facebook-menu.svg" alt="facebook"></a>
                            <a href="#"><img src="/public/image/instagram-menu.svg" alt="instagram"></a>
                            <a href="#"><img src="/public/image/in-menu.svg" alt="in"></a>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="burger-menu__footer">
                <div class="container">
                    <div class="burger-menu__left">
                        <a href="tel:+380967246400">
                            <img src="/public/image/kyivstar.svg" alt="kyivstar">+38 096 724 64 00
                        </a>
                        <a href="tel:+380997246400">
                            <img src="/public/image/vodafone.svg" alt="vodafone">+38 099 724 64 00
                        </a>
                    </div>
                    <ul class="burger-menu__right">
                        <li><a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a></li>
                        <li>м. Київ, вул. В. Хвойки, 10, оф. 3</li>
                    </ul>
                </div>
                <div class="burger-menu__networks">
                    <a href="/facebook.com"><img src="/public/image/facebook-menu.svg" alt="facebook-menu"></a>
                    <a href="/instagram.com"><img src="/public/image/instagram-menu.svg" alt="instagram-menu"></a>
                    <a href="/in.com"><img src="/public/image/in-menu.svg" alt="in-menu"></a>
                </div>
            </div>
        </div>

        <!-- Burger Menu End -->

        <div class="header__head">
            <a href="tel:+380967246400">
                <img src="/public/image/kyivstar.svg" alt="kyivstar">+38 096 724 64 00
            </a>
            <a href="tel:+380997246400">
                <img src="/public/image/vodafone.svg" alt="vodafone">+38 099 724 64 00
            </a>
        </div>
        <div class="header__body">
            <div class="container">
                <div class="header__info">
                    <div class="header__logo">
                        <a href="/"><img src="/public/image/logo.svg" alt="logo"></a>
                        <ul class="logo__list">
                            <li>Smart</li>
                            <li>Heating</li>
                            <li>Solutions</li>
                        </ul>
                    </div>
                    <div class="header__operators">
                        <a href="tel:+380967246400">
                            <img src="/public/image/kyivstar.svg" alt="kyivstar">+38 096 724 64 00
                        </a>
                        <a href="tel:+380997246400">
                            <img src="/public/image/vodafone.svg" alt="vodafone">+38 099 724 64 00
                        </a>
                    </div>
                    <ul class="header__contacts">
                        <li><a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a></li>
                        <li>м. Київ, вул. В. Хвойки, 10, оф. 3</li>
                    </ul>
                    <a href="#" id="search-button" class="button-menu header__search">
                        <img src="/public/image/search-modal.svg" alt="search">
                        <p>Пошук</p>
                    </a>

                    <!-- Modal search -->

                    <div id="search-menu" class="search">
                        <div class="search-input">
                            <label for="search">
                                <a id="search-icon" href="search-result.html"><img src="/public/image/search-input.svg" alt="search"></a>
                            </label>
                            <input id="search" type="text">
                        </div>
                    </div>

                    <!-- Modal search end -->

                    <a href="#" id="modal-laptop" class="button-menu header__button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12Z"
                                    fill="#DB511F" />
                            <path d="M7 7H11M7 12H17M7 17H15" stroke="#FFFFFF" stroke-width="2"
                                  stroke-linecap="round" />
                        </svg>Каталог продукції
                    </a>
                    <a href="#" id="burger-menu" class="button-menu header__menu">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12Z"
                                    fill="#BDE3FB" />
                            <path d="M7 7H11M7 12H17M7 17H15" stroke="#00407A" stroke-width="2"
                                  stroke-linecap="round" />
                        </svg>
                        <p>Меню</p>
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>

<?= $content ?>

<!-- Partner -->
<section class="partner">
    <div class="container">
        <div class="partner__block">
            <h2>Професійне співробітництво</h2>
            <p>Досвід Comfort Heat та високі стандарти компанії є міцною основою в реалізації проектів будь-якої
                складності.</p>
            <div class="info__button partner__block-info margin--left">
                <a href="<?= Url::to(['project/index']) ?>">Більше проектів<img src="/public/image/arrow-down-light.svg" alt="arrow"></a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer__wrapper">
        <div class="footer__body">
            <div class="container">
                <div class="footer__logo">
                    <a href="/"><img src="/public/image/white-logo.svg" alt="white-logo"></a>
                </div>
                <div class="footer__contacts">
                    <h3>Контакти</h3>
                    <p>м. Київ, вул. В. Хвойки, 10, оф. 3</p>
                    <ul class="footer__operators">
                        <li>
                            <a href="tel:+380997246400"><img src="/public/image/kyivstar.svg" alt="kyivstar">+38 099 724 64
                                00</a>
                        </li>
                        <li>
                            <a href="tel:+380967246400"><img src="/public/image/vodafone.svg" alt="vodafone">+38 096 724 64
                                00</a>
                        </li>
                        <li>
                            <a href="tel:+380937246400"><img src="/public/image/lifecell.svg" alt="lifecell">+38 093 724 64
                                00</a>
                        </li>
                    </ul>
                    <p><a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a></p>
                    <div class="footer__social-media">
                        <a href="#">
                            <img src="/public/image/facebook.svg" alt="facebook">
                        </a>
                        <a href="#">
                            <img src="/public/image/instagram.svg" alt="instagram">
                        </a>
                        <a href="#">
                            <img src="/public/image/in.svg" alt="in">
                        </a>
                    </div>
                </div>
                <div class="footer__menu">
                    <a href="<?= Url::to(['news/index']) ?>">Новини</a>
                    <a href="<?= Url::to(['site/services']) ?>">Сервіс та обслуговування</a>
                    <a href="<?= Url::to(['site/technical']) ?>">Технічна інформація</a>
                    <a href="<?= Url::to(['site/design']) ?>">Дизайнерам та архітекторам</a>
                    <a href="<?= Url::to(['site/about']) ?>">Компанія</a>
                </div>
            </div>
        </div>
        <div class="footer__map">
            <img src="/public/image/map.svg" alt="map">
        </div>
    </div>
    <div class="container">
        <div class="footer__end">
            <p>© Comfort Heat - офіційний дистриб'ютор</p>
            <div class="footer__development">
                <img src="/public/image/ingsot.svg" alt="ingsot">Розроблено в Ingsot
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
