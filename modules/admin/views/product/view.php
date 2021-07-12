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
                'value' => function ($time) {
                    return \app\components\DateHelper::getDate($time->time_create);
                }
            ],
            'time_update',
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
