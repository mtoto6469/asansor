<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ServicebuySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicebuy-search col-sm-10">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_service') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'family') ?>

    <?php // echo $form->field($model, 'telephon') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'date_ir') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'time_ir') ?>

    <?php // echo $form->field($model, 'service_id_user') ?>

    <?php // echo $form->field($model, 'repairman_name') ?>

    <?php // echo $form->field($model, 'confirm') ?>

    <?php // echo $form->field($model, 'enable_view') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
