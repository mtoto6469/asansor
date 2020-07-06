<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Massege */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="massege-form col-sm-8 col-lg-offset-2">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'tell')->textInput()->label('شماره تماس') ?>

    <?= $form->field($model, 'adrress')->textarea(['rows' => 2])->label('آدرس') ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('ارسال', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
