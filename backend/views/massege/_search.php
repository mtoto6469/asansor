<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MassegeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="massege-search col-sm-10">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_pro') ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'welldimensions') ?>

    <?php // echo $form->field($model, 'displacement height') ?>

    <?php // echo $form->field($model, 'Capacity') ?>

    <?php // echo $form->field($model, 'hlfdc') ?>

    <?php // echo $form->field($model, 'pit') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'date_ir') ?>

    <?php // echo $form->field($model, 'enable_view') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
