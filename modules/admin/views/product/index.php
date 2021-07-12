<?php

use app\models\Product;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'price',
                'value' => function (Product $model) {
                    return $model->price . ' ₴';
                }
            ],
            [
                'attribute' => 'time_create',
                'value' => function (Product $model) {
                    return  ($model->time_create) ? \app\components\DateHelper::getDate($model->time_create) .' в ' . \app\components\DateHelper::getTime($model->time_create) : 'Немає';
                }
            ],
            [
                'attribute' => 'time_update',
                'value' => function (Product $model) {
                    return ($model->time_update) ? \app\components\DateHelper::getDate($model->time_update) .' в ' . \app\components\DateHelper::getTime($model->time_update) : 'Не оновлювався';
                }
            ],
            [
                'attribute' => 'subcategory_id',
                'value' => function (Product $model) {
                    return $model->subcategory->title;
                }
            ],
            [
                'attribute' => 'status',
                'value' => function (Product $model) {
                    return $model->getStatus();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
