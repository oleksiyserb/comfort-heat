<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\project */
/* @var $currentProject app\models\Project */

$this->title = 'Update Project: ' . $currentProject->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $currentProject->title, 'url' => ['view', 'id' => $currentProject->id]];
$this->params['breadcrumbs'][] = 'Update';

$model->title = $currentProject->title;
$model->text = $currentProject->text;
?>

<div class="project-update">

    <h1><?= Html::encode($currentProject->title) ?></h1>

    <div class="project-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
