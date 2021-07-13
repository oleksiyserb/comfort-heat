<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Upload Picture', ['upload-picture', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'price',
            'model',
            'maker',
            'description:ntext',
            'characteristic:ntext',
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
                'attribute' => 'subcategoryId',
                'value' => function (Product $product) {
                    return $product->subcategory->title;
                }
            ],
            [
                'attribute' => 'status',
                'value' => function (Product $model) {
                    return $model->getStatus();
                }
            ],
        ],
    ]) ?>

</div>
