<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pictures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_id',
                'value' => function (\app\models\Picture $model) {
                    return $model->product->title;
                }
            ],
            [
                'attribute' => 'picture',
                'format' => 'raw',
                'value' => function (\app\models\Picture $model) {
                    return Html::img($model->getImage(), ['width' => '200px']);
                }
            ],
            [
                'attribute' => 'mini',
                'format' => 'raw',
                'value' => function (\app\models\Picture $model) {
                    return Html::img($model->getMini(), ['width' => '150px']);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;{delete}',
            ],
        ],
    ]); ?>


</div>
