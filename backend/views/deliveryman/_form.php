<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliveryman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deliveryman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_factor')->textInput() ?>

    <?= $form->field($model, 'user_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('تحویل داده شد', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
