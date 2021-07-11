<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subcategory */
/* @var $subcategoryCurrent \app\models\Subcategory */

$this->title = 'Update Subcategory: ' . $subcategoryCurrent->title;
$this->params['breadcrumbs'][] = ['label' => 'Subcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $subcategoryCurrent->title, 'url' => ['view', 'id' => $subcategoryCurrent->id]];
$this->params['breadcrumbs'][] = 'Update';

$model->categoryId = $subcategoryCurrent;
$model->title = $subcategoryCurrent->title;
?>
<div class="subcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'categoryId')->dropDownList($categoryArray)?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
