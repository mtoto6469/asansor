<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ImagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-search col-sm-10">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'alert') ?>

    <?= $form->field($model, 'dascription') ?>

    <?= $form->field($model, 'slide') ?>

<!--    --><?//= $form->field($model, 'meta_key') ?>

    <?php // echo $form->field($model, 'meta_title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
