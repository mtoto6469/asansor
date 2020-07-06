<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PriceforelevatorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="priceforelevator-search col-sm-10">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'floorNamber') ?>

    <?= $form->field($model, 'floorStops') ?>

    <?= $form->field($model, 'speed') ?>

    <?php // echo $form->field($model, 'capacity') ?>

    <?php // echo $form->field($model, 'karbary') ?>

    <?php // echo $form->field($model, 'liftType') ?>

    <?php // echo $form->field($model, 'motortype') ?>

    <?php // echo $form->field($model, 'instalLocation') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'motor1') ?>

    <?php // echo $form->field($model, 'motor2') ?>

    <?php // echo $form->field($model, 'motor3') ?>

    <?php // echo $form->field($model, 'description1') ?>

    <?php // echo $form->field($model, 'description2') ?>

    <?php // echo $form->field($model, 'description3') ?>

    <?php // echo $form->field($model, 'description4') ?>

    <?php // echo $form->field($model, 'description5') ?>

    <?php // echo $form->field($model, 'description6') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'enable_view') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
