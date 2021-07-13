<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $currentNews app\models\News */

$this->title = 'Update News: ' . $currentNews->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $currentNews->title, 'url' => ['view', 'id' => $currentNews->id]];
$this->params['breadcrumbs'][] = 'Update';

$model->title = $currentNews->title;
$model->description = $currentNews->description;
$model->text = $currentNews->text;

?>
<div class="news-update">

    <h1><?= Html::encode($currentNews->title) ?></h1>

    <div class="news-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
