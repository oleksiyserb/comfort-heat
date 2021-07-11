<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subcategory */
/* @var $form yii\widgets\ActiveForm */
/* @var $categoryArray app\models\Category */
?>

<div class="subcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'categoryId')->dropDownList($categoryArray)?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
