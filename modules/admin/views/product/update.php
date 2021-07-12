<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $currentProduct \app\models\Product */
/* @var $subcategories \app\models\Product */

$this->title = 'Update Product: ' . $currentProduct->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $currentProduct->title, 'url' => ['view', 'id' => $currentProduct->id]];
$this->params['breadcrumbs'][] = 'Update';

$model->title = $currentProduct->title;
$model->price = $currentProduct->price;
$model->model = $currentProduct->model;
$model->maker = $currentProduct->maker;
$model->description = $currentProduct->description;
$model->characteristic = $currentProduct->characteristic;
$model->subcategoryId = $currentProduct->subcategory_id;
$model->status = $currentProduct->status;
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'currentProduct' => $currentProduct,
        'subcategories' => $subcategories
    ]) ?>

</div>
