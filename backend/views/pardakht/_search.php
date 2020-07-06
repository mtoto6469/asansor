<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PardakhtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pardakht-search col-sm-10">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_fac') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'endnamber') ?>

    <?php // echo $form->field($model, 'oaygiri') ?>

    <?php // echo $form->field($model, 'admin_description') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'approve') ?>

    <?php // echo $form->field($model, 'date_u') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
