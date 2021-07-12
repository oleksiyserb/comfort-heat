<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="picture-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
        ],
    ]) ?>

</div>
