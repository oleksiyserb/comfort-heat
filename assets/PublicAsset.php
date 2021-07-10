<?php


namespace app\assets;

use yii\web\AssetBundle;

class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/public/css/main.css',
        '/public/css/media.css',
    ];
    public $js = [
        '/public/js/script.js',
        '/public/js/modal.js',
        '/public/js/sort-products.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}