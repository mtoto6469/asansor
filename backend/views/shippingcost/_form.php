<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Shippingcost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shippingcost-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paymentCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
