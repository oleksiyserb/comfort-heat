<?php


namespace app\assets;

use yii\web\AssetBundle;

class ProductAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/public/css/swiper-bundle.min.css'
    ];
    public $js = [
        '/public/js/product.js',
        '/public/js/swiper-bundle.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}